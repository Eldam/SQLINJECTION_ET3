<?php

class User_ADD_View
{
    function __construct(){
        $this->render();
    }

    function render(){
            include '../Locales/Header.html';
            include '../Locales/LateralBarAdmin.html';
            include '../Locales/User_ADD.html';
            include '../Locales/Footer.html';
    }
}