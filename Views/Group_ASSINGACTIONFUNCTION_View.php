<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:35 PM
 */

class Group_ASSINGACTIONFUNCTION_View{
    var $actions; //guarda todos los elementos de action.
    var $actionInFunctions;// guarda las acciones que tiene cada funcion.
    var $functions;// guarda todos los elementos de function.

    function __construct($actionInFunctions,$actions,$functions){
        $this->actionInFunctions = $actionInFunctions;
        $this->actions = $actions;
        $this->functions = $functions;
        $this->render();
    }

    function render()
    {

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';

        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Group_ASSINGACTIONFUNCTION.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="CurrentFormContainer">

            <form action="../Controllers/Group_ASSINGACTIONFUNCTION_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="CurrentHeader">
                    <h1>Asignar funciones</h1>
                </div>

                <div class="CurrentForm1">
                    <br>
<?php
                    $actionInFunctions = mysqli_fetch_array($this->actionInFunctions);
                    foreach () {

                        echo '<div class="group" >';
                        echo '<label for="'.$this->functions.'" class="label" >'.$this->functions.'</label>';
                        foreach(){
                            echo '<input id="'.$this->functions.'" name= "'.$this->functions.'" type="text" class="input" value= "'.$this->actions.'" >';
                        }
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