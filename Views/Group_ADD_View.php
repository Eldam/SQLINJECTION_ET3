<?php


class Group_ADD_View
{
    function __construct(){
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        include '../Locales/Group_ADD.html';
        include '../Locales/Footer.html';
    }
}