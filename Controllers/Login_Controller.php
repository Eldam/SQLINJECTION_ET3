<?php
//m3xep6
//08/11/2017
session_start();
if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
    include '../Views/Login_View.php';
    $login = new Login();
}
else{

    /*include '../Functions/Access_DB.php';*/

    include '../Models/USUARIOS_Model.php';
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    /*   $DNI = $_REQUEST['DNI'];
       $nombre = $_REQUEST['nombre'];
       $apellidos = $_REQUEST['apellidos'];
       $telefono = $_REQUEST['telefono'];
       $email = $_REQUEST['email'];
       $FechaNacimiento = $_REQUEST['FechaNacimiento'];
       $fotopersonal = $_REQUEST['fotopersonal'];
       $sexo = $_REQUEST['sexo'];
       $accion = $_REQUEST['accion'];

       $usuario = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,
           $telefono,$email,$FehaNacimiento,$fotopersonal,$sexo);
    */
    $usuario = new USUARIOS_Model($login,$password);
    $respuesta = $usuario->login();


    if ($respuesta == 'true'){
        session_start();
        $_SESSION['login'] = $_REQUEST['login'];
        header('Location:../index.php');
    }
    else{
        include '../Views/MESSAGE_View.php';
        new MESSAGE($respuesta, './Login_Controller.php');
    }

}

?>

