<?php
//m3xep6
//08/11/2017
class Login{


    function __construct(){
        $this->render();
    }

    function render(){

        include '../Locales/Header.html';
        include '../Locales/LateralBarUser.html';
        include '../Locales/Login.html';
        include '../Locales/Footer.html';
    } //fin metodo render

} //fin Login

?>
