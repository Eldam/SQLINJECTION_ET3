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


    include_once "../Functions/Permisions.php";
    //Se comprueba si poosee los pemisos
    //si no los posee mostrara mensage de error
    //en caso contrario realizara la acion solictada
    if (!hasPermisionsTo("GROUPS","DELETE")){
        include_once '../Views/MESSAGE_View.php';
        new MESSAGE("No posee permisos para la accion solicitada", '../index.php');
    }else {

        //Si no existe la variable [confirm] se obtienen todos los datos y se pide confirmacion
        //ha de pasarse la pk en la variable value
        //de lo contrario se elimina de la BD
        if (!isset($_REQUEST['confirm'])) {
            include_once '../Models/Group_Model.php';
            $group = new GroupDAO($_REQUEST['value']);
            $resultado = $group->GET();

            //Si no existe la PK solicitada se muestra mensage de error
            //de lo contrario se muestra la tabla
            if ($resultado->num_rows != 1) {
                include_once "../Views/MESSAGE_View.php";
                new MESSAGE("El Grupo no existe", "../Controllers/Group_SHOWALL_Controller.php");
            } else {
                include_once '../Views/Group_DELETE_View.php';
                new Group_DELETE_View($resultado);
            }

        } else {
            //Se crea un DAO y le pasan la PK
            //se elmina la tupla de la BD
            //y se retorna el message de la operacion
            include_once '../Models/Group_Model.php';
            $group = new GroupDAO($_REQUEST['value']);
            $message = $group->DELETE();
            include_once "../Views/MESSAGE_View.php";
            new MESSAGE($message, "../Controllers/Group_SHOWALL_Controller.php");
        }
    }
}


?>
