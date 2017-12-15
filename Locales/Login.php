<link rel="stylesheet" href="../Locales/Login.css">
<link rel="text/javascript" href="../Locales/Validaciones.js">
<div class="main">

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" <?php if (!isset($_REQUEST['register']))echo 'checked'; ?> ><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"<?php if (isset($_REQUEST['register']))echo 'checked'; ?>><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">

                <form method="post" action="../Controllers/Login_Controller.php">

                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="login" class="label">Username</label>
                            <input id="login" name="login"  type="text" class="input" autofocus onchange="comprobarVacio(this);">
                        </div>
                        <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" name="password" type="password" class="input" data-type="password" required onchange="comprobarVacio(this);comprobarAlfabetico(this,9)">
                        </div>
                        <div class="group">
                            <input id="send" type="submit" class="button" value="Sign In" onclick="comprobarVacio(this)">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-2">Not Registered?</label>
                        </div>
                    </div>

                </form>

                <form method="post" action="../Controllers/Register_Controller.php">

                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="login" class="label">login</label>
                            <input id="login" name="login"  type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" name="password" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="DNI" class="label">DNI</label>
                            <input id="DNI" name="DNI" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="Nombre" class="label">Nombre</label>
                            <input id="Nombre" name="Nombre" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="Apellidos" class="label">Apellidos</label>
                            <input id="Apellidos" name="Apellidos" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="Correo" class="label">Correo</label>
                            <input id="Correo" name="Correo" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="Direccion" class="label">Direccion</label>
                            <input id="Direccion" name="Direccion" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="Telefono" class="label">Telefono</label>
                            <input id="Telefono" name="Telefono" type="text" class="input">
                        </div>
                        <div class="group">
                            <input id="send" type="submit" class="button" value="Sign Up">
                        </div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</label>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>