<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:34 PM
 */

class Group_DELETE_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $group = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/Group_DELETE.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="DeleteFormContainer">

            <form action="../Controllers/Group_DELETE_Controller.php?confirm=yes&value=<?php echo $group['login'];?>" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="DeleteFormHeader">
                    <h1>Borrar Grupo</h1>
                </div>

                <div class="DeleteForm1">
                    <br>
                    <div class="group">
                        <label for="IdGrupo" class="label">Id Grupo*:</label>
                        <input id="IdGrupo" name="IdGrupo"  type="text" class="input" value="<?php echo $group['IdGrupo'];?>" readonly onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="NombreGrupo" class="label">Nombre Grupo*:</label>
                        <input id="NombreGrupo" name="NombreGrupo" type="text" class="input" value="<?php echo $group['NombreGrupo'];?>" readonly onclick="comprobarVacio(this)">
                    </div>
                    <div class="group">
                        <label for="DescripGrupo" class="label">DescripGrupo*:</label>
                        <input id="DescripGrupo" name="DescripGrupo" class="input" value="<?php echo $group['DescripGrupo'];?>" readonly onclick="comprobarVacio(this)">
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="BORRAR" onclick="comprobarVacio(this)">
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
