<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:50 PM
 */

class History_DELETE_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        $history = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/History_DELETE.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="DeleteFormContainer">

            <form action="../Controllers/History_DELETE_Controller.php?confirm=yes&value=<?php echo $history['IdHistoria'];?>" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="DeleteFormHeader">
                    <h1>Borrar Historia</h1>
                </div>

                <div class="DeleteForm1">
                    <br>
                    <div class="group">
                        <label for="IdHistoria" class="label">Id Historia*:</label>
                        <input id="IdHistoria" name="IdHistoria"  type="text" class="input" value="<?php echo $history['IdHistoria'];?>" readonly onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="IdTrabajo" class="label">Id Trabajo*:</label>
                        <input id="IdTrabajo" name="NombreFuncionalidad" type="text" class="input" value="<?php echo $history['IdTrabajo'];?>" readonly onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="TextoHistoria" class="label">TextoHistoria*:</label>
                        <textarea id="TextoHistoria" name="TextoHistoria" class="input" readonly onclick="comprobarVacio(this)"><?php echo $history['TextoHistoria'];?></textarea>
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="BORRAR" onclick="comprobarVacio(this)">
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