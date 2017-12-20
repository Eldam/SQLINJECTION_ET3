<?php
//----------------------------------------------------
// DB connection function
// Use CONSTANTS defined in config.inc
//----------------------------------------------------


function ConnectDB()
{
    $mysqli = new mysqli("localhost","userET3","passET3","IUET32017");
    	
	if ($mysqli->connect_errno) {
		include '../Views/MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, '../index.php');
		return false;
	}
	else{
        $mysqli->set_charset("utf8");
		return $mysqli;
	}
}

?>