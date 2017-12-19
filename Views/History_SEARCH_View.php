<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:50 PM
 */

class History_SEARCH_View
{
    function __construct()
    {
        $this->render();
    }

    function render()
    {
        include '../Locales/Header.html';
        include '../Locales/LateralBarAdmin.html';
        include '../Locales/History_SEARCH.html';
        include '../Locales/Footer.html';
    }
}