<?php
session_start();
include 'functions.php';
$connection=connection();
$idPerfil = getPerfil();
screenSecurity("alumnosAgregar");

//Valida, si las variables de sesión no tienen datos, redirecciona a login.
if(empty($_SESSION['login_user']) && empty($_SESSION['login_id']))
	{
		header("location: login");
	}

/*Variables a utilizar*/
if (isset($_POST['btnGuardar'])) 
	{
		$txtNombreAlumno = $_POST['txtNombreAlumno'];
		$txtApellidoPaterno = $_POST['txtApellidoPaterno'];
		$txtApellidoMaterno = $_POST['txtApellidoMaterno'];
		$txtFechaNacimiento = $_POST['txtFechaNacimiento'];
		$txtCurp = $_POST['txtCurp'];
		$txtFechaIngreso = $_POST['txtFechaIngreso'];
		$txtCalle = $_POST['txtCalle'];		
		$txtNumeroCasa = $_POST['txtNumeroCasa'];		
		$txtColonia = $_POST['txtColonia'];
		$txtCP = $_POST['txtCP'];
		$txtMunicipio = $_POST['txtMunicipio'];		
		$txtEstado = $_POST['txtEstado'];
		$txtPais = $_POST['txtPais'];	
		$txtContacto = $_POST['txtContacto'];
		$txtTelefono = $_POST['txtTelefono'];
		$txtPeriodoEscolar = $_POST['txtPeriodoEscolar'];
		$txtMaestros = $_POST['txtMaestros'];
	}

