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

    //Se obtienen todos los datos y se muestra la vista de ShowAll
    //ha de pasarse la pk en la variable value
    include_once "../Models/Group_Model.php";
    $group = new GroupDAO($_REQUEST['value'], "");
    $resultado = $group->GET();

    //Si no existe la PK solicitada se muestra mensage de error
    //de lo contrario se muestra la tabla
    if($resultado->num_rows != 1){
        include_once "../Views/MESSAGE_View.php";
        new MESSAGE("El Grupo no existe","../Controllers/Group_SHOWALL_Controller.php");
    }else{
        include_once '../Views/Group_SHOWCURRENT_View.php';
        new Group_SHOWCURRENT_View($resultado);
    }




}
