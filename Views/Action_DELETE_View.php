<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:41 PM
 */

class Action_DELETE_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        $action = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Action_DELETE.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="DeleteFormContainer">

            <form action="../Controllers/Action_DELETE_Controller.php?confirm=yes&value=<?php echo $action['IdFuncionalidad'];?>" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="DeleteFormHeader">
                    <h1>Borrar Accion</h1>
                </div>

                <div class="DeleteForm1">
                    <br>
                    <div class="group">
                        <label for="IdAccion" class="label">Id Accion*:</label>
                        <input id="IdAccion" name="IdAccion"  type="text" class="input" value="<?php echo $action['IdAccion'];?>" readonly onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="NombreAccion" class="label">Nombre Accion*:</label>
                        <input id="NombreAccion" name="NombreFuncionalidad" type="text" class="input" value="<?php echo $action['NombreAccion'];?>" readonly onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="DescripAccion" class="label">Descripcion Accion*:</label>
                        <input id="DescripAccion" name="DescripAccion" class="input" value="<?php echo $action['DescripAccion'];?>" readonly onclick="comprobarVacio(this)">
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="BORRAR" onclick="comprobarVacio(this)">
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/Action_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>



        <?php
        include '../Locales/Footer.html';
    }

}

?>