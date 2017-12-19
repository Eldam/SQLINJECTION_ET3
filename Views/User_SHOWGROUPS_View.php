<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/16/17
 * Time: 4:32 PM
 */

class User_SHOWGROUPS_View{
    var $response;
    var $login;

    function __construct($response,$login){
        $this->response = $response;
        $this->login = $login;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        ?>
        <link rel="stylesheet" href="../Locales/User_SHOWGROUPS.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        echo '<h1 style="color: white;padding-left: 100px ">Se han encontrado '.count($this->response).' Grupo(s).</h1>';
        ?>


        <div class="tableShowGroup">

            <div class="containGroups">
                <table class="table">
                    <tr>
                        <th>ID grupo</th>
                        <th>Nombre grupo</th>
                        <th>Descripcion grupo</th>
                        <th>borrar</th>
                    </tr>



                    <?php


                    foreach($this->response as $groups) {
                        $group = mysqli_fetch_array($groups);


                        echo "<tr>";
                        echo "<td>" . $group['IdGrupo'] . "</td>" .
                            "<td>" . $group['NombreGrupo'] . "</td>" .
                            "<td>" . $group['DescripGrupo'] . "</td>" .
                            '<td><a href="../Controllers/User_REMOVEGROUP_Controller.php?login='.$this->login.'&IdGrupo=' . $group["IdGrupo"] . '"><i class="fa fa-trash" id="delIcon"></i></a></td>' .
                            "</tr>";

                    }
                    ?>
                </table>

            </div>

            <div class="ActionButtons">
                <!-- <a href="../Controllers/User_SEARCH_Controller.php"><i class="fa fa-search" id="searchIcon"></i></a> -->
                <a href="../Controllers/User_ASSINGTOGROUP_Controller.php?getGroups=true&login=<?php echo $this->login ?>"><i class="fa fa-plus-square" id="addIcon" title="Asignar grupo"></i></a>
                <a href=' ../Controllers/User_SHOWALL_Controller.php'><i class="fa fa-arrow-circle-left " id="returnIcon" title="Volver"></i></a>
            </div>

        </div>






        <?php
        include '../Locales/Footer.html';
    }

}

?>