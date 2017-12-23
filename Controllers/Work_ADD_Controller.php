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
    if (!hasPermisionsTo("WORK","ADD")){
        include_once '../Views/MESSAGE_View.php';
        new MESSAGE("No posee permisos para la accion solicitada", '../index.php');
    }else {

        //Si la PK no esta asignada en una variable se muestra la vista ADD
        //de lo contrario se añade la tupla a la BD
        if (!isset($_REQUEST['IdTrabajo'])) {

            include_once '../Views/Work_ADD_View.php';
            new Work_ADD_View();

        } else {

            include_once '../Models/Work_Model.php';
            $IdTrabajo= $_REQUEST['IdTrabajo'];
            $NombreTrabajo = $_REQUEST['NombreTrabajo'];
            $FechaIniTrabajo = $_REQUEST['FechaIniTrabajo'];
            $FechaFinTrabajo = $_REQUEST['FechaFinTrabajo'];
            $PorcentajeNota = $_REQUEST['PorcentajeNota'];

            //Se crea un DAO y le pasan todos los parametros
            $work = new WorkDAO($IdTrabajo);
            $work->setData($NombreTrabajo, $FechaIniTrabajo,$FechaFinTrabajo,$PorcentajeNota);

            //Se añade el trabajo
            $respuesta = $work->ADD();


            //Si la respuesta es "true" se muestra mensage de Confirmacion
            // de lo contrario el error correspondiente
            if ($respuesta == 'true') {
                include_once '../Views/MESSAGE_View.php';
                new MESSAGE("Trabajo creado correctamente.",
                    '../Controllers/Work_SHOWALL_Controller.php');
            } else {
                include_once '../Views/MESSAGE_View.php';
                new MESSAGE($respuesta, '../Controllers/Work_SHOWALL_Controller.php');
            }
        }
    }
}


?>