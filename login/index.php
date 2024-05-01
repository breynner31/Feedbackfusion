<?php
include_once('user.php');
include_once('user_session.php');

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once('home.php');
}else if(isset($_POST['email']) && isset($_POST['password'])){
    //echo "Validacion de login";
    $userForm = $_POST['email'];
    $passForm = $_POST['password'];

    if($user->userExist($userForm, $passForm)){
        //echo "Usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once('home.php');
    }else{
        //echo "Email y/o contraseña incorrectos";
        $errorLogin = "Email y/o contraseña incorrectos";
        include_once('login.php');
    }

}else{
    //echo "Login";
    include_once('login.php');
}

?>


