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
else {

    include_once "../Functions/Permisions.php";
    //Se comprueba si poosee los pemisos
    //si no los posee mostrara mensage de error
    //en caso contrario realizara la acion solictada
    if (!hasPermisionsTo("WORK", "SEARCH")) {
        include_once '../Views/MESSAGE_View.php';
        new MESSAGE("No posee permisos para la accion solicitada", '../index.php');
    } else {

        //Si la PK no esta asignada en una variable se muestra la vista SEARCH
        //de lo contrario se añade la tupla a la BD
        if (!isset($_REQUEST['IdTrabajo'])) {

            include_once '../Views/Importation_SEARCH_View.php';
            new Importation_SEARCH_View();

        } else {


            $IdTrabajo = $_REQUEST['IdTrabajo'];
            $NombreTrabajo = $_REQUEST['NombreTrabajo'];
            $FechaIniTrabajo = $_REQUEST['FechaIniTrabajo'];
            $FechaFinTrabajo = $_REQUEST['FechaFinTrabajo'];
            $PorcentajeNota = $_REQUEST['PorcentajeNota'];


            //Se crea un DAO y le pasan todos los paramertos
            //y se muestra la vista ShowAll con todos los parametros obtenidos
            include_once '../Models/Importation_Model.php';
            $importation = new ImportationDAO($IdTrabajo);
            $importation->setData($NombreTrabajo, $FechaIniTrabajo,$FechaFinTrabajo,$PorcentajeNota);

            $resultado = $importation->SEARCH();

            include_once '../Views/Importation_SHOWALL_View.php';
            new Importation_SHOWALL_View($resultado);

        }

    }
}


?>