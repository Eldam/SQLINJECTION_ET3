<?php
//Fichero que contiene una un controlador
//Autor:
//Fecha: 6/10/2017


//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
    header('Location: ./index.php');
}



//esta autenticado
else{

    //Si no existe la variable [confirm] se obtienen todos los datos y se muestra la vista de edit
    //ha de pasarse la pk en la variable value
    //de lo contrario se elimina de la BD
    if(isset($_REQUEST['value'])){
        include_once '../Models/User_Model.php';
        $usuario = new UserDAO($_REQUEST['value'], "");
        $resultado = $usuario->GET();

        //Si no existe la PK solicitada se muestra mensage de error
        //de lo contrario se muestra la tabla
        if($resultado->num_rows != 1){
            include_once "../Views/MESSAGE_View.php";
            new MESSAGE("El usuario no existe","../Controllers/User_SHOWALL_Controller.php");
        }else{
            include_once '../Views/User_EDIT_View.php';
            new User_EDIT_View($resultado);
        }

    }else{
        include_once '../Models/User_Model.php';

        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
        $DNI = $_REQUEST['DNI'];
        $Nombre = $_REQUEST['Nombre'];
        $Apellidos = $_REQUEST['Apellidos'];
        $Telefono = $_REQUEST['Telefono'];
        $Correo = $_REQUEST['Correo'];
        $Direccion = $_REQUEST['Direccion'];

        //Se crea un DAO y le pasan todos los paramertos
        //y se modifican los parametros atiguos con los nuevos
        //y se retorna el message de la operacion
        $usuario = new UserDAO($login,$password);
        $usuario->setData($DNI,$Nombre,$Apellidos,$Telefono,$Correo,$Direccion);

        $message = $usuario->EDIT();
        include_once "../Views/MESSAGE_View.php";
        new MESSAGE($message,"../Controllers/User_SHOWALL_Controller.php");
    }

}

