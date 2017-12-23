<meta charset="utf-8">
<link rel="stylesheet" href="../Locales/Work_ADD.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="AddFormContainer">

    <form action="../Controllers/Work_ADD_Controller.php" onsubmit="comprobarFormVaciosWithoutButton(this)" method="post">

        <div class="AddFormHeader">
            <h1>Añadir Trabajo</h1>
        </div>
        <div class="AddForm1">
            <br>
            <div class="group">
                <label for="IdTrabajo" class="label">IdTrabajo*:</label>
                <input id="IdTrabajo" name="IdTrabajo"  type="text" class="input" maxlength="6" autofocus placeholder="IdTrabajo"
                       onchange="comprobarVacio(this);comprobarAlfabetico(this,6)" required>
            </div>
            <div class="group">
                <label for="NombreTrabajo" class="label">Nombre Trabajo*:</label>
                <input id="NombreTrabajo" name="NombreTrabajo" type="text" class="input" maxlength="60" placeholder="Nombre Trabajo" required onchange="comprobarVacio(this);comprobarAlfabetico(this,60)">
            </div>
            <div class="group">
                <label for="FechaIniTrabajo" class="label">Fecha Inicio*:</label>
                <input id="FechaIniTrabajo" type="date" name="FechaIniTrabajo" step="1" placeholder="Fecha Inicio"  value="<?php echo date("d-m-Y");?>" required>
            </div>
            <div class="group">
                <label for="FechaFinTrabajo" class="label">Fecha Fin*:</label>
                <input id="FechaFinTrabajo" type="date" name="FechaFinTrabajo" step="1" placeholder="Fecha Fin"  value="<?php echo date("d-m-Y");?>" required>
            </div>
            <div class="group">
                <label for="PorcentajeNota" class="label">Porcentaje Nota*:</label>
                <input id="PorcentajeNota" name="PorcentajeNota" class="input" value="0.0" maxlength="2" required onchange="comprobarReal(this,0,10)">
            </div>

            <div class="group" id="sendDiv">
                <button id="send" type="submit" class="fa fa-plus-circle button" value="" title="AÑADIR"></button>
            </div>
            <div class="backBttn">
                <a href="../Controllers/Index_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
            </div>
        </div>

    </form>
</div>