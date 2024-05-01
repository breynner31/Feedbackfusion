<?php

include_once("database.php");

class User extends Database{

    private $nombre;
    private $username;

    public function userExist($email, $password){
        $query = $this->connect()->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
        $query->execute(['email' => $email, 'password' => $password]);
    
        $user = $query->fetch(); // Obtenemos la primera fila del resultado
    
        if($user){ // Si se encontró un usuario
            return true;
        }else{
            return false;
        }
    }

    public function setUser($email){
        $query = $this->connect()->prepare('SELECT * FROM user WHERE email =:email');
        $query->execute(['email' =>$email]);

        foreach ($query as $currentUser){
            $this->name = $currentUser['name'];
            $this->email = $currentUser['email'];
      
            
        }
    }

    public function getNombre(){
        return $this->name;
    }
}
?>