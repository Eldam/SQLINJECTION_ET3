<link rel="stylesheet" href="../Locales/LateralBar.css">
<?php include_once "../Functions/Permisions.php";?>
<div class="lateralBar">

    <div class="container bar">
        <label class="floatLeft" for="navBtn"><span></span></label>
        <!--<span class="floatRight paddingRight2rem">
                Sidebar Navigation
                <b><a href=""</a></b>
            </span>*/-->
    </div>
    <div class="container">
        <input type="checkbox" class="navBtn" id="navBtn" />
        <nav class="navigation">
            <ul class="line">
                <li class="line2">
                    <a href="../Controllers/Index_Controller.php"><i class="fa fa-home"></i>Home</a>
                </li>


                <?php if(hasPermisionsTo("USERS","ADD")){?>

                    <li class="line2">
                        <a href="../Controllers/User_ADD_Controller.php"><i class="fa fa-user-plus"></i>Add user</a>
                    </li>

                <?php } ?>


                <?php if(hasPermisionsTo("USERS","ACESS")){?>

                    <li class="line2">
                        <a href="../Controllers/User_SHOWALL_Controller.php"><i class="fa fa-globe"></i>Show all users</a>
                    </li>

                <?php } ?>

                <?php if(hasPermisionsTo("USERS","SEARCH")){?>

                    <li class="line2">
                        <a href="../Controllers/User_SEARCH_Controller.php"><i class="fa fa-search"></i>Search user</a>
                    </li>

                <?php } ?>

                <!------------------------------------------------------------------------------------------------------------------------>

                <?php if(hasPermisionsTo("GROUPS","ADD")){?>

                    <li class="line2">
                        <a href="../Controllers/Group_ADD_Controller.php"><i class="fa fa-users"></i>Add group</a>
                    </li>

                <?php } ?>


                <?php if(hasPermisionsTo("GROUPS","ACESS")){?>

                    <li class="line2">
                        <a href="../Controllers/Group_SHOWALL_Controller.php"><i class="fa fa-globe"></i>Show all groups</a>
                    </li>

                <?php } ?>

                <?php if(hasPermisionsTo("GROUPS","SEARCH")){?>

                    <li class="line2">
                        <a href="../Controllers/Group_SEARCH_Controller.php"><i class="fa fa-search"></i>Search group</a>
                    </li>

                <?php } ?>

                <!------------------------------------------------------------------------------------------------------------------------>



                <?php if(hasPermisionsTo("PERMIS","ACESS")){?>

                    <li class="line2">
                        <a href="../Controllers/Permission_SHOWALL_Controller.php"><i class="fa fa-globe"></i>Show all permissions</a>
                    </li>

                <?php } ?>

                <?php if(hasPermisionsTo("PERMIS","SEARCH")){?>

                    <li class="line2">
                        <a href="../Controllers/Permission_SEARCH_Controller.php"><i class="fa fa-search"></i>Search permission</a>
                    </li>

                <?php } ?>

                <!------------------------------------------------------------------------------------------------------------------------>





            </ul>
        </nav>
    </div>
</div>

