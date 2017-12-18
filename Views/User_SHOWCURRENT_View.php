<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/15/17
 * Time: 8:01 PM
 */

class User_SHOWCURRENT_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        $user = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/User_SHOWCURRENT.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="CurrentFormContainer">

            <form action="../Controllers/User_DELETE_Controller.php" onsubmit="comprobarFormsVacios(this)" method="post">

                <div class="CurrentHeader">
                    <h1>Usuario</h1>
                </div>

                <div class="CurrentForm1">
                    <br>
                    <div class="group">
                        <label for="login" class="label">Login*:</label>
                        <input id="login" name="login"  type="text" class="input" value="<?php echo $user['login'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="password" class="label">Password*:</label>
                        <input id="password" name="password" type="password" class="input" data-type="password" value="<?php echo $user['password'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="DNI" class="label">DNI*:</label>
                        <input id="DNI" name="DNI" type="text" class="input" value="<?php echo $user['DNI'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="Correo" class="label">Email*:</label>
                        <input id="Correo" name="Correo" class="input" value="<?php echo $user['Correo'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="Nombre" class="label">Nombre*:</label>
                        <input id="Nombre" name="Nombre" class="input" value="<?php echo $user['Nombre'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="Apellidos" class="label">Apellido*:</label>
                        <input id="Apellidos" name="Apellidos" class="input" value="<?php echo $user['Apellidos'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="Telefono" class="label">Telefono*:</label>
                        <input id="Telefono" name="Telefono" class="input" value="<?php echo $user['Telefono'];?>" readonly>
                    </div>
                    <div class="group">
                        <label for="Direccion" class="label">Direccion*:</label>
                        <input id="Direccion" name="Direccion" class="input" value="<?php echo $user['Direccion'];?>" readonly>
                    </div>
                    <div class="backBttn">
                        <a href="../Controllers/User_SHOWALL_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                    </div>


                </div>

            </form>
        </div>



        <?php
        include '../Locales/Footer.html';
    }

}

?>