<?php


//Fucion hasPermisionsTo comprueba que el usuario de la sesion
//posse permisos para la accion en fucionalidad solicitada
//retorna true en caso correcto
//de lo contrario false
function hasPermisionsTo(string $IdFuncionalidad,string $IdAccion): bool {

    //Se obtienen los grupos del usuario
    include_once "../Models/User_Model.php";
    $DAO = new UserDAO($_SESSION['login'],"");
    $groups = $DAO->getGroups();


    //Se comprueba si alguno de los grupos a los que pertenece el usuario posse los permisos
    include_once "../Models/Group_Model.php";
    foreach($groups as $group){
        //echo "<br><h1 style='color: red'> ".$group." ".$IdFuncionalidad." ".$IdAccion."</h1><br>";
        //Retornara true en el caso de que posea los permisos
        if((new GroupDAO($group))->hasPermisionsOnTheAction($IdFuncionalidad,$IdAccion)){
            return true;
        }
    }
    return false;

} //end of function hasPermisionsTo()
?>