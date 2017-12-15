<?php
//m3xep6
//08/11/2017
class Register_View{


    function __construct(){
        $this->render();
    }

    function render(){

        include '../Locales/Header.html';
        include '../Locales/LateralBarUser.html';
        $_REQUEST['register']= 'true';
        include '../Locales/Login.php';
        include '../Locales/Footer.html';
    } //fin metodo render

} //fin Login

?>
