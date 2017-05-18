<?php
session_start();
include 'functions.php';
$connection=connection();
$idPerfil = getPerfil();
screenSecurity("maestrosAgregar");

//Valida, si las variables de sesión no tienen datos, redirecciona a login.
if(empty($_SESSION['login_user']) && empty($_SESSION['login_id']))
	{
		header("location: login");
	}

/*Variables a utilizar*/
if (isset($_POST['btnGuardar'])) 
	{
		$txtNombreMaestro = $_POST['txtNombreMaestro'];
		$txtApellidoPaterno = $_POST['txtApellidoPaterno'];
		$txtApellidoMaterno = $_POST['txtApellidoMaterno'];
		$txtFechaNacimiento = $_POST['txtFechaNacimiento'];
		$txtCurp = $_POST['txtCurp'];
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
		$txtRango = $_POST['txtRango'];
		$txtCedula = $_POST['txtCedula'];
		$txtRfc = $_POST['txtRfc'];
	}

else
	{
		$txtNombreMaestro = "";
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
		$txtRango = "";
		$txtCedula = "";
		$txtRfc = "";
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
	</script>
  </head>
    
<!-- Menu -->
  <body role="document">
    <?php
		menu(2);
	?>
	
	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="inicio">Inicio</a></li>
		<li role="presentation"><a href="#">Maestros</a></li>
		<li role="presentation" class="active"><a>Agregar maestro</a></li>
    </ul>
	</br>
	
	<div class="container">
	<div>	
		<form name="vform" id="form" enctype="multipart/form-data" method="POST" action="maestrosAgregar">  
			<div class="form-group">
			
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Nombre del maestro</span></strong></td>
												<td><strong><span class='text-primary'>Apellido paterno</span></strong></td>
												<td><strong><span class='text-primary'>Apellido materno</span></strong></td>
											</tr>";
											
				echo "<tr>
						<td><input type='text' name='txtNombreMaestro' value='".$txtNombreMaestro."' class='form-control' placeholder='Nombre maestro.' title='Ej. Alberto' size='20' maxlength='20' required></td>
						<td><input type='text' class='form-control' name='txtApellidoPaterno' value='".$txtApellidoPaterno."' size='20' maxlength='20' required placeholder='Apellido paterno.' title='Ej. Castro'></td>
						<td><input type='text' class='form-control' name='txtApellidoMaterno' value='".$txtApellidoMaterno."' size='20' maxlength='20' required placeholder='Apellido materno.' title='Ej. Valencia'></td>
					</tr>";
							
				echo  "</table>";
				?>				
				
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>CURP</span></strong></td>
												<td><strong><span class='text-primary'>RFC</span></strong></td>
												<td><strong><span class='text-primary'>Cedula</span></strong></td>
											</tr>";
				echo "<tr>
						<td><input type='text' class='form-control' name='txtCurp' value='".$txtCurp."' size='18' maxlength='18' required placeholder='Curp.' title='Ej. BEML920313HCMLNS09'></td>
						<td><input type='text' class='form-control' name='txtRfc' value='".$txtRfc."' size='13' maxlength='13' required placeholder='RFC.' title='Ej. BEML920313E83'></td>
						<td><input type='text' class='form-control' name='txtCedula' value='".$txtCedula."' size='8' maxlength='8' required placeholder='Cedula.' title='Ej. 12345678'></td>
					</tr>";
							
				echo  "</table>";							
				?>
				
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Fecha de nacimiento</span></strong></td>
												<td><strong><span class='text-primary'>Rango</span></strong></td>
												<td><strong><span class='text-primary'>Periodo escolar</span></strong></td>
											</tr>";
				echo "<tr>
						<td><input type='date' class='form-control' name='txtFechaNacimiento' value='".$txtFechaNacimiento."' size='10' maxlength='10' required title='Ej. 30/09/1989'></td>
						<td><input type='text' class='form-control' name='txtRango' title='Ej. Maestro 1 Grado' value='".$txtRango."' size='20' maxlength='20' required placeholder='Rango del maestro.' ></td>
						<td><select class='form-control' id='txtPeriodoEscolar' name='txtPeriodoEscolar'>";						
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
																	
				echo "
					</tr>							
				</table>";							
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
				
				<br>	
				<input type="submit" name="btnGuardar"class="btn btn-success btn-lg" value="Agregar">
				<input type="button" name="btnCancelar" class="btn btn-success btn-lg" onClick="back()" value="Volver">
				
				<?php
				if($txtPeriodoEscolar != -2 )
				{
					//Validar que los campos contenga información
					if( !empty ($txtNombreMaestro) && !empty($txtApellidoPaterno) && !empty($txtApellidoMaterno) && !empty($txtFechaNacimiento) && !empty($txtCurp) && !empty($txtRfc) && !empty($txtCalle) && !empty($txtNumeroCasa) && !empty($txtColonia) && !empty($txtCP) && !empty($txtMunicipio) && !empty($txtEstado) && !empty($txtPais) && !empty($txtContacto) && !empty($txtTelefono) && !empty($txtPeriodoEscolar) && !empty($txtRango) && !empty($txtCedula))						
					{
						//Validar que no exista el maestro en BD
						$query = " SELECT 1 FROM maestros WHERE nombre = '".$txtNombreMaestro."' AND apellido_pat = '".$txtApellidoPaterno."' AND apellido_mat = '".$txtApellidoMaterno."' ";
						$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
						$rows = mysql_num_rows($result);
													
							if($rows == 0)
								{
									//Primer tabla
									$queryMaestroIP = "INSERT INTO maestros VALUES (0, '".$txtNombreMaestro."' , '".$txtApellidoPaterno."' , '".$txtApellidoMaterno."' , '".$txtFechaNacimiento."' , 1 , '".$txtPeriodoEscolar."' )";
									mysql_query($queryMaestroIP,$connection) or die("Error al agregar información basica del maestro.".mysql_error());
									
									//Obtener el ID del maestrp registrado.
									$query = "SELECT idMaestros FROM maestros WHERE nombre = '".$txtNombreMaestro."' AND apellido_pat = '".$txtApellidoPaterno."' AND apellido_mat = '".$txtApellidoMaterno."' AND estatus = 1";
									$result = mysql_query($query,$connection) or die("Error.".mysql_error());
									$rows = mysql_fetch_array($result);
									$idMaestros = $rows["idMaestros"];								
									
									//Segunda tabla
									$queryMaestroIS = "INSERT INTO maestrosinf VALUES (0, '".$txtContacto."' , '".$txtTelefono."' , '".$txtCalle."' , '".$txtNumeroCasa."' , '".$txtColonia."' , '".$txtCP."' , '".$txtMunicipio."' , '".$txtEstado."' , '".$txtPais."' , '".$txtCedula."' , '".$txtRango."' , '".$txtRfc."'  , '".$txtCurp."'  , '".$idMaestros."')";
									mysql_query($queryMaestroIS,$connection) or die("Error al agregar informacion secundaria del maestro.".mysql_error());
									echo "Maestro registrado";
								}				
							else
								{
										echo "El maestro ya se encuentra registrado.";
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