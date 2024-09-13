<?php
use Api\Websocket\sistema_comentario;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

require __DIR__ . '/vendor/autoload.php';


// Crear el servidor WebSocket
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new sistema_comentario
        )
    ),
    8080
);

// Iniciar el servidor

$server->run();
