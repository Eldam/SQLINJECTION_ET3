
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