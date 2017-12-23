<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:53 PM
 */

class Importation_SHOWALL_View
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
        <link rel="stylesheet" href="../Locales/Importation_SHOWALL.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        echo '<h1 style="color: white;padding-left: 100px ">Se han encontrado '.'<span style="color: red;">' .mysqli_num_rows($this->response).'</span> Trabajos(s).</h1>';
        ?>


        <div class="tableShowAll">

            <div class="containTable">
                <table class="table">
                    <tr>
                        <th>Id Trabajo</th>
                        <th>Nombre Trabajo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Modificar</th>
                        <th>ver</th>
                        <th>borrar</th>
                    </tr>



                    <?php

                    while ($work = mysqli_fetch_array($this->response)){
                        if (strpos($work['IdTrabajo'], 'ET') !== false){
                            echo "<tr>";
                            echo"<td>".$work['IdTrabajo']."</td>".
                                "<td>".$work['NombreTrabajo']."</td>".
                                "<td>".$work['FechaIniTrabajo']."</td>".
                                "<td>".$work['FechaFinTrabajo']."</td>".
                                '<td><a href="../Controllers/Importation_EDIT_Controller.php?value='.$work["IdTrabajo"].'"><i class="fa fa-pencil-square-o" id="modIcon"></i></td></a>'.
                                '<td><a href="../Controllers/Importation_SHOWCURRENT_Controller.php?value='.$work["IdTrabajo"].'"><i class="fa fa-eye" id="seeIcon"></i></td></a>'.
                                '<td><a href="../Controllers/Importation_DELETE_Controller.php?value='.$work["IdTrabajo"].'"><i class="fa fa-trash" id="delIcon"></i></td></a>'.
                                "</tr>";
                        }

                    }





                    ?>
                </table>

            </div>
          <!--  <p class="mens">Accede a la entrega. Se te mostrará tu ficha de entrega con el Alias y podrás subir tu trabajo e indicar el número de horas utilizadas en la realización de la misma.</p> -->

            <div class="ActionButtons">
                <!-- <a href="../Controllers/User_SEARCH_Controller.php"><i class="fa fa-search" id="searchIcon"></i></a> -->
                <a href="../Controllers/Group_ADD_Controller.php"><i class="fa fa-plus-square" id="addIcon" title="Añadir Grupo"></i></a>
                <a href=' ../Controllers/Index_Controller.php'><i class="fa fa-arrow-circle-left " id="returnIcon" title="Volver"></i></a>
            </div>

        </div>






        <?php
        include '../Locales/Footer.html';
    }

}

?>