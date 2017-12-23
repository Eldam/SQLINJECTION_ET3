<?php
class WorkDAO
{


    //atributo IdTrabajo: guarda el Id del Trabajo.
    var $IdTrabajo;
    //atributo NombreTrabajo: guarda el NombreTrabajo.
    var $NombreTrabajo;
    //atributo FechaIniTrabajo: guarda el FechaIniTrabajo.
    var $FechaIniTrabajo;
    //atributo FechaFinTrabajo: guarda el FechaFinTrabajo.
    var $FechaFinTrabajo;
    //atributo PorcentajeNota: guarda el PorcentajeNota.
    var $PorcentajeNota;




    //Constructor de la clase
    //parametros: el dni, el nombre y los apellidos
    function __construct($IdTrabajo)
    {
        $this->IdTrabajo = $IdTrabajo;
        include_once '../Functions/Access_DB.php';
        $this->mysqli = ConnectDB();
    }

    function setData($NombreTrabajo,$FechaIniTrabajo,$FechaFinTrabajo,$PorcentajeNota)
    {
        $this->NombreTrabajo = $NombreTrabajo;
        $this->FechaIniTrabajo = $FechaIniTrabajo;
        $this->FechaFinTrabajo = $FechaFinTrabajo;
        $this->PorcentajeNota = $PorcentajeNota;

    }

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si
//existe ya en la tabla
    function ADD()
    {
        if ($this->IdTrabajo != '' )
        {
            $sql = "select * from TRABAJO where IdTrabajo = '".$this->IdTrabajo."'";
            $resultado = mysqli_query($this->mysqli,$sql);

            if (mysqli_num_rows($resultado) == 0)
            {
                $sql = "INSERT INTO TRABAJO (IdTrabajo, 
                                            NombreTrabajo, 
                                            FechaIniTrabajo, 
                                            FechaFinTrabajo, 
                                            PorcentajeNota
                                            ) VALUES ('";
                $sql = $sql.$this->IdTrabajo."','".
                    $this->NombreTrabajo."','".
                    $this->FechaIniTrabajo."','".
                    $this->FechaFinTrabajo."','".
                    $this->PorcentajeNota."')";

                mysqli_query($this->mysqli,$sql);

                return true;
            }
            else{
                return "El ID del Trabajo ya existe";
            }
        }
        else
            return "El ID del Trabajo no puede ser vacio";
    }




    // funcion GET: recupera todos los atributos de una tupla a partir de su clave
    function GET()
    {
        $sql = "select * from TRABAJO where IdTrabajo = '".$this->IdTrabajo."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        return $resultado;
    }



    //funcion SEARCH: hace una búsqueda en la tabla con
    //los datos proporcionados. Si van vacios devuelve todos
    function SEARCH(){
        /* $sql = "select * from USUARIO WHERE login LIKE '%$this->login%'";*/
        $sql = "select * from TRABAJO 
            where   
                (IdTrabajo LIKE '%$this->IdTrabajo%') &&
                (FechaIniTrabajo LIKE '%$this->FechaIniTrabajo%') &&
                (FechaFinTrabajo LIKE '%$this->FechaFinTrabajo%') &&
                (NombreTrabajo LIKE '%$this->NombreTrabajo%') &&
                (PorcentajeNota LIKE '%$this->PorcentajeNota%')";

        $resultado = mysqli_query($this->mysqli,$sql);
        return $resultado;

    }




    // funcion Edit: realizar el update de una tupla despues de comprobar que existe
    function EDIT()
    {
        $sql = "select * from TRABAJO where IdTrabajo = '".$this->IdTrabajo."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        if (mysqli_num_rows($resultado) == 1) {
            $sql = "UPDATE TRABAJO SET 
            		NombreTrabajo = '" . $this->NombreTrabajo .
                "', FechaIniTrabajo = '" . $this->FechaIniTrabajo .
                "', FechaFinTrabajo = '" . $this->FechaFinTrabajo .
                "', PorcentajeNota = '" . $this->PorcentajeNota .
                "' WHERE IdTrabajo = '" . $this->IdTrabajo . "'";

            mysqli_query($this->mysqli, $sql);

            return "El Trabajo ha sido Actualizado";

        } else {

            return "El ID del Trabajo no existe";
        }
    }




    //funcion DELETE : comprueba que la tupla a borrar existe y una vez
    // verificado la borra
    function DELETE()
    {
        $sql = "select * from TRABAJO where IdTrabajo = '".$this->IdTrabajo."'";
        $resultado = mysqli_query($this->mysqli,$sql);
        if (mysqli_num_rows($resultado) == 1){
            $sql = "delete from TRABAJO where IdTrabajo = '".$this->IdTrabajo."'";
            mysqli_query($this->mysqli,$sql);

            return"El Trabajo ha sido borrado";

        }
        else
            return"El Trabajo no existe";

    }








    //funcion getHistories: retorna un array de todos los historias asignados a un trabajo
    function getHistories() {
        $sql = "select * FROM HISTORIA where IdTrabajo = '".$this->IdTrabajo."'";
        $resultado = mysqli_query($this->mysqli,$sql);



        return $resultado;
    }



    //funcion countHistories: el numero de historiaas existentes
    function countHistories() {
        $sql = "SELECT * FROM HISTORIA where IdTrabajo = '".$this->IdTrabajo."'";
        $resultado = mysqli_query($this->mysqli,$sql);


        return $resultado->num_rows;
    }







}