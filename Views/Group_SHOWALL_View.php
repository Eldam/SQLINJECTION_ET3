<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:34 PM
 */

class Group_SHOWALL_View{
    var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        ?>
        <link rel="stylesheet" href="../Locales/Group_SHOWALL.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        echo '<h1 style="color: white;padding-left: 100px ">Se han encontrado '.mysqli_num_rows($this->response).' Grupo(s).</h1>';
        ?>


        <div class="tableShowAll">

            <div class="containTable">
                <table class="table">
                    <tr>
                        <th>Id Grupo</th>
                        <th>Nombre Grupo</th>
                        <th>Descripción Grupo</th>
                        <th>Asignar funciones</th>
                        <th>Modificar</th>
                        <th>ver</th>
                        <th>borrar</th>
                    </tr>



                    <?php

                    while ($group = mysqli_fetch_array($this->response)){

                        echo "<tr>";
                        echo"<td>".$group['IdGrupo']."</td>".
                            "<td>".$group['NombreGrupo']."</td>".
                            "<td>".$group['DescripGrupo']."</td>".
                            '<td><a href="../Controllers/Group_ASSINGACTIONFUNCTION_Controller.php?IdGrupo='.$group["IdGrupo"].'&getAll=yes"><i class="fa fa-users" id="modIcon"></i></td></a>'.
                            '<td><a href="../Controllers/Group_EDIT_Controller.php?value='.$group["IdGrupo"].'"><i class="fa fa-pencil-square-o" id="modIcon"></i></td></a>'.
                            '<td><a href="../Controllers/Group_SHOWCURRENT_Controller.php?value='.$group["IdGrupo"].'"><i class="fa fa-eye" id="seeIcon"></i></td></a>'.
                            '<td><a href="../Controllers/Group_DELETE_Controller.php?value='.$group["IdGrupo"].'"><i class="fa fa-trash" id="delIcon"></i></td></a>'.
                            "</tr>";
                    }





                    ?>
                </table>

            </div>

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