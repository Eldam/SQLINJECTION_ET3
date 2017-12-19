<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:50 PM
 */

class History_EDIT_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $history = mysqli_fetch_array($this->response);
        ?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/History_EDIT.css">


        <div class="EditFormContainer">

            <form action="../Controllers/History_EDIT_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="EditFormHeader">
                    <h1>Editar Funcionalidad</h1>
                </div>

                <div class="EditForm1">
                    <br>
                    <div class="group">
                        <label for="TextoHistoria" class="label">Texto Historia*:</label>
                        <textarea id="TextoHistoria" name="TextoHistoria" class="input" maxlength="300" onclick="comprobarVacio(this); comprobarAlfabetico(this,300)"><?php echo $history['TextoHistoria'];?></textarea>
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="Editar" onclick="comprobarVacio(this)">
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/History_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>






        <?php
        include '../Locales/Footer.html';
    }
}
?>