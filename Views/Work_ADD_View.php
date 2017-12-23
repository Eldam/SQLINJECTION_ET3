<?php

class Work_ADD_View
{
    function __construct(){
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        include '../Locales/Work_ADD.php';
        include '../Locales/Footer.html';
    }
}