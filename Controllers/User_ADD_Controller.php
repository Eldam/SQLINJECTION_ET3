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
    //Si la PK no esta asignada en una variable se muestra la vista ADD
    //de lo contrario se añade la tupla a la BD
    if(!isset($_REQUEST['login'])) {

        include '../Views/User_ADD_View.php';
        new User_ADD_View();

    }else{

        include '../Models/User_Model.php';
        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
        $DNI = $_REQUEST['DNI'];
        $Nombre = $_REQUEST['Nombre'];
        $Apellidos = $_REQUEST['Apellidos'];
        $Telefono = $_REQUEST['Telefono'];
        $Correo = $_REQUEST['Correo'];
        $Direccion = $_REQUEST['Direccion'];

        //Se crea un DAO y le pasan todos los parametros
        $usuario = new UserDAO($login,$password);
        $usuario->setData($DNI,$Nombre,$Apellidos,$Telefono,$Correo,$Direccion);

        $respuesta = $usuario->ADD();

        //Si la respuesta es "true" se muestra mensage de Confirmacion
        // de lo contrario el error correspondiente
        if ($respuesta == 'true'){
            Include '../Views/MESSAGE_View.php';
            new MESSAGE("Usuario creado correctamente.", '../Controllers/User_SHOWALL_Controller.php');
        }
        else{
            include '../Views/MESSAGE_View.php';
            new MESSAGE($respuesta, '../Controllers/User_SHOWALL_Controller.php');
        }
    }
}


?>