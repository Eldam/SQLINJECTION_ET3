<?php
//Este controlador precisa $_REQUEST['login'] y $_REQUEST['IdGrupo']
//y elimina el grupo al usuario solicitado
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

        //Si no existe la variable [confirm] se obtienen todos los datos y se pide confirmacion
        //ha de pasarse la pk en la variable value
        //de lo contrario se elimina de la BD
        if (!isset($_REQUEST['confirm'])) {
            include_once '../Models/Group_Model.php';
            $group = (new GroupDAO($_REQUEST['IdGrupo']))->GET();

            //Si no existe la PK solicitada se muestra mensage de error
            //de lo contrario se muestra la tabla
            if ($group->num_rows != 1) {
                include_once "../Views/MESSAGE_View.php";
                new MESSAGE("El grupo no existe", "../Controllers/User_SHOWGROUPS_Controller.php?login=".$_REQUEST['login']);
            } else {
                include_once '../Views/User_REMOVEGROUP_View.php';
                new User_REMOVEGROUP_View($group,$_REQUEST['login']);
            }

        } else {
            //Se crea un DAO y le pasan la PK
            //se elmina la tupla de la BD
            //y se retorna el message de la operacion
            include_once '../Models/User_Model.php';
            $usuario = new UserDAO($_REQUEST['login'], "");
            $message = $usuario->removeGroup($_REQUEST['IdGrupo']);
            include_once "../Views/MESSAGE_View.php";
            new MESSAGE($message, "../Controllers/User_SHOWGROUPS_Controller.php?login=".$_REQUEST['login']);
        }
    }
}


?>