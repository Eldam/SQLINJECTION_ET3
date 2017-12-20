<?php
//Fichero que contiene una un controlador
//Autor:
//Fecha: 6/10/2017

//session
session_start();
//incluir funcion autenticacion
include_once '../Functions/Authentication.php';
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
    if (!hasPermisionsTo("GROUPS","ACESS")){
        include_once '../Views/MESSAGE_View.php';
        new MESSAGE("No posee permisos para la accion solicitada", '../index.php');
    }else {
        //Se crea un DAO y le pasan todos los paramertos vacios
        //y se muestra la vista ShowAll con todos los parametros obtenidos

        include_once '../Models/Group_Model.php';
        $groupDAO = new GroupDAO("");
        $resultado = $groupDAO->SEARCH();

        include_once '../Views/Group_SHOWALL_View.php';
        new Group_SHOWALL_View($resultado);
    }
}


?>


