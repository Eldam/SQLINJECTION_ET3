<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/23/17
 * Time: 7:38 PM
 */

class Work_SHOWHISTORY_View
{
    var $response;
    var $IdTrabajo;

    function __construct($response,$IdTrabajo){
        $this->response = $response;
        $this->IdTrabajo = $IdTrabajo;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        ?>
        <link rel="stylesheet" href="../Locales/Work_SHOWHISTORY.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        echo '<h1 style="color: white;padding-left: 100px ">Se han encontrado '.count($this->response).' Historia(s).</h1>';
        ?>


        <div class="tableShowGroup">

            <div class="containGroups">
                <table class="table">
                    <tr>
                        <th>Id Historia</th>
                        <th>Texto Historia</th>
                        <th>borrar</th>
                    </tr>



                    <?php



                        while($history = mysqli_fetch_array($this->response)){


                        echo "<tr>";
                        echo "<td>" . $history['IdHistoria'] . "</td>" .
                            "<td>" . $history['TextoHistoria'] . "</td>" .
                            '<td><a href="../Controllers/Work_REMOVEHISTORY_Controller.php?IdTrabajo='.$this->IdTrabajo.'&IdHistoria=' . $history["IdHistoria"] . '"><i class="fa fa-trash" id="delIcon"></i></a></td>' .
                            "</tr>";

                    }
                    ?>
                </table>

            </div>

            <div class="ActionButtons">
                <!-- <a href="../Controllers/User_SEARCH_Controller.php"><i class="fa fa-search" id="searchIcon"></i></a> -->
                <a href="../Controllers/Work_ASSINGHISTORY_Controller.php?value=<?php echo $this->IdTrabajo ?>"><i class="fa fa-plus-square" id="addIcon" title="Asignar grupo"></i></a>
                <a href=' ../Controllers/Work_SHOWALL_Controller.php'><i class="fa fa-arrow-circle-left " id="returnIcon" title="Volver"></i></a>
            </div>

        </div>






        <?php
        include '../Locales/Footer.html';
    }

}

?>