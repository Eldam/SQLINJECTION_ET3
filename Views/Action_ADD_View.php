<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:40 PM
 */

class Action_ADD_View
{
    function __construct(){
        $this->render();
    }

    function render(){
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        include '../Locales/Action_ADD.html';
        include '../Locales/Footer.html';
    }
}