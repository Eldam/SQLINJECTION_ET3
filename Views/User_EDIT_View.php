<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:31 PM
 */

class User_EDIT_View
{
    var $user;
    function __construct($user){
        $this->user = $user;
        $this->render();
    }

    function render(){
        echo "<h1>EDIT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</h1>";
    }


}