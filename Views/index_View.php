<?php

class Index {

    function __construct(){
        $this->render();
    }

    function render(){

        include '../Locales/Header.html';
        include '../Locales/LateralBarUser.html';
?>
    <div class="IndexContainer">

        <div class="IndexOption">

            <link rel="stylesheet" href="../Locales/Index.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

            <a href=' ../Controllers/User_SHOWALL_Controller.php '><i class="fa fa-users" id="showAllIcon" title="ShowAll"></i></a>
            <a href=' ../Controllers/User_SEARCH_Controller.php '><i class="fa fa-search" id="userSearchIcon" title="Search"></i></a>
            <a href=' ../Controllers/User_ADD_Controller.php '><i class="fa fa-user-plus" id="userAddIcon" title="Add"></i></a>

            <a href=' ../Controllers/User_SHOWCURRENT_Controller.php '><i class="fa fa-user-circle-o" id="showCurrentIcon" title="ShowCurrent"></i></a>
            <a href=' ../Controllers/User_DELETE_Controller.php '><i class="fa fa-trash" id="userDeleteIcon" title="Delete"></i></a>

        </div>
    </div>




<?php
        include '../Locales/Footer.html';
    }

}

?>