<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:40 PM
 */

class Action_EDIT_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        $action = mysqli_fetch_array($this->response);
        ?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Action_EDIT.css">


        <div class="EditFormContainer">

            <form action="../Controllers/Accion_EDIT_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="EditFormHeader">
                    <h1>Editar Accion</h1>
                </div>

                <div class="EditForm1">
                    <br>
                    <div class="group">
                        <label for="IdAccion" class="label">IdAccion*:</label>
                        <input id="IdAccion" name="IdAccion"  type="text" class="input" value="<?php echo $action['IdAccion'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="NombreAccion" class="label">Nombre Accion*:</label>
                        <input id="NombreAccion" name="NombreAccion" type="text" class="input" value="<?php echo $action['NombreAccion'];?>" onclick="comprobarVacio(this); comprobarAlfabetico(this,60)">
                    </div>
                    <div class="group">
                        <label for="DescripAccion" class="label">Descripcion Accion*:</label>
                        <input id="DescripAccion" name="DescripAccion" type="text" class="input" value="<?php echo $action['DescripAccion'];?>" onclick="comprobarVacio(this); comprobarAlfabetico(this,100)">
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="Editar" onclick="comprobarVacio(this)">
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/Function_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>






        <?php
        include '../Locales/Footer.html';
    }
}
?>