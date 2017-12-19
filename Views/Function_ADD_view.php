<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:37 PM
 */

class Function_ADD_view
{
    function __construct(){
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        include '../Locales/Function_ADD.html';
        include '../Locales/Footer.html';
    }
}