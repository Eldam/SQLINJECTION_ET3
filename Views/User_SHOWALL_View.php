<?php

class User_SHOWALL_View {
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
        <link rel="stylesheet" href="../Locales/User_SHOWALL.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        echo '<h1 style="color: white;padding-left: 100px ">Se han encontrado '.'<span style="color: red;">'. mysqli_num_rows($this->response).' </span> Usuario(s).</h1>';
        ?>


             <div class="tableShowAll">

                <div class="containTable">
                    <table class="table">
                        <tr>
                            <th>login</th>
                            <th>email</th>
                            <th>nombre</th>
                            <th>apellidos</th>
                            <th>Gestionar grupos</th>
                            <th>Modificar</th>
                            <th>ver</th>
                            <th>borrar</th>
                        </tr>



                        <?php

                        while ($user = mysqli_fetch_array($this->response)){

                            echo "<tr>";
                            echo"<td>".$user['login']."</td>".
                                "<td>".$user['Correo']."</td>".
                                "<td>".$user['Nombre']."</td>".
                                "<td>".$user['Apellidos']."</td>".
                                '<td><a href="../Controllers/User_SHOWGROUPS_Controller.php?login='.$user["login"].'"><i class="fa fa-users" id="modIcon"></i></td></a>'.
                                '<td><a href="../Controllers/User_EDIT_Controller.php?value='.$user["login"].'"><i class="fa fa-pencil-square-o" id="modIcon"></i></td></a>'.
                                '<td><a href="../Controllers/User_SHOWCURRENT_Controller.php?value='.$user["login"].'"><i class="fa fa-eye" id="seeIcon"></i></td></a>'.
                                '<td><a href="../Controllers/User_DELETE_Controller.php?value='.$user["login"].'"><i class="fa fa-trash" id="delIcon"></i></td></a>'.
                                "</tr>";
                        }





                        ?>
                    </table>

                </div>

                 <div class="ActionButtons">
                     <!-- <a href="../Controllers/User_SEARCH_Controller.php"><i class="fa fa-search" id="searchIcon"></i></a> -->
                     <a href="../Controllers/User_ADD_Controller.php"><i class="fa fa-plus-square" id="addIcon" title="Añadir Usuario"></i></a>
                     <a href=' ../Controllers/Index_Controller.php'><i class="fa fa-arrow-circle-left " id="returnIcon" title="Volver"></i></a>
                 </div>

             </div>






        <?php
        include '../Locales/Footer.html';
    }

}

?>