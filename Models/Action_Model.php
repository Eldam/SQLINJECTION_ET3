<?php
class ActionDAO
{




    //atributo IdAccion: guarda el Id del IdAccion.
    var $IdAccion;
    //atributo NombreAccion: guarda el NombreAccion.
    var $NombreAccion;
    //atributo DescripAccion: guarda el DescripAccion.
    var $DescripAccion;




    //Constructor de la clase
    //parametros: el dni, el nombre y los apellidos
    function __construct($IdAccion)
    {
        $this->IdAccion = $IdAccion;
        include_once '../Functions/Access_DB.php';
        $this->mysqli = ConnectDB();
    }

    function setData($NombreAccion,$DescripAccion)
    {
        $this->NombreAccion = $NombreAccion;
        $this->DescripAccion = $DescripAccion;

    }

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si
//existe ya en la tabla
    function ADD()
    {
        if ($this->IdAccion != '' )
        {
            $sql = "select * from ACCION where IdAccion = '".$this->IdAccion."'";
            $resultado = mysqli_query($this->mysqli,$sql);

            if (mysqli_num_rows($resultado) == 0)
            {
                $sql = "INSERT INTO ACCION (IdAccion, 
                                            NombreAccion, 
                                            DescripAccion
                                            ) VALUES ('";
                $sql = $sql.$this->IdAccion."','".
                    $this->NombreAccion."','".
                    $this->DescripAccion."')";

                mysqli_query($this->mysqli,$sql);

                return true;
            }
            else{
                return "El ID de la ACCION ya existe";
            }
        }
        else
            return "El ID de la ACCION no puede ser vacio";
    }




    // funcion GET: recupera todos los atributos de una tupla a partir de su clave
    function GET()
    {
        $sql = "select * from ACCION where IdAccion = '".$this->IdAccion."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        return $resultado;
    }



    //funcion SEARCH: hace una búsqueda en la tabla con
    //los datos proporcionados. Si van vacios devuelve todos
    function SEARCH(){
        /* $sql = "select * from USUARIO WHERE login LIKE '%$this->login%'";*/
        $sql = "select * from ACCION 
            where   
                (IdAccion LIKE '%$this->IdAccion%') &&
                (NombreAccion LIKE '%$this->NombreAccion%') &&
                (DescripAccion LIKE '%$this->DescripAccion%')";

        $resultado = mysqli_query($this->mysqli,$sql);
        return $resultado;

    }




    // funcion Edit: realizar el update de una tupla despues de comprobar que existe
    function EDIT()
    {
        $sql = "select * from ACCION where IdAccion = '".$this->IdAccion."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        if (mysqli_num_rows($resultado) == 1) {
            $sql = "UPDATE ACCION SET 
            		DescripAccion = '" . $this->DescripAccion .
                "',NombreAccion = '" . $this->NombreAccion .
                "' WHERE IdAccion = '" . $this->IdAccion . "'";
            mysqli_query($this->mysqli, $sql);
            return "La ACCION ha sido Actualizado";

        } else {

            return "El ID de la ACCION no existe";
        }
    }




    //funcion DELETE : comprueba que la tupla a borrar existe y una vez
    // verificado la borra
    function DELETE()
    {
        $sql = "select * from ACCION where IdAccion = '".$this->IdAccion."'";
        $resultado = mysqli_query($this->mysqli,$sql);
        if (mysqli_num_rows($resultado) == 1){
            $sql = "delete from ACCION where IdAccion = '".$this->IdAccion."'";
            mysqli_query($this->mysqli,$sql);

            return"La ACCION ha sido borrado";

        }
        else
            return"La ACCION no existe";

    }



    /*
    //funcion hasPermisionsOnTheAction : comprueba que el grupo posee permisos para la accion y fucionalidad solicitada
    //retorna true en caso correcto
    //false en caso contrario
    function hasPermisionsOnTheAction(string $IdFuncionalidad,string $IdAccion):bool {
        $sql = " SELECT * FROM PERMISO WHERE IdGrupo='".$this->IdFuncionalidad.
            "' AND IdFuncionalidad='".$IdFuncionalidad.
            "' AND IdAccion='".$IdAccion."'" ;
        $resultado = mysqli_query($this->mysqli,$sql);

        return (mysqli_num_rows($resultado) != 0);



    }

*/













}