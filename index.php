<?php
session_start();
session_destroy();
include 'functions.php';

//Si las variables tienen información redireccionan a Inicio.php
//if((empty($_SESSION['login_user']) && empty($_SESSION['login_pass'])) != true)
/*if(!empty($_SESSION['login_user']) && !empty($_SESSION['login_id']))
{
	header("location: inicio");
}*/
//Si las variables de sesion no estan vacias, las asigna a la variable, si estan vacias, asigna "" a la variable.
if (isset($_POST['btnInicio'])) 
{
	$txtUsuario=$_POST['txtUsuario'];
	$txtPass=$_POST['txtPass'];
}	
	
else
{
	$txtUsuario= "";
	$txtPass= "";
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
    <!--<link rel="icon" href="//www.shs.com.mx/favicon.ico">-->
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
		function login()
		{
			window.open ("login", "_self");
		}
	</script>
  </head>
  
	<body role="document">	
		<!-- Enlace a inicio de sesion -->
		<center>
		<div class="jumbotron" style="background-color: #1F4673; color: #fff; position: relative; top: -100px; margin: 0px; padding: 10px;">
			<h2>Sistema Escolar</h2>
			<p>"Escuela Primaria"</p>
			<input type="button" name="btnGuardar" class="btn btn-info" onClick="login()" style="position: absolute; top: 40px; right: 10px;" value="AdminEscolar Ingresar">
		</div>
		</center>
			<!-- Carrusel -->
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="position: relative; top: -100px;">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<center><img src="imagenes/alumnos.jpg" alt="First slide" title="Alumnos" style="width: 55%;"></center>
					</div>
					<div class="item">
						<center><img src="imagenes/school.jpg" alt="Second slide" title="School" style="width: 52.4%;"></center>
					</div>
					<div class="item">
						<center><img src="imagenes/articulos.jpg" alt="Second slide" title="Articulos" style="width: 46%;"></center>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
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