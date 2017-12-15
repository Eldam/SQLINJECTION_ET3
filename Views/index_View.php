<?php

class Index {

    function __construct(){
        $this->render();
    }

    function render(){

        include '../Locales/Header.html';
        include '../Locales/LateralBarUser.html';
        echo "you're loging";
        include '../Locales/Footer.html';
    }

}

?>