<?php

//Conexion a a la Base de Datos
function connection()
{
    $user = "root";
    $password = "usbw";
    $database = "adminescolar";
    $connectionDB = mysql_connect('localhost', $user, $password);
    @mysql_select_db($database) or die( "Unable to select database".mysql_error());
    return $connectionDB;
}
//Cierra conexion de la Base de Datos.
function dbClose($connection)
{
  mysql_close($connection);  
}

//Pantalla que aparece cuando no tiene privilegios.
function screenSecurity($pantalla)
{
	//Alumnos
	$idPerfil = getPerfil();
	if($pantalla == "menuAlumnos")
		{
			if($idPerfil != 1 && $idPerfil != 2)
				header("Location: seguridad");
		}
	if($pantalla == "alumnosAgregar")
		{
			if($idPerfil != 1 && $idPerfil != 2)
				header("Location: seguridad");
		}	
	if($pantalla == "alumnosConsultar")
		{
			if($idPerfil != 1 && $idPerfil != 2)
				header("Location: seguridad");
		}	
	if($pantalla == "alumnosBaja")
		{
			if($idPerfil != 1 && $idPerfil != 2)
				header("Location: seguridad");
		}
		
		//Maestros
	if($pantalla == "menuMaestros")
		{
			if($idPerfil != 1 && $idPerfil != 2)
				header("Location: seguridad");
		}
	if($pantalla == "maestrosAgregar")
		{
			if($idPerfil != 1 && $idPerfil != 2)
				header("Location: seguridad");
		}	
	if($pantalla == "maestrosBaja")
		{
			if($idPerfil != 1 && $idPerfil != 2)
				header("Location: seguridad");
		}		
	if($pantalla == "maestrosConsultar")
	{
		if($idPerfil != 1 && $idPerfil != 2)
			header("Location: seguridad");
	}
}

//Obtiene el Perfil de Usuario
function getPerfil()
{
	$connection = connection();
	$queryPerfil = "SELECT iidPerfil FROM login WHERE user = '".$_SESSION['login_user']."' ";
	$resultPerfil = mysql_query($queryPerfil,$connection)or die ("Error: ".mysql_error());
	$rowsPerfil = mysql_num_rows($resultPerfil);
	if($rowsPerfil > 0)
	{
		$rows = mysql_fetch_array($resultPerfil);
		$idPerfil = $rows["iidPerfil"];
	}
	else
	{
		$idPerfil = -1;
	}
	return $idPerfil;
}

function getIdUsuarioSesion()
{
	return $_SESSION['login_id'];
}

//Menu Activo
function menu($activo)
{
?>
	<nav class="navbar navbar-inverse">
        <div class="container">
		
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="#">ERP - SHS</a>-->
          </div> 
		  
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">				
				<?php	
				//Se obtiene el nivel de usuario.
				$idPerfil = getPerfil();
				
				//Manú Inicio
				if($activo == 0)
					{
						echo '<li class="active"><a href="inicio">Informativa</a></li>';
					}
				else
					{
						echo '<li><a href="inicio">Informativa</a></li>';
					}			
				
				//Alumnos	
				if($idPerfil == 1)
				{
					if($activo == 1)
						{
							echo '<li class="active"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alumnos<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="alumnosAgregar">Agregar</a></li>
											<li><a href="alumnosBaja">Baja</a></li>
											<li><a href="#">Modificar</a></li>
											<li><a href="alumnosConsultar">Consultar</a></li>
										</ul>
								</li>';
						}				
					else
						{
							echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alumnos<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="alumnosAgregar">Agregar</a></li>
											<li><a href="alumnosBaja">Baja</a></li>
											<li><a href="#">Modificar</a></li>
											<li><a href="alumnosConsultar">Consultar</a></li>
										</ul>
								</li>';
						}
				}		

				//Maestros	
				if($idPerfil == 1  || $idPerfil == 2)
				{
					if($activo == 2)
						{
							echo '<li class="active"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maestros<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="maestrosAgregar">Agregar</a></li>
											<li><a href="#">Baja</a></li>
											<li><a href="#">Modificar</a></li>
											<li><a href="maestrosConsultar">Consultar</a></li>
										</ul>
								</li>';
						}				
					else
						{
							echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maestros<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="maestrosAgregar">Agregar</a></li>
											<li><a href="#">Baja</a></li>
											<li><a href="#">Modificar</a></li>
											<li><a href="maestrosConsultar">Consultar</a></li>
										</ul>
								</li>';
						}
				}					
				?>				
				</ul>
			</div><!--/.nav-collapse -->
        </div>
    </nav> <!-- Fin menu -->	
<?php
}
?>
