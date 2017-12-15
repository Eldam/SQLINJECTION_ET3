<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/15/17
 * Time: 8:01 PM
 */

class User_SHOWCURRENT_View{
 var $response;

    function __construct($response){
        $this->response = $response;
        $this->render();
    }

    function render(){

        /*include './Strings_SPANISH.php';*/
        include '../Locales/Header.html';
        ?>




        <div class="tableShowAll">


            <div>
                <table>
                    <tr>
                        <th>login</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Direccion</th>
                        <th>Telefono</th>

                        <th>borrar</th>
                    </tr>



                    <?php

                    $user = mysqli_fetch_array($this->response);

                    echo "<tr>";
                    echo"<td>".$user['login']."</td>".
                        "<td>".$user['Correo']."</td>".
                        "<td>".$user['Nombre']."</td>".
                        "<td>".$user['Apellidos']."</td>".
                        "<td>".$user['DNI']."</td>".
                        "<td>".$user['Direccion']."</td>".
                        "<td>".$user['Telefono']."</td>".
                        '<td><a href="../Controllers/User_DELETE_Controller.php"><i class="fa fa-trash" id="delIcon"></i></td></a>'.
                        "</tr>";






                    ?>



                </table>
            </div>
        </div>





        <?php
        include '../Locales/Footer.html';
    }

}

?>