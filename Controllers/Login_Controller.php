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

    include '../Models/User_Model.php';
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];


    $usuario = new UserDAO($login,$password);
    $respuesta = $usuario->login();


    if ($respuesta == 'true'){
        session_start();
        $_SESSION['login'] = $_REQUEST['login'];
        header('Location:../Controllers/Index_Controller.php');
    }
    else{
        include '../Views/MESSAGE_View.php';
        new MESSAGE($respuesta, './Login_Controller.php');
    }

}

?>

