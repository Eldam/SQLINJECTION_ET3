<?php


class Work_EDIT_view
{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $work = mysqli_fetch_array($this->response);
        ?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Work_EDIT.css">


        <div class="EditFormContainer">

            <form action="../Controllers/Work_EDIT_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="EditFormHeader">
                    <h1>Editar Trabajo</h1>
                </div>

                <div class="EditForm1">
                    <br>
                    <div class="group">
                        <label for="IdTrabajo" class="label">Id Trabajo*:</label>
                        <input id="IdTrabajo" name="IdTrabajo"  type="text" class="input" value="<?php echo $work['IdTrabajo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="NombreTrabajo" class="label">Nombre Trabajo*:</label>
                        <input id="NombreTrabajo" name="NombreTrabajo" type="text" class="input" value="<?php echo $work['NombreTrabajo'];?>" onclick="comprobarAlfabetico(this,60)">
                    </div>
                    <div class="group">
                        <label for="FechaIniTrabajo" class="label">Fecha Inicio*:</label>
                        <input id="FechaIniTrabajo" type="date" name="FechaIniTrabajo" step="1" placeholder="Fecha Inicio"  value="<?php echo $work['FechaIniTrabajo'];?>" required>
                    </div>
                    <div class="group">
                        <label for="FechaFinTrabajo" class="label">Fecha Fin*:</label>
                        <input id="FechaFinTrabajo" type="date" name="FechaFinTrabajo" step="1" placeholder="Fecha Fin"  value="<?php echo $work['FechaFinTrabajo'];?>" required>
                    </div>
                    <div class="group">
                        <label for="PorcentajeNota" class="label">Porcentaje Nota*:</label>
                        <input id="PorcentajeNota" name="PorcentajeNota" type="text" class="input" value="<?php echo $work['PorcentajeNota'];?>" onclick="comprobarReal(this,0,10)">
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="Editar">
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/Work_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>






        <?php
        include '../Locales/Footer.html';
    }
}
?>