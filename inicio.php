<?php
session_start();
include 'functions.php';

//Valida, si las variables de sesión no tienen datos, redirecciona a login.
if(empty($_SESSION['login_user']) && empty($_SESSION['login_id']))
{
	header("location: login");
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
  </head>

<!-- 
<?php
echo "Usuario: ".$_SESSION['login_user'];
?> 
-->

  <!-- Menu -->
  <body role="document">
	<?php
		menu(0);
	?>  
	
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation"><a>Escolar</a></li>
		<li role="presentation"><a>Inicio</a></li>
     </ul>
  
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