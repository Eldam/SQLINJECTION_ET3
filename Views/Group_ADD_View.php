<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:33 PM
 */

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