<?php


//Este controlador precisa $_REQUEST['login'] obtiene todos los grupos a los que pertenece dicho login
//para posteriomente cargarlos en la vista User_ASSINGTOGROUP_View
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

        $IdTrabajo =$_REQUEST['value'];
        //Se crea un DAO con la PK
        //y se obtiene la lista de grupos a los que pertenece
        include_once '../Models/Work_Model.php';
        $workDAO = new WorkDAO($IdTrabajo);
        $IDHistorias = $workDAO->getHistories();





        //se muestra la vista ShowGrups con todos los parametros obtenidos
        include_once '../Views/Work_SHOWHISTORY_View.php';
        new Work_SHOWHISTORY_View($IDHistorias,$IdTrabajo);

    }


}


?>
