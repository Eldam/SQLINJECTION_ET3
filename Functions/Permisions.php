<?php
function hasPermisionsTo(string $user,string $function): bool {

    include_once "../Models/User_Model.php";
    $DAO = new UserDAO($_SESSION['login'],"");

    $groups = $DAO->getGroups();

    foreach($groups as $group){

    }


    return true;

} //end of function hasPermisionsTo()
?>