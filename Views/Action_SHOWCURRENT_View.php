<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:41 PM
 */

class Action_SHOWCURRENT_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $action = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Action_SHOWCURRENT.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="CurrentFormContainer">

            <div class="CurrentHeader">
                <h1>Accion</h1>
            </div>

            <div class="CurrentForm1">
                <br>
                <div class="group">
                    <label for="IdAccion" class="label">IdAccion*:</label>
                    <input id="IdAccion" name="IdAccion"  type="text" class="input" value="<?php echo $action['IdAccion'];?>" readonly>
                </div>
                <div class="group">
                    <label for="NombreAccion" class="label">Nombre Accion*:</label>
                    <input id="NombreAccion" name="NombreAccion" type="text" class="input" value="<?php echo $action['NombreAccion'];?>" readonly>
                </div>
                <div class="group">
                    <label for="DescripAccion" class="label">Descripcion Accion*:</label>
                    <input id="DescripAccion" name="DescripAccion" class="input" value="<?php echo $action['DescripAccion'];?>" readonly>
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