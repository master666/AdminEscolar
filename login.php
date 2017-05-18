<?php
session_start();
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
			window.open ("index", "_self");
		}
	</script>	
  </head>
    
	<body>
	<!-- Ingreso -->
		<div class="container"> 
			<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">			
				<!-- Logotipo -->
				<div class="row">    
					<div class="iconmelon">
						<center>
							<!--   <img src="imagenes/erp.jpg" title="Logotipo shs" style="width: 30%;"/>-->
						</center>
					</div>
				</div>
        
				<div class="" style="background-color: #f5f5f5;">
					<div class="panel-heading">
						<div class="text-primary"><h4><strong><center>Sistema Escolar</center></strong></h4></div>
					</div>  
					<div class="panel-body" >
						<form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="login">  
							<br>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="txtUsuario" type="text" class="form-control" name="txtUsuario" value="<?php echo $txtUsuario; ?>" placeholder="Usuario" maxlength="30" required>                                        
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="txtPass" type="password" class="form-control" name="txtPass" placeholder="Contraseña" size="30" required>
							</div>                                                                  
							<br>
							<center>
							<div class="form-group">
								<div class="col-sm-12 controls">
									<input type="submit" name="btnInicio" value="Ingresar" class="btn btn-success btn-lg"/>
									<input type="button" name="btnCancelar" class="btn btn-success btn-lg" onClick="back()" value="Volver">									
								</div>
							</div>
							</center>
							
							<?php
							if (isset($_POST['btnInicio'])) 
								{
									if (empty($_POST['txtUsuario']) || empty($_POST['txtPass'])) 
										{
											echo "Usuario o contraseña incorrecta";
											//echo '<script language="javascript">//alert("Usuario o contraseña incorrecta");</script>'; 
										}
									else
										{
											$connection=connection();
											$query = mysql_query("select * from login where User='".$txtUsuario."' and Password='".$txtPass."' ", $connection) or die ("error: ".mysql_error());
											$rows = mysql_num_rows($query);
											if ($rows == 1) 
												{
													$rows = mysql_fetch_array($query);
													$id = $rows["idLogin"];
													$_SESSION['login_user']=$txtUsuario; 
													$_SESSION['login_id']=$id;
														header("location: inicio");
												} 				
											else 
												{
													echo "Datos incorrectos";													
												}
													dbClose($connection);	
										}
								}

							else
								{ 
									//echo "";
									//echo '<script language="javascript">//alert("Error");</script>'; 
								}
							?>															
						</form>  
					</div>    
				</div>  
			</div>
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


