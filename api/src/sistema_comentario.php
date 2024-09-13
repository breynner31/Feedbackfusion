<?php

namespace Api\Websocket;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use PDO;
use PDOException;
use DateTime;

class sistema_comentario implements MessageComponentInterface
{
    protected $clients;
    private $db;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;

        $dsn = 'mysql:host=localhost;dbname=feedbackfusion;charset=utf8';
        $username = 'root';
        $password = '';

        try {
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database connected successfully\n";
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            exit;
        }
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);
    
        if ($data && isset($data['id_user'], $data['id_restaurante'], $data['comentario'], $data['fecha_creacion'], $data['name'], $data['puntuacion'])) {
            try {
                // Convertir la fecha al formato adecuado si es necesario
                $fechaCreacion = new DateTime($data['fecha_creacion']);
                $fechaFormateada = $fechaCreacion->format('Y-m-d H:i:s');
    
                // Preparar y ejecutar la inserción en la base de datos
                $stmt = $this->db->prepare("INSERT INTO commits (id_user, id_restaurante, comentario, fecha_creacion, name, puntuacion) VALUES (:id_user, :id_restaurante, :comentario, :fecha_creacion, :name, :puntuacion)");
                $stmt->execute([
                    ':id_user' => $data['id_user'],
                    ':id_restaurante' => $data['id_restaurante'],
                    ':comentario' => $data['comentario'],
                    ':fecha_creacion' => $fechaFormateada,
                    ':name' => $data['name'],
                    ':puntuacion' => $data['puntuacion'] // Asegurarse de que $data['puntuacion'] es un entero
                ]);
                echo "Comentario saved to database\n";
    
                // Preparar y enviar la respuesta JSON al cliente WebSocket
                $response = json_encode($data);
                foreach ($this->clients as $client) {
                    $client->send($response);
                }
            } catch (PDOException $e) {
                echo "Error saving comentario: " . $e->getMessage();
            }
        } else {
            echo "Invalid data received\n";
            var_dump($data);
        }
    }
    

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
        echo "An error has occurred: {$e->getMessage()}\n";
    }
}
