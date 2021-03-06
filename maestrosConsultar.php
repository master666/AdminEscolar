<?php
session_start();
include 'functions.php';
$connection=connection();
$idPerfil = getPerfil();
screenSecurity("maestrosConsultar");

//Valida, si las variables de sesi�n no tienen datos, redirecciona a login.
if(empty($_SESSION['login_user']) && empty($_SESSION['login_id']))
	{
		header("location: login");
	}

/*Variables a utilizar*/
if (isset($_POST['btnModificar'])) 
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
		$txtMaestrosSeleccionar = $_POST['txtMaestrosSeleccionar'];
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
		$txtMaestrosSeleccionar = "";
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
		
		function WSMaestrosConsultar()
		{
			var txtMaestrosSeleccionar = document.getElementById("txtMaestrosSeleccionar").value;
			
			document.getElementById("txtNombreMaestro").value = "";
			document.getElementById("txtApellidoPaterno").value = "";
			document.getElementById("txtApellidoMaterno").value = "";
			document.getElementById("txtFechaNacimiento").value = "";
			document.getElementById("txtCurp").value = "";
			document.getElementById("txtCalle").value = "";
			document.getElementById("txtNumeroCasa").value = "";
			document.getElementById("txtColonia").value = "";
			document.getElementById("txtCP").value = "";
			document.getElementById("txtEstado").value = "";
			document.getElementById("txtPais").value = "";
			document.getElementById("txtContacto").value = "";
			document.getElementById("txtTelefono").value = "";
			document.getElementById("txtPeriodoEscolar").value = "";
			document.getElementById("txtRango").value = "";
			document.getElementById("txtCedula").value = "";
			document.getElementById("txtRfc").value = "";
			
			if(txtMaestrosSeleccionar > 0)
			{
				$.ajax({
					url        : "http://localhost:8080/AdminEscolar/webservice/WSConsultarMaestros.php",
					type       : "POST",
					cache	   : false,
					dataType   : 'json',
					crossDomain: true,
					data       : { txtMaestrosSeleccionar : txtMaestrosSeleccionar },
					success    : function(data) {
						
					//Info tabla maestros
					var nombre = data.nombre;
					var apellido_pat = data.apellido_pat;
					var apellido_mat = data.apellido_mat;
					var fecha_nacimiento = data.fecha_nacimiento;
					var fecha_ingreso = data.fecha_ingreso;
					var idPeriodo = data.idPeriodo;	
					
					//Info tabla maestrosinf
					var contacto = data.contacto;
					var telefono = data.telefono;
					var calle = data.calle;
					var num_casa = data.num_casa;
					var colonia = data.colonia;
					var cp = data.cp;
					var municipio = data.municipio;
					var estado = data.estado;
					var pais = data.pais;
					var cedula = data.cedula;
					var rango = data.rango;
					var curp = data.curp;
					var rfc = data.rfc;
					
					//Se pinta la info en cada campo por medio del ID.
					document.getElementById("txtNombreMaestro").value = nombre;
					document.getElementById("txtApellidoPaterno").value = apellido_pat;
					document.getElementById("txtApellidoMaterno").value = apellido_mat;
					document.getElementById("txtFechaNacimiento").value = fecha_nacimiento;
					document.getElementById("txtPeriodoEscolar").value = idPeriodo;						
					document.getElementById("txtContacto").value = contacto;
					document.getElementById("txtTelefono").value = telefono;
					document.getElementById("txtCalle").value = calle;
					document.getElementById("txtNumeroCasa").value = num_casa;
					document.getElementById("txtColonia").value = colonia;
					document.getElementById("txtCP").value = cp;
					document.getElementById("txtMunicipio").value = municipio;
					document.getElementById("txtEstado").value = estado;
					document.getElementById("txtPais").value = pais;
					document.getElementById("txtCedula").value = cedula;
					document.getElementById("txtRango").value = rango;
					document.getElementById("txtCurp").value = curp;	
					document.getElementById("txtRfc").value = rfc;					
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
				
			}
			
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
		<li role="presentation" class="active"><a>Consultar maestro</a></li>
    </ul>
	</br>
	
	<div class="container">
	<div>	
		<form name="vform" id="form" enctype="multipart/form-data" method="POST" action="maestrosConsultar">  
			<div class="form-group">			
			
			<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Maestro</span></strong></td>
											</tr>";
				echo "<tr>						
						<td><select class='form-control' id='txtMaestrosSeleccionar' name='txtMaestrosSeleccionar' onChange='WSMaestrosConsultar()'>";		
						$query = "SELECT * FROM maestros ORDER BY nombre";
						$result = mysql_query($query,$connection)or die ("Error: ".mysql_error());
						$rowsAlumnos = mysql_num_rows($result);										
						//Si encuentra resultados
						if($rowsAlumnos > 0)
						{
							echo '<option value="-2">Selecciona un maestro</option>';
							while($rows = mysql_fetch_array($result))
							{
								$idMaestros = $rows["idMaestros"];
								$nombre = $rows["nombre"];	
								$apellido_pat = $rows["apellido_pat"];
								$apellido_mat = $rows["apellido_mat"];
								$estatus = $rows["estatus"];
								$idPeriodo = $rows["idPeriodo"];	
								$NombreMaestro = " $nombre $apellido_pat $apellido_mat";
								
								if($idMaestros == $txtMaestrosSeleccionar)
									echo '<option value="'.$idMaestros.'" selected>'.$NombreMaestro.'</option>';
								else
									echo '<option value="'.$idMaestros.'">'.$NombreMaestro.'</option>';
							}
						}						
						//Si no hay resultados, solo muestra "".
						else
						{
							echo '<option value="-1">Maestros no cargados</option>';
						}						
					echo "
					</tr>							
				</table>";							
				?>
			
			
				<?php
				echo "<table class='table table-hover'>
											<tr>
												<td><strong><span class='text-primary'>Nombre del maestro</span></strong></td>
												<td><strong><span class='text-primary'>Apellido paterno</span></strong></td>
												<td><strong><span class='text-primary'>Apellido materno</span></strong></td>
											</tr>";
											
				echo "<tr>
						<td><input type='text' id='txtNombreMaestro' name='txtNombreMaestro' value='".$txtNombreMaestro."' class='form-control' placeholder='Nombre maestro.' title='Ej. Alberto' size='20' maxlength='20' required disabled></td>
						<td><input type='text' class='form-control' id='txtApellidoPaterno' name='txtApellidoPaterno' value='".$txtApellidoPaterno."' size='20' maxlength='20' required placeholder='Apellido paterno.' title='Ej. Castro' disabled></td>
						<td><input type='text' class='form-control' id='txtApellidoMaterno' name='txtApellidoMaterno' value='".$txtApellidoMaterno."' size='20' maxlength='20' required placeholder='Apellido materno.' title='Ej. Valencia' disabled></td>
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
						<td><input type='text' class='form-control' id='txtCurp' name='txtCurp' value='".$txtCurp."' size='18' maxlength='18' required placeholder='Curp.' title='Ej. BEML920313HCMLNS09' disabled></td>
						<td><input type='text' class='form-control' id='txtRfc' name='txtRfc' value='".$txtRfc."' size='13' maxlength='13' required placeholder='RFC.' title='Ej. BEML920313E83' disabled></td>
						<td><input type='text' class='form-control' id='txtCedula' name='txtCedula' value='".$txtCedula."' size='8' maxlength='8' required placeholder='Cedula.' title='Ej. 12345678' disabled></td>
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
						<td><input type='date' class='form-control' id='txtFechaNacimiento' name='txtFechaNacimiento' value='".$txtFechaNacimiento."' size='10' maxlength='10' required title='Ej. 30/09/1989' disabled></td>
						<td><input type='text' class='form-control' id='txtRango' name='txtRango' title='Ej. Maestro 1 Grado' value='".$txtRango."' size='20' maxlength='20' required placeholder='Rango del maestro.' disabled></td>
						<td><input type='text' class='form-control' id='txtPeriodoEscolar' name='txtPeriodoEscolar' title='Ej. 1 A, Matutino 2016 - 2017' value='".$txtPeriodoEscolar."' disabled></td>";							
																	
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
						<td><input type='text' class='form-control' id='txtCalle' name='txtCalle' value='".$txtCalle."' size='50' maxlength='50' required placeholder='Nombre de la calle.' title='Ej. Av. Vallarta' disabled></td>
						<td><input type='text' class='form-control' id='txtNumeroCasa' name='txtNumeroCasa' value='".$txtNumeroCasa."' size='10' maxlength='10' required placeholder='N&uacute;mero de casa.' title='25-A' disabled></td>
						<td><input type='text' class='form-control' id='txtColonia' name='txtColonia' value='".$txtColonia."' size='50' maxlength='60' required placeholder='Colonia.' title='Centro' disabled></td>
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
						<td><input type='text' class='form-control' id='txtCP' name='txtCP' pattern='[0-9]{5,9}' title='Ej. 12345' value='".$txtCP."' size='10' maxlength='10' required placeholder='C.P.' disabled></td>
						<td><input type='text' class='form-control' id='txtMunicipio' name='txtMunicipio' value='".$txtMunicipio."' size='45' maxlength='45' required placeholder='Municipio.' title='Ej. Lagos de Moreno' disabled></td>
						<td><input type='text' class='form-control' id='txtEstado' name='txtEstado' value='".$txtEstado."' size='45' maxlength='45' required placeholder='Estado.' title='Ej. Jalisco' disabled></td>
						<td><input type='text' class='form-control' id='txtPais' name='txtPais' value='".$txtPais."' size='45' maxlength='45' required placeholder='Pa&iacute;s.' title='Ej. M&eacute;xico' disabled></td>
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
						<td><input type='text' class='form-control' id='txtContacto' name='txtContacto' title='Ej. Alejandra Rodriguez Valencia' value='".$txtContacto."' size='100' maxlength='100' required placeholder='Nombre de persona de contacto.' disabled></td>
						<td><input type='text' class='form-control' id='txtTelefono' name='txtTelefono' pattern='[0-9 -]{10,20}' title='Ej. 3310259000' value='".$txtTelefono."' size='20' maxlength='20' required placeholder='Tel&eacute;fono.' disabled></td>
					</tr>";
							
				echo  "</table>";
				?>						
				
				<br>	
				<input type="submit" name="btnModificar"class="btn btn-success btn-lg" value="Modificar" disabled>
				<input type="button" name="btnCancelar" class="btn btn-success btn-lg" onClick="back()" value="Volver">
								
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