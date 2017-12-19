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
                    <a href="#"><i class="fa fa-home"></i>Home</a>
                </li>


                <?php if(hasPermisionsTo("USERS","ADD")){?>

                    <li class="line2">
                        <a href="#"><i class="fa fa-user-plus"></i>Add User</a>
                    </li>

                <?php } ?>


                <?php if(hasPermisionsTo("USERS","ACESS")){?>

                    <li class="line2">
                        <a href="#"><i class="fa fa-folder-open"></i>Generate QA</a>
                    </li>

                <?php } ?>


                <?php if(hasPermisionsTo("USERS","EDIT")){?>

                    <li class="line2">
                        <a href="#"><i class="fa fa-users"></i>Generate Group</a>
                    </li>

                <?php } ?>


                <?php if(hasPermisionsTo("USERS","DELETE")){?>

                    <li class="line2">
                        <a href="#"><i class="fa fa-user-plus"></i>Add User</a>
                    </li>

                <?php } ?>




            </ul>
        </nav>
    </div>
</div>

