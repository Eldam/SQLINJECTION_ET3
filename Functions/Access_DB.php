<?php
//----------------------------------------------------
// DB connection function
// Use CONSTANTS defined in config.inc
//----------------------------------------------------


function ConnectDB()
{
    $mysqli = new mysqli("localhost","useriu","passiu","IUET32017");
    	
	if ($mysqli->connect_errno) {
		include '../Views/MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, '../index.php');
		return false;
	}
	else{
		return $mysqli;
	}
}

?>