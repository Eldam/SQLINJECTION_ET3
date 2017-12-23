<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:49 PM
 */

class Work_SHOWALL_View
{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        include '../Locales/LateralBar.php';
        ?>
        <link rel="stylesheet" href="../Locales/Work_SHOWALL.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        echo '<h1 style="color: white;padding-left: 100px ">Se han encontrado '.'<span style="color: red;">' .mysqli_num_rows($this->response).'</span> Trabajo(s).</h1>';
        ?>


        <div class="tableShowAll">

            <div class="containTable">
                <table class="table">
                    <tr>
                        <th>Id Trabajo</th>
                        <th>Nombre Trabajo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Porcentaje Nota</th>
                        <th>Modificar</th>
                        <th>ver</th>
                        <th>borrar</th>
                    </tr>



                    <?php

                    while ($work = mysqli_fetch_array($this->response)){

                        echo "<tr>";
                        echo"<td>".$work['IdTrabajo']."</td>".
                            "<td>".$work['NombreTrabajo']."</td>".
                            "<td>".$work['FechaIniTrabajo']."</td>".
                            "<td>".$work['FechaFinTrabajo']."</td>".
                            "<td>".$work['PorcentajeNota']."</td>".
                            '<td><a href="../Controllers/Work_EDIT_Controller.php?value='.$work["IdTrabajo"].'"><i class="fa fa-pencil-square-o" id="modIcon"></i></td></a>'.
                            '<td><a href="../Controllers/Work_SHOWCURRENT_Controller.php?value='.$work["IdTrabajo"].'"><i class="fa fa-eye" id="seeIcon"></i></td></a>'.
                            '<td><a href="../Controllers/Work_DELETE_Controller.php?value='.$work["IdTrabajo"].'"><i class="fa fa-trash" id="delIcon"></i></td></a>'.
                            "</tr>";
                    }





                    ?>
                </table>

            </div>

            <div class="ActionButtons">
                <!-- <a href="../Controllers/User_SEARCH_Controller.php"><i class="fa fa-search" id="searchIcon"></i></a> -->
                <a href="../Controllers/Work_ADD_Controller.php"><i class="fa fa-plus-square" id="addIcon" title="Añadir Trabajo"></i></a>
                <a href=' ../Controllers/Index_Controller.php'><i class="fa fa-arrow-circle-left " id="returnIcon" title="Volver"></i></a>
            </div>

        </div>






        <?php
        include '../Locales/Footer.html';
    }

}

?>