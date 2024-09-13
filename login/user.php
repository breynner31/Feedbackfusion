<?php

include_once("database.php");

class User extends Database{

    private $name;
    private $email;
    private $id_user;
    private $id_restaurante;
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
            $this->id_user =$currentUser['id_user'];
            $this->id_restaurante =$currentUser['id_restaurante'];
      
            
        }
    }

    public function getNombre(){
        return $this->name;
    }

    public function getid_user(){
        return $this->id_user;
    }

    public function getid_restaurante(){
        return $this->id_restaurante;
    }
}


?>