else
	{
		$txtNombreAlumno = "";
		$txtApellidoPaterno = "";
		$txtApellidoMaterno = "";
		$txtFechaNacimiento = "";
		$txtCurp = "";
		$txtFechaIngreso = "";
		$txtCalle = "";		
		$txtNumeroCasa = "";		
		$txtColonia = "";
		$txtCP = "";
		$txtMunicipio = "";		
		$txtEstado = "";
		$txtPais = "";		
		$txtContacto = "";
		$txtTelefono = "";
		$txtPeriodoEscolar = "";
		$txtMaestros = "";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->
    <title>Escolar</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->    
    <script src="js/ie-emulation-modes-warning.js"></script>  
	<script>
		function back()
		{
			window.open ("inicio", "_self");
		}
		
		function WSMaestros()
		{
			var txtPeriodoEscolar = document.getElementById("txtPeriodoEscolar").value;
			
			if(txtPeriodoEscolar != -2)
			{
				$.ajax({
				url        : "http://localhost:8080/AdminEscolar/webservice/wsObtenerMaestros.php",
				type       : "POST",
				cache	   : false,
				dataType   : 'json',
				crossDomain: true,
				data       : { txtPeriodoEscolar : txtPeriodoEscolar},
				success    : function(data) {
					
					var select = data.select;
					
					document.getElementById("txtMaestros").disabled = false;
					var txtMaestros = document.getElementById("txtMaestros");
					txtMaestros.innerHTML = select;
										
				},
					error : function() 
					{
						alert("No se pueden obtener los maestros.");                  
					}
				}
				);
			}
			else
			{
				alert ("Debe seleccionar un Periodo Escolar");
				document.getElementById("txtMaestros").disabled = true;
				document.getElementById("txtMaestros").innerHTML = "<option value='-2'>Elija un maestro</option>";
			}
		}
		
	</script>
  </head>
    
<!-- Menu -->
  <body role="document">
    <?php
		menu(1);
	?>
	
	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="inicio">Inicio</a></li>
		<li role="presentation"><a href="#">Alumnos</a></li>
		<li role="presentation" class="active"><a>Agregar alumnos</a></li>
    </ul>
	</br>
	
	<div class="container">
	<div>	
		<form name="vform" id="form" enctype="multipart/form-data" method="POST" action="alumnosAgregar">  
			<div class="form-group">
			
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Nombre del alumno</span></strong></td>
												<td><strong><span class='text-primary'>Apellido paterno</span></strong></td>
												<td><strong><span class='text-primary'>Apellido materno</span></strong></td>
											</tr>";
											
				echo "<tr>
						<td><input type='text' name='txtNombreAlumno' value='".$txtNombreAlumno."' class='form-control' placeholder='Nombre alumno.' title='Ej. Alberto' size='20' maxlength='20' required></td>
						<td><input type='text' class='form-control' name='txtApellidoPaterno' value='".$txtApellidoPaterno."' size='20' maxlength='20' required placeholder='Apellido paterno.' title='Ej. Castro'></td>
						<td><input type='text' class='form-control' name='txtApellidoMaterno' value='".$txtApellidoMaterno."' size='20' maxlength='20' required placeholder='Apellido materno.' title='Ej. Valencia'></td>
					</tr>";
							
				echo  "</table>";
				?>				
				
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Fecha de nacimiento</span></strong></td>
												<td><strong><span class='text-primary'>CURP</span></strong></td>
												<td><strong><span class='text-primary'>Fecha de ingreso</span></strong></td>
											</tr>";
				echo "<tr>
						<td><input type='date' class='form-control' name='txtFechaNacimiento' value='".$txtFechaNacimiento."' size='10' maxlength='10' required title='Ej. 30/09/1989'></td>
						<td><input type='text' class='form-control' name='txtCurp' value='".$txtCurp."' size='18' maxlength='18' required placeholder='Curp.' title='Ej. BEML920313HCMLNS09'></td>
						<td><input type='date' class='form-control' name='txtFechaIngreso' value='".$txtFechaIngreso."' size='10' maxlength='10' required title='Ej. 10/08/2016'></td>
					</tr>";
							
				echo  "</table>";							
				?>
				
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Calle</span></strong></td>
												<td><strong><span class='text-primary'>Numero de casa</span></strong></td>
												<td><strong><span class='text-primary'>Colonia</span></strong></td>
											</tr>";
				echo "<tr>						
						<td><input type='text' class='form-control' name='txtCalle' value='".$txtCalle."' size='50' maxlength='50' required placeholder='Nombre de la calle.' title='Ej. Av. Vallarta'></td>
						<td><input type='text' class='form-control' name='txtNumeroCasa' value='".$txtNumeroCasa."' size='10' maxlength='10' required placeholder='N&uacute;mero de casa.' title='25-A'></td>
						<td><input type='text' class='form-control' name='txtColonia' value='".$txtColonia."' size='50' maxlength='60' required placeholder='Colonia.' title='Centro'></td>
					</tr>							
				</table>";							
				?>
				
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>C.P.</span></strong></td>
												<td><strong><span class='text-primary'>Municipio</span></strong></td>
												<td><strong><span class='text-primary'>Estado</span></strong></td>
												<td><strong><span class='text-primary'>Pa&iacute;s</span></strong></td>
											</tr>";
				echo "<tr>
						<td><input type='text' class='form-control' name='txtCP' pattern='[0-9]{5,9}' title='Ej. 12345' value='".$txtCP."' size='10' maxlength='10' required placeholder='C.P.'></td>
						<td><input type='text' class='form-control' name='txtMunicipio' value='".$txtMunicipio."' size='45' maxlength='45' required placeholder='Municipio.' title='Ej. Lagos de Moreno'></td>
						<td><input type='text' class='form-control' name='txtEstado' value='".$txtEstado."' size='45' maxlength='45' required placeholder='Estado.' title='Ej. Jalisco'></td>
						<td><input type='text' class='form-control' name='txtPais' value='".$txtPais."' size='45' maxlength='45' required placeholder='Pa&iacute;s.' title='Ej. M&eacute;xico'></td>
					</tr>";
							
				echo  "</table>";
				?>
				
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Contacto</span></strong></td>
												<td><strong><span class='text-primary'>Tel&eacute;fono</span></strong></td>
											</tr>";
				echo "<tr>
						<td><input type='text' class='form-control' name='txtContacto' title='Ej. Alejandra Rodriguez Valencia' value='".$txtContacto."' size='100' maxlength='100' required placeholder='Nombre de persona de contacto.' ></td>
						<td><input type='text' class='form-control' name='txtTelefono' pattern='[0-9 -]{10,20}' title='Ej. 3310259000' value='".$txtTelefono."' size='20' maxlength='20' required placeholder='Tel&eacute;fono.'></td>
					</tr>";
							
				echo  "</table>";
				?>						
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Periodo escolar</span></strong></td>
												<td><strong><span class='text-primary'>Maestro</span></strong></td>
											</tr>";
				echo "<tr>						
						<td><select class='form-control' id='txtPeriodoEscolar' name='txtPeriodoEscolar' onChange='WSMaestros()'>";						
						$query = "SELECT * FROM periodos WHERE estatus = 1";
						$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
						$rowsPeriodos = mysql_num_rows($result);
										
						//Si encuentra resultados, muestra los periodos.
						if($rowsPeriodos > 0)
						{
							//Obtiene el Id del periodo
							echo '<option value="-2">Elija un periodo</option>';
							while($rows = mysql_fetch_array($result))
							{
								$idPeriodo = $rows["idPeriodo"];
								$periodo = $rows["periodo"];	
								$turno = $rows["turno"];
								$grupo = $rows["grupo"];
								$grado = $rows["grado"];
								$periodo = "$grado $grupo, $turno $periodo ";					
								
								if($txtPeriodoEscolar == $idPeriodo)
									echo '<option value="'.$idPeriodo.'" selected>'.$periodo.'</option>';
								else
									echo '<option value="'.$idPeriodo.'">'.$periodo.'</option>';
							}
						}						
						//Si no hay resultados, solo muestra "".
						else
						{
							echo '<option value="-1">Periodos no cargados</option>';
						}					
					echo "</select>
					</td>";				
						
				echo "<td><select class='form-control' id='txtMaestros' name='txtMaestros' disabled>";	
				echo "<option value='-2'>Elija un maestro</option>";				
					$query = "SELECT * FROM maestros WHERE idPeriodo = '".$txtPeriodoEscolar."' AND estatus = 1";
					$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
					$rows = mysql_num_rows($result);
					if ($rows > 0)
					{														
						while($rows = mysql_fetch_array($result))
						{	
							$nombre = $rows["nombre"];
							$apellido_pat = $rows["apellido_pat"];
							$apellido_mat = $rows["apellido_mat"];
							$idMaestros	 = $rows["idMaestros"];
							$NombreMaestro = " $nombre $apellido_pat $apellido_mat";	
							
							if($txtMaestros == $idMaestros)
								echo '<option value="'.$idMaestros.'" selected>'.$NombreMaestro.'</option>';		
							else
								echo '<option value="'.$idMaestros.'">'.$NombreMaestro.'</option>';		
						}	
					}
					else
					{
						$select = $select . '<option value="-1">No existe maestro para este turno </option>';
					}											
				echo "</select>
					</td>
					</tr>							
				</table>";							
				?>
				
				<br>	
				<input type="submit" name="btnGuardar"class="btn btn-success btn-lg" value="Agregar">
				<input type="button" name="btnCancelar" class="btn btn-success btn-lg" onClick="back()" value="Volver">
				
				<?php
				if($txtPeriodoEscolar != -2 && $txtMaestros != 2)
				{
					//Validar que los campos contenga información
					if( !empty ($txtNombreAlumno) && !empty($txtApellidoPaterno) && !empty($txtApellidoMaterno) && !empty($txtFechaNacimiento) && !empty($txtCurp) && !empty($txtFechaIngreso) && !empty($txtCalle) && !empty($txtNumeroCasa) && !empty($txtColonia) && !empty($txtCP) && !empty($txtMunicipio) && !empty($txtEstado) && !empty($txtPais) && !empty($txtContacto) && !empty($txtTelefono) && !empty($txtPeriodoEscolar) && !empty($txtMaestros))						
					{
						//Validar que no exista el alumnos en BD
						$query = " SELECT 1 FROM alumnos WHERE nombre = '".$txtNombreAlumno."' AND apellidopat = '".$txtApellidoPaterno."' AND apellido_mat = '".$txtApellidoMaterno."' ";
						$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
						$rows = mysql_num_rows($result);
													
							if($rows == 0)
								{
									//Primer tabla
									$queryAlumnoIP = "INSERT INTO alumnos VALUES (0, '".$txtNombreAlumno."' , '".$txtApellidoPaterno."' , '".$txtApellidoMaterno."' , '".$txtFechaNacimiento."' , '".$txtFechaIngreso."' , 1 , '".$txtPeriodoEscolar."' , '".$txtMaestros."' )";
									mysql_query($queryAlumnoIP,$connection) or die("Error al agregar información basica del alumno.".mysql_error());
									
									//Obtener el ID del alumno regustrado.
									$query = "SELECT idAlumnos FROM alumnos WHERE nombre = '".$txtNombreAlumno."' AND apellidopat = '".$txtApellidoPaterno."' AND apellido_mat = '".$txtApellidoMaterno."' AND estatus = 1";
									$result = mysql_query($query,$connection) or die("Error.".mysql_error());
									$rows = mysql_fetch_array($result);
									$idAlumnos = $rows["idAlumnos"];								
									
									//Segunda tabla
									$queryAlumnoIS = "INSERT INTO alumnosinf VALUES (0, '".$txtContacto."' , '".$txtTelefono."' , '".$txtCalle."' , '".$txtNumeroCasa."' , '".$txtColonia."' , '".$txtCP."' , '".$txtMunicipio."' , '".$txtEstado."' , '".$txtPais."' , '".$txtCurp."'  , '".$idAlumnos."')";
									mysql_query($queryAlumnoIS,$connection) or die("Error al agregar información secundaria del alumno.".mysql_error());
									echo "Alumno registrado";
								}				
							else
								{
										echo "La alumno ya se encuentra registrado.";
								}							
							dbClose($connection);
						}
					}				
					else
					{
						echo "Debe de llenar todos los campos.";
					}
				?>				
			</div> 
		</form>		  
	</div> 	
	  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>