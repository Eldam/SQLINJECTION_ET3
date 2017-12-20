<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:35 PM
 */

class Group_ASSINGACTIONFUNCTION_View{
    var $FunctionsWithActions; //todas las fuciones con sus respectivas aciones
    var $grupo;// guarda el toda la informacion del grupo


    function __construct($FunctionsWithActions,$grupo){
        $this->FunctionsWithActions = $FunctionsWithActions;
        $this->grupo = $grupo;
        $this->render();
    }

    function render()
    {

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        //<meta charset="utf-8">
        ?>


        <link rel="stylesheet" href="../Locales/Group_ASSINGACTIONFUNCTION.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="CurrentFormContainer">

            <form action="../Controllers/Group_ASSINGACTIONFUNCTION_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="CurrentHeader">
                    <h1>Permisos para <?php echo $this->grupo['NombreGrupo']?></h1>

                </div>

                <div class="CurrentForm1">
                    <br>
                    <br>
<?php


                    foreach ($this->FunctionsWithActions as $FunctionWithActions) {

                        echo '<div class="group" >';
                        //echo '<label for="'.$FunctionWithActions['NombreFuncionalidad'].'" class="label" >'.$FunctionWithActions['DescripFuncionalidad'].'</label>';
                        echo "<h3>".$FunctionWithActions['NombreFuncionalidad'] ."       [" . $FunctionWithActions['DescripFuncionalidad']."]</h3>";
                        foreach($FunctionWithActions['actionsArray'] as $action){

                            echo '<label><input type="checkbox" id="??" value="??">'.$action['NombreAccion'].' '.$action['DescripAccion'].'</label><br>';
                            //echo '<input id="'.$action['NombreAccion'].'" name= "'.$action['NombreAccion'].'" type="text" class="input" value= "'.$action['NombreAccion'].'" readonly>';

                        }
                        echo "<br>";
                        echo '</div>';

                    }
?>
                    <div class="group">
                        <input id="send" type="submit" class="button" value="ASIGNAR" onclick="comprobarVacio(this)">
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/User_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>
                </div>
            </form>
        </div>



        <?php
        include '../Locales/Footer.html';
    }

}

?>