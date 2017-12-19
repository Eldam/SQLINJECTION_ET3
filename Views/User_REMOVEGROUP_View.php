<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/18/17
 * Time: 7:00 PM
 */

class User_REMOVEGROUP_View{

    var $response;
    var $login;

    function __construct($response,$login){
        $this->response = $response;
        $this->login = $login;

        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $group = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/User_REMOVEGROUP.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="DeleteFormContainer">

            <form action="../Controllers/User_REMOVEGROUP_Controller.php?confirm=yes&idGrupo=<?php echo $group['IdGrupo'];?>&login=<?php echo $this->login;?>" method="post">

                <div class="DeleteFormHeader">
                    <h1>Estas seguro que quieres borrar este grupo del usuario: <?php echo $this->login;?>?</h1>
                </div>

                <div class="DeleteForm1">
                    <br>
                    <div class="group">
                        <label for="IdGrupo" class="label">Id Grupo*:</label>
                        <input id="IdGrupo" name="IdGrupo"  type="text" class="input" value="<?php echo $group['IdGrupo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="NombreGrupo" class="label">Nombre Grupo*:</label>
                        <input id="NombreGrupo" name="NombreGrupo" type="text" class="input" value="<?php echo $group['NombreGrupo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="DescripGrupo" class="label">Descripcion Grupo*:</label>
                        <input id="DescripGrupo" name="DescripGrupo" type="text" class="input" value="<?php echo $group['DescripGrupo'];?>" readonly>
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="BORRAR" onclick="comprobarVacio(this)">
                    </div>
                    <div class="backBttn">
                        <a href=" ../Controllers/User_SHOWGROUPS_Controller.php?login=<?php echo $this->login?>"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>



        <?php
        include '../Locales/Footer.html';
    }
}