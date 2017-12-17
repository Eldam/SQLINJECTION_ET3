<?php
//Fichero que contiene una un controlador
//Autor:
//Fecha: 6/10/2017

//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
    header('Location: ./index.php');
}
//esta autenticado
else{
    //Se crea un DAO y le pasan todos los paramertos vacios
    //y se muestra la vista ShowAll con todos los parametros obtenidos

    include '../Models/User_Model.php';
    $userDAO = new UserDAO("","");
    $resultado=$userDAO->SEARCH();

    include '../Views/User_SHOWALL_View.php';
    new User_SHOWALL_View($resultado);

}


?>


