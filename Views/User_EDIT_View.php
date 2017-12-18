<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:31 PM
 */

class User_EDIT_View
{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        $user = mysqli_fetch_array($this->response);
?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/User_EDIT.css">


        <div class="EditFormContainer">

            <form action="../Controllers/User_EDIT_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="EditFormHeader">
                    <h1>Editar Usuario</h1>
                </div>

                <div class="EditForm1">
                    <br>
                    <div class="group">
                        <label for="login" class="label">Login*:</label>
                        <input id="login" name="login"  type="text" class="input" value="<?php echo $user['login'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="password" class="label">Password*:</label>
                        <input id="password" name="password" type="password" class="input" data-type="password" value="<?php echo $user['password'];?>">
                    </div>
                    <div class="group">
                        <label for="DNI" class="label">DNI*:</label>
                        <input id="DNI" name="DNI" type="text" class="input" value="<?php echo $user['DNI'];?>">
                    </div>
                    <div class="group">
                        <label for="Correo" class="label">Email*:</label>
                        <input id="Correo" name="Correo" class="input" value="<?php echo $user['Correo'];?>">
                    </div>
                    <div class="group">
                        <label for="Nombre" class="label">Nombre*:</label>
                        <input id="Nombre" name="Nombre" class="input" value="<?php echo $user['Nombre'];?>">
                    </div>
                    <div class="group">
                        <label for="Apellidos" class="label">Apellido*:</label>
                        <input id="Apellidos" name="Apellidos" class="input" value="<?php echo $user['Apellidos'];?>">
                    </div>
                    <div class="group">
                        <label for="Telefono" class="label">Telefono*:</label>
                        <input id="Telefono" name="Telefono" class="input" value="<?php echo $user['Telefono'];?>">
                    </div>
                    <div class="group">
                        <label for="Direccion" class="label">Direccion*:</label>
                        <input id="Direccion" name="Direccion" class="input" value="<?php echo $user['Direccion'];?>">
                    </div>

                    <div class="group">
                        <input id="send" type="submit" class="button" value="Editar" onclick="comprobarVacio(this)">
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/User_SHOWALL_Controller.php"><i class="fa fa-undo" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>






<?php
        include '../Locales/Footer.html';
    }
}
?>