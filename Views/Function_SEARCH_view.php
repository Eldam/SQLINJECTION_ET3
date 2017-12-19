<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:38 PM
 */

class Function_SEARCH_view
{
    function __construct()
    {
        $this->render();
    }

    function render()
    {
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        include '../Locales/Function_SEARCH.html';
        include '../Locales/Footer.html';
    }
}