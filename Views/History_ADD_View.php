<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:50 PM
 */

class History_ADD_View
{
    var $idTrabajo;
    function __construct($idTrabajo){
        $this->idTrabajo = $idTrabajo;
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/History_ADD.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="AddFormContainer">

            <form action="../Controllers/History_ADD_Controller.php?idTrabajo=<?php echo $this->idTrabajo ?>" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="AddFormHeader">
                    <h1>A�adir Historia</h1>
                </div>
                <div class="AddForm1">
                    <br>

                    <div class="group">
                        <label for="NombreFuncionalidad" class="label">Nombre Funcionalidad*:</label>
                        <textarea id="NombreFuncionalidad" name="NombreFuncionalidad" maxlength="300" rows="4" cols="100" class="input" placeholder="NombreFuncionalidad" required onchange="comprobarVacio(this);comprobarAlfabetico(this,300)"></textarea>
                    </div>

                    <div class="group" id="sendDiv">
                        <button id="send" type="submit" class="fa fa-plus-circle button" value="" title="A�ADIR" onclick="comprobarVacio(this)"></button>
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/Index_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>
                </div>

            </form>
        </div>



<?php


        include '../Locales/Footer.html';
    }
}