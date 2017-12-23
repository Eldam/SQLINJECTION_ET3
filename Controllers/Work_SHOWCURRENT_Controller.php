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
    include_once "../Models/Work_Model.php";
    $work = new WorkDAO($_REQUEST['value']);
    $resultado = $work->GET();

    //Si no existe la PK solicitada se muestra mensage de error
    //de lo contrario se muestra la tabla
    if($resultado->num_rows != 1){
        include_once "../Views/MESSAGE_View.php";
        new MESSAGE("El Trabajo no existe","../Controllers/Work_SHOWALL_Controller.php");
    }else{
        include_once '../Views/Work_SHOWCURRENT_View.php';
        new Work_SHOWCURRENT_View($resultado);
    }




}
