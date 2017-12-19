<?php
class FunctionDAO
{


    //atributo IdFuncionalidad: guarda el Id del Funcionalidad.
    var $IdFuncionalidad;
    //atributo NombreFuncionalidad: guarda el NombreFuncionalidad.
    var $NombreFuncionalidad;
    //atributo DescripFuncionalidad: guarda el DescripFuncionalidad.
    var $DescripFuncionalidad;




    //Constructor de la clase
    //parametros: el dni, el nombre y los apellidos
    function __construct($IdFuncionalidad)
    {
        $this->IdFuncionalidad = $IdFuncionalidad;
        include_once '../Functions/Access_DB.php';
        $this->mysqli = ConnectDB();
    }

    function setData($NombreFuncionalidad,$DescripFuncionalidad)
    {
        $this->NombreFuncionalidad = $NombreFuncionalidad;
        $this->DescripFuncionalidad = $DescripFuncionalidad;

    }

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si
//existe ya en la tabla
    function ADD()
    {
        if ($this->IdFuncionalidad != '' )
        {
            $sql = "select * from FUNCIONALIDAD where IdFuncionalidad = '".$this->IdFuncionalidad."'";
            $resultado = mysqli_query($this->mysqli,$sql);

            if (mysqli_num_rows($resultado) == 0)
            {
                $sql = "INSERT INTO FUNCIONALIDAD (IdFuncionalidad, 
                                            NombreFuncionalidad, 
                                            DescripFuncionalidad
                                            ) VALUES ('";
                $sql = $sql.$this->IdFuncionalidad."','".
                    $this->NombreFuncionalidad."','".
                    $this->DescripFuncionalidad."')";

                mysqli_query($this->mysqli,$sql);

                return true;
            }
            else{
                return "El ID de la Funcionalidad ya existe";
            }
        }
        else
            return "El ID de la funcionalidad no puede ser vacio";
    }




    // funcion GET: recupera todos los atributos de una tupla a partir de su clave
    function GET()
    {
        $sql = "select * from FUNCIONALIDAD where IdFuncionalidad = '".$this->IdFuncionalidad."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        return $resultado;
    }



    //funcion SEARCH: hace una búsqueda en la tabla con
    //los datos proporcionados. Si van vacios devuelve todos
    function SEARCH(){
        /* $sql = "select * from USUARIO WHERE login LIKE '%$this->login%'";*/
        $sql = "select * from FUNCIONALIDAD 
            where   
                (IdFuncionalidad LIKE '%$this->IdFuncionalidad%') &&
                (NombreFuncionalidad LIKE '%$this->NombreFuncionalidad%') &&
                (DescripFuncionalidad LIKE '%$this->DescripFuncionalidad%')";

        $resultado = mysqli_query($this->mysqli,$sql);
        return $resultado;

    }




    // funcion Edit: realizar el update de una tupla despues de comprobar que existe
    function EDIT()
    {
        $sql = "select * from FUNCIONALIDAD where IdFuncionalidad = '".$this->IdFuncionalidad."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        if (mysqli_num_rows($resultado) == 1) {
            $sql = "UPDATE FUNCIONALIDAD SET 
            		DescripFuncionalidad = '" . $this->DescripFuncionalidad .
                "',NombreFuncionalidad = '" . $this->NombreFuncionalidad .
                "' WHERE IdFuncionalidad = '" . $this->IdFuncionalidad . "'";
            mysqli_query($this->mysqli, $sql);
            return "La funcionalidad ha sido Actualizado";

        } else {

            return "El ID de la funcionalidad no existe";
        }
    }




    //funcion DELETE : comprueba que la tupla a borrar existe y una vez
    // verificado la borra
    function DELETE()
    {
        $sql = "select * from FUNCIONALIDAD where IdFuncionalidad = '".$this->IdFuncionalidad."'";
        $resultado = mysqli_query($this->mysqli,$sql);
        if (mysqli_num_rows($resultado) == 1){
            $sql = "delete from FUNCIONALIDAD where IdFuncionalidad = '".$this->IdFuncionalidad."'";
            mysqli_query($this->mysqli,$sql);

            return"La FUNCIONALIDAD ha sido borrado";

        }
        else
            return"La FUNCIONALIDAD no existe";

    }



    //funcion getAllActions : optiene todas las acciones de la funcionalidad
    function getAllActions() {
        $sql = " SELECT * FROM FUNC_ACCION WHERE IdFuncionalidad='".$this->IdFuncionalidad."';";
        $resultado = mysqli_query($this->mysqli,$sql);

        return $resultado;



    }















}