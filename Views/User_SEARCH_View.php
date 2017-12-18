<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:31 PM
 */

class User_SEARCH_View
{
    function __construct()
    {
        $this->render();
    }

    function render()
    {
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        include '../Locales/User_SEARCH.html';
        include '../Locales/Footer.html';
    }
}