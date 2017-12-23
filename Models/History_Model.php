<?php
class HistoryDAO
{

    //atributo IdTrabajo: guarda el Id del Trabajo.
    var $IdTrabajo;
    //atributo IdHistoria: guarda el IdHistoria.
    var $IdHistoria;
    //atributo TextoHistoria: guarda el TextoHistoria.
    var $TextoHistoria;




    //Constructor de la clase
    //parametros: el dni, el nombre y los apellidos
    function __construct($IdTrabajo)
    {
        $this->IdTrabajo = $IdTrabajo;
        include_once '../Functions/Access_DB.php';
        $this->mysqli = ConnectDB();
    }

    function setData($IdHistoria,$TextoHistoria)
    {
        $this->IdHistoria = $IdHistoria;
        $this->TextoHistoria = $TextoHistoria;

    }

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si
//existe ya en la tabla
    function ADD()
    {
        if ($this->IdTrabajo != '' )
        {
            $sql = "select * from HISTORIA where IdTrabajo = '".$this->IdTrabajo."' and IdHistoria='".$this->IdHistoria."'";
            $resultado = mysqli_query($this->mysqli,$sql);

            if (mysqli_num_rows($resultado) == 0)
            {
                $sql = "INSERT INTO HISTORIA (IdTrabajo, 
                                            IdHistoria, 
                                            TextoHistoria
                                            ) VALUES ('";
                $sql = $sql.$this->IdTrabajo."','".
                    $this->IdHistoria."','".
                    $this->TextoHistoria."')";

                mysqli_query($this->mysqli,$sql);

                return true;
            }
            else{
                return "El ID del HISTORIA ya existe";
            }
        }
        else
            return "El ID del HISTORIA no puede ser vacio";
    }





    // funcion GET: recupera todos los atributos de una tupla a partir de su clave
    function GET()
    {
        $sql = "select * from HISTORIA where IdTrabajo = '".$this->IdTrabajo."' and IdHistoria='".$this->IdHistoria."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        return $resultado;
    }



    //funcion SEARCH: hace una búsqueda en la tabla con
    //los datos proporcionados. Si van vacios devuelve todos
    function SEARCH(){
        /* $sql = "select * from USUARIO WHERE login LIKE '%$this->login%'";*/
        $sql = "select * from HISTORIA 
            where   
                (IdTrabajo LIKE '%$this->IdTrabajo%') &&
                (IdHistoria LIKE '%$this->IdHistoria%') &&
                (TextoHistoria LIKE '%$this->TextoHistoria%')";

        $resultado = mysqli_query($this->mysqli,$sql);
        return $resultado;

    }




    // funcion Edit: realizar el update de una tupla despues de comprobar que existe
    function EDIT()
    {
        $sql = "select * from HISTORIA where IdTrabajo = '".$this->IdTrabajo."' and IdHistoria='".$this->IdHistoria."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        if (mysqli_num_rows($resultado) == 1) {
            $sql = "UPDATE HISTORIA SET 
            		IdHistoria = '" . $this->IdHistoria .
                "',TextoHistoria = '" . $this->TextoHistoria .
                "' WHERE IdTrabajo = '" . $this->IdTrabajo . "'";
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
        $sql = "select * from HISTORIA where IdTrabajo = '".$this->IdTrabajo."' and IdHistoria='".$this->IdHistoria."'";
        $resultado = mysqli_query($this->mysqli,$sql);
        if (mysqli_num_rows($resultado) == 1){
            $sql = "delete from HISTORIA where IdTrabajo = '".$this->IdTrabajo."' and IdHistoria='".$this->IdHistoria."'";
            mysqli_query($this->mysqli,$sql);

            return"El HISTORIA ha sido borrado";

        }
        else
            return"El HISTORIA no existe";

    }













}