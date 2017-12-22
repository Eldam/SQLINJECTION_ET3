<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:34 PM
 */

class Group_EDIT_View
{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $group = mysqli_fetch_array($this->response);
        ?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Group_EDIT.css">


        <div class="EditFormContainer">

            <form action="../Controllers/Group_EDIT_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="EditFormHeader">
                    <h1>Editar Grupo</h1>
                </div>

                <div class="EditForm1">
                    <br>
                    <div class="group">
                        <label for="IdGrupo" class="label">Id Grupo*:</label>
                        <input id="IdGrupo" name="IdGrupo"  type="text" class="input" value="<?php echo $group['IdGrupo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="NombreGrupo" class="label">Nombre Grupo*:</label>
                        <input id="NombreGrupo" name="NombreGrupo" type="text" class="input" value="<?php echo $group['NombreGrupo'];?>" onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="DescripGrupo" class="label">Descripcion Grupo*:</label>
                        <textarea id="DescripGrupo" name="DescripGrupo" type="text" class="input" onclick="comprobarVacio(this)"><?php echo $group['DescripGrupo'];?></textarea>
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="Editar" onclick="comprobarVacio(this)">
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/Group_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>






        <?php
        include '../Locales/Footer.html';
    }
}
?>