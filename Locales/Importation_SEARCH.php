<meta charset="utf-8">
<link rel="stylesheet" href="../Locales/Importation_SEARCH.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="SearchFormContainer">

    <form action="../Controllers/Importation_SEARCH_Controller.php" method="post">

        <div class="SearchFormHeader">
            <h1>Buscar Entrega</h1>
        </div>


        <div class="SearchForm1">
            <br>
            <div class="group">
                <label for="IdTrabajo" class="label">Id Trabajo*:</label>
                <input id="IdTrabajo" name="IdTrabajo"  type="text" class="input" autofocus placeholder="Id Trabajo">
            </div>
            <div class="group">
                <label for="NombreTrabajo" class="label">Nombre Trabajo*:</label>
                <input id="NombreTrabajo" name="NombreTrabajo" type="text" class="input" placeholder="Nombre Trabajo">
            </div>
            <div class="group">
                <label for="FechaIniTrabajo" class="label">Fecha Inicio*:</label>
                <input id="FechaIniTrabajo" type="date" name="FechaIniTrabajo" step="1" placeholder="Fecha Inicio"  value="<?php echo date("d-m-Y");?>">
            </div>
            <div class="group">
                <label for="FechaFinTrabajo" class="label">Fecha Fin*:</label>
                <input id="FechaFinTrabajo" type="date" name="FechaFinTrabajo" step="1" placeholder="Fecha Fin"  value="<?php echo date("d-m-Y");?>">
            </div>
            <div class="group">
                <input id="PorcentajeNota" name="PorcentajeNota" class="input" type="hidden">
            </div>
            <div class="group">
                <input id="send" type="submit" class="button" value="Buscar">
            </div>
            <div class="group">
                <a href="../Controllers/Index_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
            </div>
        </div>

    </form>
</div>