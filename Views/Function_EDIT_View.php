<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:38 PM
 */

class Function_EDIT_View
{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        $function = mysqli_fetch_array($this->response);
        ?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Function_EDIT.css">


        <div class="EditFormContainer">

            <form action="../Controllers/Function_EDIT_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="EditFormHeader">
                    <h1>Editar Funcionalidad</h1>
                </div>

                <div class="EditForm1">
                    <br>
                    <div class="group">
                        <label for="IdFuncionalidad" class="label">Id Funcionalidad*:</label>
                        <input id="IdFuncionalidad" name="IdFuncionalidad"  type="text" class="input" value="<?php echo $function['IdFuncionalidad'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="NombreFuncionalidad" class="label">Nombre Funcionalidad*:</label>
                        <input id="NombreFuncionalidad" name="NombreFuncionalidad" type="text" class="input" value="<?php echo $function['NombreFuncionalidad'];?>" onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="DescripFuncionalidad" class="label">DescripFuncionalidad*:</label>
                        <input id="DescripFuncionalidad" name="DescripFuncionalidad" type="text" class="input" value="<?php echo $function['DescripFuncionalidad'];?>" onclick="comprobarVacio(this)">
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="Editar" onclick="comprobarVacio(this)">
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