<?php 
include '../functions.php';
if (isset($_POST['txtMaestrosSeleccionar'])) 
{
	$txtMaestrosSeleccionar=$_POST['txtMaestrosSeleccionar'];
}	
else
{
	$txtMaestrosSeleccionar= "";
}

if(!empty ($txtMaestrosSeleccionar))
{
	$connection = connection();	
	$query = "select * from maestros where idMaestros =".$txtMaestrosSeleccionar." ";
	$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
	$rows = mysql_num_rows($result);
		
	if ($rows > 0)
	{
		$rows = mysql_fetch_array($result);
		$idMaestros = $rows["idMaestros"];
		$nombre = $rows["nombre"];
		$apellido_pat = $rows["apellido_pat"];
		$apellido_mat = $rows["apellido_mat"];
		$fecha_nacimiento = $rows["fecha_nacimiento"];
		$estatus = $rows["estatus"];
		$idPeriodo = $rows["idPeriodo"];
		
		$query_info = "select * from maestrosinf where idMaestros = ".$idMaestros." ";
		$result_info = mysql_query($query_info,$connection)or die ("Error: ".mysql_error());
		$rows_info = mysql_num_rows($result_info);
		if ($rows_info > 0)
		{
			$rows_info = mysql_fetch_array($result_info);
			$idMaestrosInf = $rows_info["idMaestrosInf"];
			$contacto = $rows_info["contacto"];
			$telefono = $rows_info["telefono"];
			$calle = $rows_info["calle"];
			$num_casa = $rows_info["num_casa"];
			$colonia = $rows_info["colonia"];
			$cp = $rows_info["cp"];
			$municipio = $rows_info["municipio"];
			$estado = $rows_info["estado"];
			$pais = $rows_info["pais"];
			$cedula = $rows_info["cedula"];
			$rango = $rows_info["rango"];
			$curp = $rows_info["curp"];
			$rfc = $rows_info["rfc"];
		}		
	}	
	
	dbClose($connection);
	
	$CLArray = array( 'nombre' => $nombre , 'apellido_pat' => $apellido_pat , 'apellido_mat' => $apellido_mat , 'fecha_nacimiento' => $fecha_nacimiento , 'idPeriodo' => $idPeriodo ,  'contacto' => $contacto , 'telefono' => $telefono , 'calle' => $calle , 'num_casa' => $num_casa , 'colonia' => $colonia , 'cp' => $cp , 'municipio' => $municipio , 'estado' => $estado , 'pais' => $pais , 'cedula' => $cedula , 'rango' => $rango , 'curp' => $curp , 'rfc' => $rfc );

	echo json_encode($CLArray);
}
?>