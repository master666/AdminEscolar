<?php

	function connection()
{
    $user = "root";
    $password = "usbw";
    $database = "admiescolar";
    $connectionDB = mysql_connect('localhost', $user, $password);
    @mysql_select_db($database) or die( "Unable to select database".mysql_error());
    return $connectionDB;
}
//Cierra conexion de la Base de Datos
function dbClose($connection)
{
  mysql_close($connection);  
}
?>