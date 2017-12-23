<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:49 PM
 */

class Work_SHOWCURRENT_View
{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $work = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Work_SHOWCURRENT.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="CurrentFormContainer">

            <div class="CurrentHeader">
                <h1>Trabajo <span style="color: goldenrod"> <?php echo $work['IdTrabajo'];?></span></h1>
            </div>

            <div class="CurrentForm1">
                <br>
                <div class="group">
                    <label for="IdTrabajo" class="label">Id Trabajo*:</label>
                    <input id="IdTrabajo" name="IdTrabajo"  type="text" class="input" value="<?php echo $work['IdTrabajo'];?>" readonly>
                </div>
                <div class="group">
                    <label for="NombreTrabajo" class="label">Nombre Trabajo*:</label>
                    <input id="NombreTrabajo" name="NombreTrabajo" type="text" class="input" value="<?php echo $work['NombreTrabajo'];?>" readonly>
                </div>
                <div class="group">
                    <label for="FechaIniTrabajo" class="label">Fecha Inicio*:</label>
                    <input id="FechaIniTrabajo" name="FechaIniTrabajo" class="input" value="<?php echo $work['FechaIniTrabajo'];?>" readonly>
                </div>
                <div class="group">
                    <label for="FechaFinTrabajo" class="label">Fecha Fin*:</label>
                    <input id="FechaFinTrabajo" name="FechaFinTrabajo" class="input" value="<?php echo $work['FechaFinTrabajo'];?>" readonly>
                </div>
                <div class="group">
                    <label for="PorcentajeNota" class="label">Porcentaje Nota*:</label>
                    <input id="PorcentajeNota" name="PorcentajeNota" class="input" value="<?php echo $work['PorcentajeNota'];?>" readonly>
                </div>

                <div class="backBttn">
                    <a href="../Controllers/Work_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                </div>


            </div>
        </div>



        <?php
        include '../Locales/Footer.html';
    }

}

?>