<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:52 PM
 */

class Importation_SEARCH_View
{
    function __construct()
    {
        $this->render();
    }

    function render()
    {
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        include '../Locales/Importation_SEARCH.php';
        include '../Locales/Footer.html';
    }
}