<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:38 PM
 */

class Function_DELETE_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $function = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Function_DELETE.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="DeleteFormContainer">

            <form action="../Controllers/Function_DELETE_Controller.php?confirm=yes&value=<?php echo $function['IdFuncionalidad'];?>" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="DeleteFormHeader">
                    <h1>Borrar Funciionalidad</h1>
                </div>

                <div class="DeleteForm1">
                    <br>
                    <div class="group">
                        <label for="IdFuncionalidad" class="label">Id Funcionalidad*:</label>
                        <input id="IdFuncionalidad" name="IdFuncionalidad"  type="text" class="input" value="<?php echo $function['IdFuncionalidad'];?>" readonly onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="NombreFuncionalidad" class="label">Nombre Funcionalidad*:</label>
                        <input id="NombreFuncionalidad" name="NombreFuncionalidad" type="text" class="input" value="<?php echo $function['NombreFuncionalidad'];?>" readonly onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="DescripFuncionalidad" class="label">Descripcion Funcionalidad*:</label>
                        <input id="DescripFuncionalidad" name="DescripFuncionalidad" class="input" value="<?php echo $function['DescripFuncionalidad'];?>" readonly onclick="comprobarVacio(this)">
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="BORRAR" onclick="comprobarVacio(this)">
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