<?php
//Este controlador precisa $_REQUEST['login'] y $_REQUEST['IdGrupo']
//y asigna el grupo al usuario solicitado
//Autor:
//Fecha: 6/10/2017

//session
session_start();
//incluir funcion autenticacion
include_once '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
    header('Location: ./index.php');
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



        //Se crea un DAO con la PK
        //y se obtiene la lista de grupos a los que pertenece
        include_once '../Models/User_Model.php';
        $userDAO = new UserDAO($_REQUEST['login'], "");
        $userIdGroups = $userDAO->getGroups();

        //echo "<br><h1 style='color: red'> "."".implode($userIdGroups)."</h1><br>";

        //Se crea un DAO con la PK
        //y se obtiene la lista de todos grupos
        include_once '../Models/Group_Model.php';
        $allGroups= (new GroupDAO(""))->SEARCH();

        //Se crea un array vacio
        $notUserGroups = Array();

        //Se añaden al array $notUserGroups todos los grupos que no posee el usuario
        while ($group = mysqli_fetch_array($allGroups)){
            if(!in_array($group["IdGrupo"],$userIdGroups)){
                $notUserGroups[] = $group;
            }
        }



        //se muestra la vista ASSINGTOGROUP con todos los parametros obtenidos
        include_once '../Views/User_ASSINGTOGROUP_View.php';
        new User_ASSINGTOGROUP_View($notUserGroups);

    }


}


?>

