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

$select = "";
$enable=0;

if(!empty ($txtMaestrosSeleccionar))
{
	$connection = connection();	
	$query = "select * from alumnos where idMaestros='".$txtMaestrosSeleccionar."' ORDER BY nombre";
	$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
	$rows = mysql_num_rows($result);
	$select = $select . '<select class="form-control" id="txtAlumnosSeleccionar" name="txtAlumnosSeleccionar" onChange="WSMostrarAlumnos()" required disabled>';
	//Si encuentra resultados.
	if($rows > 0) 
	{
		$enable=1;
		
		$select = $select . '<option value="-2">Seleccione un alumno</option>';
		while($rows = mysql_fetch_array($result))
		{
			$nombre = $rows["nombre"];
			$apellidopat = $rows["apellidopat"];
			$apellido_mat = $rows["apellido_mat"];
			$idAlumnos	 = $rows["idAlumnos"];
			$NombreAlumno = " $nombre $apellidopat $apellido_mat";
						
			$select = $select . '<option value='.$idAlumnos.'>'.$NombreAlumno.'</option>';																		
		}
	}
	//Si no encuentra resultados muestra
	else
	{
		$select = $select . '<option value="-1">Alumnos no cargados</option>';
	}
	
	dbClose($connection);
	
	$CLArray = array( 'select' => $select , 'enable' => $enable);

	echo json_encode($CLArray);
}
?>