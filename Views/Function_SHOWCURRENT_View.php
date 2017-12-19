<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:38 PM
 */

class Function_SHOWCURRENT_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        $function = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Function_SHOWCURRENT.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="CurrentFormContainer">

            <div class="CurrentHeader">
                <h1>Grupo</h1>
            </div>

            <div class="CurrentForm1">
                <br>
                <div class="group">
                    <label for="IdFuncionalidad" class="label">Id Funcionalidad*:</label>
                    <input id="IdFuncionalidad" name="IdFuncionalidad"  type="text" class="input" value="<?php echo $function['IdFuncionalidad'];?>" readonly>
                </div>
                <div class="group">
                    <label for="NombreFuncionalidad" class="label">Nombre Funcionalidad*:</label>
                    <input id="NombreFuncionalidad" name="NombreFuncionalidad" type="text" class="input" value="<?php echo $function['NombreFuncionalidad'];?>" readonly>
                </div>
                <div class="group">
                    <label for="DescripFuncionalidad" class="label">Descripcion Funcionalidad*:</label>
                    <input id="DescripFuncionalidad" name="DescripFuncionalidad" class="input" value="<?php echo $function['DescripFuncionalidad'];?>" readonly>
                </div>

                <div class="backBttn">
                    <a href="../Controllers/Index_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                </div>


            </div>
        </div>



        <?php
        include '../Locales/Footer.html';
    }

}

?>