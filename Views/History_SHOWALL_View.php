<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:51 PM
 */

class History_SHOWALL_View
{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        ?>
        <link rel="stylesheet" href="../Locales/History_SHOWALL.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        echo '<h1 style="color: white;padding-left: 100px ">Se han encontrado '.mysqli_num_rows($this->response).' Historias(s).</h1>';
        ?>


        <div class="tableShowAll">

            <div class="containTable">
                <table class="table">
                    <tr>
                        <th>Id Historia</th>
                        <th>Id Historia</th>
                        <th>Descripción Historia</th>
                        <th>Modificar</th>
                        <th>ver</th>
                        <th>borrar</th>
                    </tr>



                    <?php

                    while ($history = mysqli_fetch_array($this->response)){

                        echo "<tr>";
                        echo"<td>".$history['IdTrabajo']."</td>".
                            "<td>".$history['IdHistoria']."</td>".
                            "<td>".$history['TextoHistoria']."</td>".
                            '<td><a href="../Controllers/History_EDIT_Controller.php?value='.$history["IdTrabajo"].'"><i class="fa fa-pencil-square-o" id="modIcon"></i></td></a>'.
                            '<td><a href="../Controllers/History_SHOWCURRENT_Controller.php?value='.$history["IdTrabajo"].'"><i class="fa fa-eye" id="seeIcon"></i></td></a>'.
                            '<td><a href="../Controllers/History_DELETE_Controller.php?value='.$history["IdTrabajo"].'"><i class="fa fa-trash" id="delIcon"></i></td></a>'.
                            "</tr>";
                    }





                    ?>
                </table>

            </div>

            <div class="ActionButtons">
                <!-- MIRAR ESTO A VER COMO HACER PARA ENVIAR DESDE AQUI UN TRABAJO-->
                <a href="../Controllers/History_ADD_Controller.php"><i class="fa fa-plus-square" id="addIcon" title="Añadir historia"></i></a>
                <a href=' ../Controllers/Index_Controller.php'><i class="fa fa-arrow-circle-left " id="returnIcon" title="Volver"></i></a>
            </div>

        </div>






        <?php
        include '../Locales/Footer.html';
    }

}

?>