<?php
//Este controlador precisa  $_REQUEST['IdGrupo']
//y muestra todas las aciones de cada fucion
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

        //Si la variable getAll esta asignada
        //se obtiene todos las acciones que esisten para cada grupo
        //y se muestra la vista Group_ASSINGACTIONFUNCTION_View

        if(isset($_REQUEST["getAll"])) {

            //Se obtienen todas las funciones del sistema
            include_once '../Models/Function_Model.php';
            $allFunctions = (new FunctionDAO(""))->SEARCH();


            include_once '../Models/Action_Model.php';
            $FunctionsWithActions = Array();

            //Se itera a traves de todas las funcionalidades
            while ($function = mysqli_fetch_array($allFunctions)) {
                //Se obtienen todas las acciones de cada funcionalidad
                $allActionsOfFunction = (new FunctionDAO($function['IdFuncionalidad']))->getAllActions();

                //Se crea un array para almacenar las tuplas completas de acciones de esta funcionalidad
                $completeArrayOfActions = Array();

                //Se itera a traves de todas las acciones de la funcionalidad
                while ($actions = mysqli_fetch_array($allActionsOfFunction)) {
                    //Se obienen las aciones completas y se cargan en el array $completeArrayOfActions
                    $completeAction = (new ActionDAO($actions['IdAccion']))->GET();
                    $completeArrayOfActions[] = mysqli_fetch_array($completeAction);
                }

                //Se añade un nuevo elemento al array que contiene la funcion completa actual
                //el cual almacena un array con todas las aciones completas de esa funcion
                $function['actionsArray'] = $completeArrayOfActions;
                //Se añade el array que contiene la funcion completa con la lista de aciones completas
                //al array $FunctionsWithActions
                $FunctionsWithActions[]= $function;

            }

            //Se obtiene toda la informacion del grupo
            include_once '../Models/Group_Model.php';
            $grupo = mysqli_fetch_array((new GroupDAO($_REQUEST['IdGrupo']))->GET());

            //se muestra la vista ASSINGACTIONFUNCTION con todos los parametros obtenidos
            include_once '../Views/Group_ASSINGACTIONFUNCTION_View.php';
            new Group_ASSINGACTIONFUNCTION_View($FunctionsWithActions,$grupo);







        }else{

            //Se comprueba si se ha solicitado la asignacion de algun privilegio
            if(isset($_REQUEST["actionsArray"])) {
                //en caso afirmativo
                //obtienen todos los privilegios solicitados
                //Se crea un DAO con la PK
                include_once '../Models/Group_Model.php';
                $userDAO = new GroupDAO($_REQUEST['IdGrupo']);
                $message =$userDAO->setPermisions($_REQUEST['actionsArray']);


                include_once "../Views/MESSAGE_View.php";
                new MESSAGE($message,"../Controllers/Group_SHOWALL_Controller.php");








            }else{

                //En el caso de que no se halla solicitado ningun grupo
                //se muestra mensage de aleta

                include_once "../Views/MESSAGE_View.php";
                new MESSAGE("No se ha selecionado ningun privilegio","../Controllers/Group_SHOWALL_Controller.php");

            }




        }

    }


}


?>
