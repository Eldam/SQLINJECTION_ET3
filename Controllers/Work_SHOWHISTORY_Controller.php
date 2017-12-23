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

        $IdTrabajo =$_REQUEST['IdTrabajo'];
        //Se crea un DAO con la PK
        //y se obtiene la lista de grupos a los que pertenece
        include_once '../Models/Work_Model.php';
        $workDAO = new WorkDAO($IdTrabajo);
        $IDHistorias = $workDAO->getHistories();

        //Se crea un array para almacenar la informacion completa de
        // todos los grupos a los que pertence el usuario
        $completeHistories = Array();

        include_once '../Models/History_Model.php';
        //Se itera a traves del array de IDgrupos y se carga en el complete grups
        //la informacion completa de cada grupo
        foreach($IDHistorias as $group){
            $completeHistories[] = (new HistoryDAO($group))->GET();
        }



        //se muestra la vista ShowGrups con todos los parametros obtenidos
        include_once '../Views/Work_SHOWGROUPS_View.php';
        new Work_SHOWGROUPS_View($completeHistories,$IdTrabajo);

    }


}


?>
