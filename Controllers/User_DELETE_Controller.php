<?php
//Fichero que contiene una un controlador
//Autor: 3s8wu8
//Fecha: 6/10/2017


//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
    header('Location: ../index.php');
}
//esta autenticado
else{

    //Si no existe la variable [confirm] se obtienen todos los datos y se pide confirmacion
    //ha de pasarse la pk en la variable value
    //de lo contrario se elimina de la BD
    if(!isset($_REQUEST['confirm'])){
        include '../Models/User_Model.php';
        $usuario = new UserDAO($_REQUEST['value'], "");
        $resultado = $usuario->GET();
        if($resultado->num_rows != 1){
            include "../Views/MESSAGE_View.php";
            new MESSAGE("El usuario no existe","../Controllers/User_SHOWALL_Controller.php");
        }
        include '../Views/User_DELETE_View.php';
        new User_DELETE_View($resultado);
    }else {
        include '../Models/User_Model.php';
        $usuario = new UserDAO($_REQUEST['value'], "");
        $message = $usuario->DELETE();
        include "../Views/MESSAGE_View.php";
        new MESSAGE($message,"../Controllers/User_SHOWALL_Controller.php");
    }
}


?>