<?php
//Este controlador precisa  $_REQUEST['IdGrupo']
//y muestra todas las aciones de cada fucion
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
else {

    include_once "../Functions/Permisions.php";
    //Se comprueba si poosee los pemisos
    //si no los posee mostrara mensage de error
    //en caso contrario realizara la acion solictada
    if (!hasPermisionsTo("USERS", "ASSING")) {
        include_once '../Views/MESSAGE_View.php';
        new MESSAGE("No posee permisos para la accion solicitada", '../index.php');
    } else {

        //Si la PK no esta asignada en una variable se muestra la vista ADD
        //de lo contrario se añade la tupla a la BD
        if (!isset($_REQUEST['IdTrabajo'])) {

            include_once '../Views/History_ADD_View.php';
            new History_ADD_View($_REQUEST['value']);

        } else {



            //Se crea un workDAO para saber el numero de historias que posse
            include_once '../Models/Work_Model.php';
            $work = new WorkDAO($_REQUEST['IdTrabajo']);

            //Se crea un HistoryDAO
            include_once '../Models/History_Model.php';
            $history = new HistoryDAO($_REQUEST['IdTrabajo']);
            $idHistoria = $work->countHistories();
            $history->setData($idHistoria,$_REQUEST['TextoHistoria']);


            //Se añade el grupo
            $respuesta = $history->ADD();


            //Si la respuesta es "true" se muestra mensage de Confirmacion
            // de lo contrario el error correspondiente
            if ($respuesta == 'true') {
                include_once '../Views/MESSAGE_View.php';
                new MESSAGE("Historia asignada correctamente.",
                    "../Controllers/Work_SHOWHISTORY_Controller.php?value=".$_REQUEST["IdTrabajo"]);
            } else {
                include_once '../Views/MESSAGE_View.php';
                new MESSAGE($respuesta, "../Controllers/Work_SHOWHISTORY_Controller.php?value=".$_REQUEST["IdTrabajo"]);
            }
        }


    }


}


?>
