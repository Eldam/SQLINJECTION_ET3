<?php

class Index {

    function __construct(){
        $this->render();
    }

    function render(){

        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
?>
    <div class="IndexContainer">

        <div class="IndexOption">

            <link rel="stylesheet" href="../Locales/Index.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

            <?php
            echo '<h1 style="text-align: center; border: dashed goldenrod">Bienvenido <span style="color: red;" >'.$_SESSION['login'].'.</span></h1>';
            ?>

        </div>
    </div>




<?php
        include '../Locales/Footer.html';
    }

}

?>