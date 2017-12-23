<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:54 PM
 */

class ImportationUser_EDIT_View
{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $importation = mysqli_fetch_array($this->response);
        ?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/ImportationUser_EDIT.css">


        <div class="EditFormContainer">

            <form action="../Controllers/Work_EDIT_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="EditFormHeader">
                    <h1>Editar Entrega</h1>
                </div>

                <div class="EditForm1">
                    <br>
                    <div class="group">
                        <label for="login" class="label">Login*:</label>
                        <input id="login" name="login"  type="text" class="input" value="<?php echo $importation['login'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="IdTrabajo" class="label">Id Trabajo*:</label>
                        <input id="IdTrabajo" name="IdTrabajo"  type="text" class="input" value="<?php echo $importation['IdTrabajo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="NombreTrabajo" class="label">Nombre Trabajo*:</label>
                        <input id="NombreTrabajo" name="NombreTrabajo" type="text" class="input" value="<?php echo $importation['NombreTrabajo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="FechaIniTrabajo" class="label">Fecha Inicio*:</label>
                        <input id="FechaIniTrabajo" type="date" name="FechaIniTrabajo" step="1" placeholder="Fecha Inicio"  value="<?php echo $importation['FechaIniTrabajo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="FechaFinTrabajo" class="label">Fecha Fin*:</label>
                        <input id="FechaFinTrabajo" type="date" name="FechaFinTrabajo" step="1" placeholder="Fecha Fin"  value="<?php echo $importation['FechaFinTrabajo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="PorcentajeNota" class="label">Hora:</label>
                        <input id="PorcentajeNota" name="PorcentajeNota" type="text" class="input" value="<?php echo $importation['PorcentajeNota'];?>">
                    </div>
                    <div class="group">
                        <label for="Ruta" class="label">Ruta:</label>
                        <input id="Ruta" name="Ruta" type="text" class="input" value="<?php echo $importation['Ruta'];?>">
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="Editar">
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/ImportationUser_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>






        <?php
        include '../Locales/Footer.html';
    }
}
?>