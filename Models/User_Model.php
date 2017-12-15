
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
    var $nombre;
    //atributo apellidos: guarda el apellidos.
    var $apellidos;
    //atributo telefono: guarda el telefono.
    var $telefono;
    //atributo email: guarda el email.
    var $email;
    //atributo FechaNacimiento: guarda el FechaNacimiento.
    var $FechaNacimiento;
    //atributo fotopersonal: guarda el fotopersonal.
    var $fotopersonal;
    //atributo sexo: guarda el sexo.
    var $sexo;
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

    function setData($DNI,$nombre,$apellidos,
                     $telefono,$email,$FechaNacimiento,$fotopersonal,$sexo)
    {
        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->FechaNacimiento = $FechaNacimiento;
        $this->fotopersonal = $fotopersonal;
        $this->sexo = $sexo;
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