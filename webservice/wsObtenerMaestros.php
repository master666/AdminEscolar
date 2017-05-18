<?php 
//WS que muestra la información de los maestros, según el turno del alumno.
include '../functions.php';
//Se obtiene el periodo elegido.
if (isset($_POST['txtPeriodoEscolar'])) 
{
	$txtPeriodoEscolar=$_POST['txtPeriodoEscolar'];
}		
else
{
	$txtPeriodoEscolar= "";
}

$select = "";

if($txtPeriodoEscolar != -2)
{
	//Conexón a la BD
	$connection = connection();	
	$query = "SELECT * FROM maestros WHERE idPeriodo = '".$txtPeriodoEscolar."' AND estatus = 1";
	$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
	$rows = mysql_num_rows($result);
	//Si hay resultados del query
	if ($rows > 0)
	{		
		$select = $select . "<option value='-2'>Elija un maestro</option> ";
		
		while($rows = mysql_fetch_array($result))
		{	
			$nombre = $rows["nombre"];
			$apellido_pat = $rows["apellido_pat"];
			$apellido_mat = $rows["apellido_mat"];
			$idMaestros	 = $rows["idMaestros"];
			$NombreMaestro = " $nombre $apellido_pat $apellido_mat";	
			
			$select = $select . '<option value="'.$idMaestros.'">'.$NombreMaestro.'</option>';		
		}				
	}
	//Si no hay resultados.
	else
	{
		$select = $select . '<option value="-1">No existe maestro para este turno </option>';
	}	
		
	dbClose($connection);
	
	$CLArray = array( 'select' => $select);

	echo json_encode($CLArray);
}
?>