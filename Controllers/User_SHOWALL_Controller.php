<?php
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
    include '../Models/User_Model.php';
    $userDAO = new UserDAO("","");
    //$userDAO->setData("","","","","","","","");
    $resultado=$userDAO->SEARCH();

    include '../Views/User_SHOWALL_View.php';
    new User_SHOWALL_View($resultado);

}


?>


