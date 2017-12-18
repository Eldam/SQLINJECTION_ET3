
<?php

//Clase : USUARIOS_Modelo
//Creado el : 22-09-2017
//Creado por: jrodeiro
//-------------------------------------------------------

class UserDAO
{

    //atributo Login: guarda el login.
    var $login;
    //atributo password: guarda el password.
    var $password;
    //atributo DNI: guarda el DNI.
    var $DNI;
    //atributo nombre: guarda el nombre.
    var $Nombre;
    //atributo apellidos: guarda el apellidos.
    var $Apellidos;
    //atributo telefono: guarda el telefono.
    var $Telefono;
    //atributo email: guarda el email.
    var $Correo;
    //atributo direccion: guarda la Direccion.
    var $Direccion;
    //atributo para guardar un link a la BD.
    var $mysqli;


    //Constructor de la clase
    //parametros: el dni, el nombre y los apellidos
    function __construct( $login, $password)
    {
        $this->login = $login;
        $this->password = hash('md5', $password);

        include_once '../Functions/Access_DB.php';
        $this->mysqli = ConnectDB();
    }

    function setData($DNI,$Nombre,$Apellidos,
                     $Telefono,$Correo,$Direccion)
    {
        $this->DNI = $DNI;
        $this->Nombre = $Nombre;
        $this->Apellidos = $Apellidos;
        $this->Telefono = $Telefono;
        $this->Correo = $Correo;
        $this->Direccion = $Direccion;

    }



//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si
//existe ya en la tabla
    function ADD()
    {
        if ($this->login != '' )
        {
            $sql = "select * from USUARIO where login = '".$this->login."'";
            $resultado = mysqli_query($this->mysqli,$sql);
            $sql = "select * from USUARIO where Correo = '".$this->Correo."'";
            $resultadoEmail = mysqli_query($this->mysqli,$sql);
            $sql = "select * from USUARIO where DNI = '".$this->DNI."'";
            $resultadoDNI = mysqli_query($this->mysqli,$sql);
            if ((mysqli_num_rows($resultado) + mysqli_num_rows($resultadoEmail) + mysqli_num_rows($resultadoDNI)) == 0)
            {
                $sql = "INSERT INTO USUARIO (login, 
                                            password, 
                                            DNI, 
                                            Nombre,
                                            Apellidos,
                                            Telefono,
                                            Correo,
                                            Direccion
                                            ) VALUES ('";
                $sql = $sql.$this->login."','".$this->password."','".$this->DNI."','".
                    $this->Nombre."','".$this->Apellidos."','".$this->Telefono."','".
                    $this->Correo."','".$this->Direccion."')";

                mysqli_query($this->mysqli,$sql);

                return true;
            }
            else{

                $responseMessage = '';
                if(mysqli_num_rows($resultado) != 0){
                    $responseMessage =  $responseMessage ."El login ya existe";
                }
                if(mysqli_num_rows($resultadoEmail) != 0){
                    $responseMessage =  $responseMessage ."El Correo ya existe";
                }
                if (mysqli_num_rows($resultadoDNI) != 0) {
                    $responseMessage =  $responseMessage ."El DNI ya existe";
                }
                return $responseMessage;
            }
        }
        else
            return "Los campos DNI, Login y Email no pueden ser vacios.";
    }




    // funcion GET: recupera todos los atributos de una tupla a partir de su clave
    function GET()
    {
        $sql = "select * from USUARIO where login = '".$this->login."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        return $resultado;
    }



    //funcion SEARCH: hace una búsqueda en la tabla con
    //los datos proporcionados. Si van vacios devuelve todos
    function SEARCH()
    {
        /* $sql = "select * from USUARIO WHERE login LIKE '%$this->login%'";*/
        $sql = "select * from USUARIO 
            where   
                (login LIKE '%$this->login%') &&
                (DNI LIKE '%$this->DNI%') &&
                (Nombre LIKE '%$this->Nombre%') &&
                (Apellidos LIKE '%$this->Apellidos%') &&
                (Correo LIKE '%$this->Correo%') &&
                (Direccion LIKE '%$this->Direccion%') &&
                (Telefono LIKE '%$this->Telefono%')
                ";
        $resultado = mysqli_query($this->mysqli,$sql);
        return $resultado;

    }




    // funcion Edit: realizar el update de una tupla despues de comprobar que existe
    function EDIT()
    {
        $sql = "select * from USUARIO where login = '".$this->login."'";
        $resultado = mysqli_query($this->mysqli,$sql);


        if (mysqli_num_rows($resultado) == 1) {
            $sql = "UPDATE USUARIO SET 
            		password = '" . $this->password .
                "',DNI = '" . $this->DNI .
                "',Nombre = '" . $this->Nombre .
                "',Apellidos = '" . $this->Apellidos .
                "',Telefono = '" . $this->Telefono .
                "',Correo = '" . $this->Correo .
                "',Direccion = '" . $this->Direccion .
                "' WHERE login = '" . $this->login . "'";
            mysqli_query($this->mysqli, $sql);
            return "El usuario ha sido Actualizado";

        } else {
            return "El login no existe";
        }
    }




    //funcion DELETE : comprueba que la tupla a borrar existe y una vez
    // verificado la borra
    function DELETE()
    {
        $sql = "select * from USUARIO where login = '".$this->login."'";
        $resultado = mysqli_query($this->mysqli,$sql);
        if (mysqli_num_rows($resultado) == 1){
            $sql = "delete from USUARIO where login = '".$this->login."'";
            mysqli_query($this->mysqli,$sql);

            return"El usuario ha sido borrado";

        }
        else
            return"El usuario no existe";

    }

    //funcion getGrops: retorna un array de todos los grupos asignados a un user
    function getGroups(): array {
        $sql = "select login, IdGrupo FROM USU_GRUPO where login = '".$this->login."'";
        $resultado = mysqli_query($this->mysqli,$sql);

        $toRet = Array();
        while ($row = mysqli_fetch_array($resultado)){
            $toRet[] = $row["IdGrupo"];
        }

        return $toRet;
    }


    // funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
    // es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el
    // error correspondiente
    function login(){

        $sql = "SELECT *
			FROM USUARIO
			WHERE (
				(login = '$this->login') 
			)";


        $resultado = mysqli_query($this->mysqli, $sql);
        if(mysqli_num_rows($resultado) == 0){
            return 'El login no existe';
        }
        else{
            $tupla = $resultado->fetch_array();
            if ($tupla['password'] == $this->password){
                return true;
            }
            else{
                return 'La password para este usuario no es correcta';
            }
        }
    }
}