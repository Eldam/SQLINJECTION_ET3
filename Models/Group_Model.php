<?php
class GroupDAO
{


    //atributo IdGrupo: guarda el Id del Grupo.
    var $IdGrupo;
    //atributo NombreGrupo: guarda el NombreGrupo.
    var $NombreGrupo;
    //atributo DescripGrupo: guarda el DescripGrupo.
    var $DescripGrupo;




    //Constructor de la clase
    //parametros: el dni, el nombre y los apellidos
    function __construct($IdGrupo)
    {
        $this->IdGrupo = $IdGrupo;
        include_once '../Functions/Access_DB.php';
        $this->mysqli = ConnectDB();
    }

    function setData($NombreGrupo,$DescripGrupo)
    {
        $this->NombreGrupo = $NombreGrupo;
        $this->DescripGrupo = $DescripGrupo;

    }

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si
//existe ya en la tabla
    function ADD()
    {
        if ($this->IdGrupo != '' )
        {
            $sql = "select * from GRUPO where IdGrupo = '".$this->IdGrupo."'";
            $resultado = mysqli_query($this->mysqli,$sql);

            if (mysqli_num_rows($resultado) == 0)
            {
                $sql = "INSERT INTO GRUPO (IdGrupo, 
                                            NombreGrupo, 
                                            DescripGrupo
                                            ) VALUES ('";
                $sql = $sql.$this->IdGrupo."','".
                        $this->NombreGrupo."','".
                        $this->DescripGrupo."')";

                mysqli_query($this->mysqli,$sql);

                return true;
            }
            else{
                return "El ID del Grupo ya existe";
            }
        }
        else
            return "El ID del Grupo no puede ser vacio";
    }




    // funcion GET: recupera todos los atributos de una tupla a partir de su clave
    function GET()
    {
        $sql = "select * from GRUPO where IdGrupo = '".$this->IdGrupo."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        return $resultado;
    }



    //funcion SEARCH: hace una búsqueda en la tabla con
    //los datos proporcionados. Si van vacios devuelve todos
    function SEARCH(){
        /* $sql = "select * from USUARIO WHERE login LIKE '%$this->login%'";*/
        $sql = "select * from GRUPO 
            where   
                (IdGrupo LIKE '%$this->IdGrupo%') &&
                (NombreGrupo LIKE '%$this->NombreGrupo%') &&
                (DescripGrupo LIKE '%$this->DescripGrupo%')";

        $resultado = mysqli_query($this->mysqli,$sql);
        return $resultado;

    }




    // funcion Edit: realizar el update de una tupla despues de comprobar que existe
    function EDIT()
    {
        $sql = "select * from GRUPO where IdGrupo = '".$this->IdGrupo."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        if (mysqli_num_rows($resultado) == 1) {
            $sql = "UPDATE GRUPO SET 
            		NombreGrupo = '" . $this->NombreGrupo .
                "',DescripGrupo = '" . $this->DescripGrupo .
                "' WHERE IdGrupo = '" . $this->IdGrupo . "'";
            mysqli_query($this->mysqli, $sql);
            return "El Grupo ha sido Actualizado";

        } else {

            return "El ID del grupo no existe";
        }
    }




    //funcion DELETE : comprueba que la tupla a borrar existe y una vez
    // verificado la borra
    function DELETE()
    {
        $sql = "select * from GRUPO where IdGrupo = '".$this->IdGrupo."'";
        $resultado = mysqli_query($this->mysqli,$sql);
        if (mysqli_num_rows($resultado) == 1){
            $sql = "delete from GRUPO where IdGrupo = '".$this->IdGrupo."'";
            mysqli_query($this->mysqli,$sql);

            return"El grupo ha sido borrado";

        }
        else
            return"El grupo no existe";

    }

    //funcion hasPermisionsOnTheAction : comprueba que el grupo posee permisos para la accion y fucionalidad solicitada
    //retorna true en caso correcto
    //false en caso contrario
    function hasPermisionsOnTheAction(string $IdFuncionalidad,string $IdAccion):bool {
        $sql = " SELECT * FROM PERMISO WHERE IdGrupo='".$this->IdGrupo.
                        "' AND IdFuncionalidad='".$IdFuncionalidad.
                        "' AND IdAccion='".$IdAccion."'" ;
        $resultado = mysqli_query($this->mysqli,$sql);

        return (mysqli_num_rows($resultado) != 0);



    }















}