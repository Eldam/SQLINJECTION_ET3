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
    if (!hasPermisionsTo("GROUPS", "SEARCH")) {
        include_once '../Views/MESSAGE_View.php';
        new MESSAGE("No posee permisos para la accion solicitada", '../index.php');
    } else {

        //Si la PK no esta asignada en una variable se muestra la vista SEARCH
        //de lo contrario se añade la tupla a la BD
        if (!isset($_REQUEST['IdGrupo'])) {

            include_once '../Views/Group_SEARCH_View.php';
            new Group_SEARCH_View();

        } else {


            $IdGrupo = $_REQUEST['IdGrupo'];
            $NombreGrupo = $_REQUEST['NombreGrupo'];
            $DescripGrupo = $_REQUEST['DescripGrupo'];


            //Se crea un DAO y le pasan todos los paramertos
            //y se muestra la vista ShowAll con todos los parametros obtenidos
            include_once '../Models/Group_Model.php';
            $group = new GroupDAO($IdGrupo);
            $group->setData($NombreGrupo, $DescripGrupo);

            $resultado = $group->SEARCH();

            include_once '../Views/Group_SHOWALL_View.php';
            new Group_SHOWALL_View($resultado);

        }

    }
}


?>