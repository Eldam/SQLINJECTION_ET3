<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:51 PM
 */

class History_SHOWCURRENT_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        $history = mysqli_fetch_array($this->response);
        ?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../Locales/History_SHOWCURRENT.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <div class="CurrentFormContainer">

            <div class="CurrentHeader">
                <h1>Historia <span style="color: goldenrod"> <?php echo $history['IdTrabajo'];?></span></h1>
            </div>

            <div class="CurrentForm1">
                <br>
                <div class="group">
                    <label for="IdTrabajo" class="label">Id Trabajo*:</label>
                    <input id="IdTrabajo" name="IdTrabajo"  type="text" class="input" value="<?php echo $history['IdTrabajo'];?>" readonly>
                </div>
                <div class="group">
                    <label for="IdHistoria" class="label">Id Historia*:</label>
                    <input id="IdHistoria" name="IdHistoria" type="text" class="input" value="<?php echo $history['IdHistoria'];?>" readonly>
                </div>
                <div class="group">
                    <label for="TextoHistoria" class="label">Texto Historia*:</label>
                    <textarea id="TextoHistoria" name="TextoHistoria" class="input" readonly ><?php echo $history['TextoHistoria'];?></textarea>
                </div>

                <div class="backBttn">
                    <a href="../Controllers/Index_Controller.php"><i class="fa fa-arrow-circle-left" id="returnIcon"></i></a>
                </div>


            </div>
        </div>



        <?php
        include '../Locales/Footer.html';
    }

}

?>