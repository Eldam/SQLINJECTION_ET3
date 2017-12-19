<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/18/17
 * Time: 6:06 PM
 */

class User_ASSINGTOGROUP_View {

    var $response;//Recortset de reupo de usuario
    var $login;  //login del ususario

    function __construct($response,$login){
        $this->response = $response;
        $this->login = $login;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        ?>
        <link rel="stylesheet" href="../Locales/User_ASSINGTOGROUP.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        echo '<h1 style="color: white;padding-left: 100px ">Se han encontrado '.count($this->response).
            ' Grupo(s) a los que no pertenece el usuario.</h1>';
        ?>


        <div class="tableShowGroup">

            <div class="containGroups">
                <form action="../Controllers/User_ASSINGTOGROUP_Controller.php?login=<?php echo $this->login?>" method="post">
                    <table class="table">
                        <tr>
                            <th>ID grupo</th>
                            <th>Nombre grupo</th>
                            <th>Descripcion grupo</th>
                            <th>Asignar</th>
                        </tr>



                        <?php

                        foreach ($this->response as $group){

                            echo "<tr>";
                            echo"<td>".$group['IdGrupo']."</td>".
                                "<td>".$group['NombreGrupo']."</td>".
                                "<td>".$group['DescripGrupo']."</td>".
                                "<td>".'<input type="checkbox" name="arrayGroup[]" value="'.$group['IdGrupo'].'">'."</td>".
                                "</tr>";
                        }





                        ?>
                    </table>
                    <div class="ActionButtons">
                        <button id="send" type="submit" class="fa fa-plus-circle button" title="AÑADIR"></button>
                       <!-- <a href="../Controllers/User_ASSINGTOGROUP_Controller.php?login='<?php $_REQUEST['IdGrupo']?>'"><i class="fa fa-plus-square" id="addIcon" title="Asignar seleccionados"></i></a> -->
                        <a href=' ../Controllers/User_SHOWGROUPS_Controller.php?login=<?php echo $this->login?>'><i class="fa fa-arrow-circle-left " id="returnIcon" title="Volver"></i></a>
                    </div>
                </form>
            </div>

        </div>






        <?php
        include '../Locales/Footer.html';
    }
}