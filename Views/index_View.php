<?php

class Index {

    function __construct(){
        $this->render();
    }

    function render(){

        include '../Locales/Header.html';
        include '../Locales/LateralBarUser.html';
        echo "you're loging";
        echo "<a href=' ../Controllers/User_SHOWALL_Controller.php '> UserShowAll  </a>";
        include '../Locales/Footer.html';
    }

}

?>