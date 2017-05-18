<?php 
include '../functions.php';
if (isset($_POST['txtAlumnosSeleccionar'])) 
{
	$txtAlumnosSeleccionar=$_POST['txtAlumnosSeleccionar'];
}	
else
{
	$txtAlumnosSeleccionar= "";
}

if(!empty ($txtAlumnosSeleccionar))
{
	$connection = connection();	
	$query = "select * from alumnos where idAlumnos =".$txtAlumnosSeleccionar." ";
	$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
	$rows = mysql_num_rows($result);
		
	if ($rows > 0)
	{
		$rows = mysql_fetch_array($result);
		$idAlumnos = $rows["idAlumnos"];
		$nombre = $rows["nombre"];
		$apellidopat = $rows["apellidopat"];
		$apellido_mat = $rows["apellido_mat"];
		$fecha_nacimiento = $rows["fecha_nacimiento"];
		$fecha_ingreso = $rows["fecha_ingreso"];
		$estatus = $rows["estatus"];
		$idPeriodo = $rows["idPeriodo"];
		
		$query_info = "select * from alumnosinf where idAlumnos = ".$idAlumnos." ";
		$result_info = mysql_query($query_info,$connection)or die ("Error: ".mysql_error());
		$rows_info = mysql_num_rows($result_info);
		if ($rows_info > 0)
		{
			$rows_info = mysql_fetch_array($result_info);
			$idAlumnosInf = $rows_info["idAlumnosInf"];
			$contacto = $rows_info["contacto"];
			$telefono = $rows_info["telefono"];
			$calle = $rows_info["calle"];
			$num_casa = $rows_info["num_casa"];
			$colonia = $rows_info["colonia"];
			$cp = $rows_info["cp"];
			$municipio = $rows_info["municipio"];
			$estado = $rows_info["estado"];
			$pais = $rows_info["pais"];
			$curp = $rows_info["curp"];
		}		
	}	
	
	dbClose($connection);
	
	$CLArray = array( 'nombre' => $nombre , 'apellidopat' => $apellidopat , 'apellido_mat' => $apellido_mat , 'fecha_nacimiento' => $fecha_nacimiento , 'fecha_ingreso' => $fecha_ingreso , 'idPeriodo' => $idPeriodo ,  'contacto' => $contacto , 'telefono' => $telefono , 'calle' => $calle , 'num_casa' => $num_casa , 'colonia' => $colonia , 'cp' => $cp , 'municipio' => $municipio , 'estado' => $estado , 'pais' => $pais , 'curp' => $curp );

	echo json_encode($CLArray);
}
?>