<?php
session_start();
if (isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        $fechahora = $_SESSION['fechahora'];
	$idprofesor = $_SESSION['idprofesor'];
	$rol = $_SESSION['rol'];
	
	
    }else{
 header('Location: acceso.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	    <!-- Bootstrap core CSS -->
	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>	


	<title>Menu NFC</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width"/>

</head>
<body>


	<form method="post">

<br>
<div class="row" align="center">
<h2> Departamentos Disponibles </h2>
  <div class="col-md-6">
    <div class="card" align="center">
      <div class="card-body">
        <h5 class="card-title">Departamento Informática</h5>
        <p class="card-text">Abra el departamento de informatica mediante NFC si está autorizado.</p>
        <input type="submit" class="btn btn-success" name="informatica" value="Abrir Departamento Informatica"/>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Departamento Ciencias</h5>
        <p class="card-text">Abra el departamento de ciencias mediante NFC si está autorizado.</p>
        <input type="submit" class="btn btn-success" name="ciencias" value="Abrir Departamento Ciencias"/>
      </div>
    </div>
  </div>

</div>

<br>
<div class="row" align="center">
<h2> Clases Disponibles </h2>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Clase 1º ASIR</h5>
        <input type="submit" class="btn btn-success" name="1asir" value="Abrir 1º ASIR"/>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Clase 2º ASIR</h5>
        <input type="submit" class="btn btn-success" name="2asir" value="Abrir 2º ASIR"/>
      </div>
    </div>
  </div>
</div>


        <br>
	<div class="container" align="center">
        <input type="submit" class="btn btn-danger btn-lg" name="cerrar" value="Cerrar Sesion"/>
	<?php
	if($_SESSION['rol'] == 'Administrador') {?>
	<a href="menuadmin.php" class="btn btn-primary btn-lg enabled" role="button" aria-disabled="true">Administración NFC</a>
	<?php }?>
	</div>
    </form>

<?php
   //Pulsacion sobre puerta informatica   
        if(isset($_POST['informatica'])) {
$id_puerta = 1;
exec('python3 /home/ubuntu/puerta1.py '.$idprofesor.' '.$id_puerta.' > /dev/null &');


//Prueba SSH2
//$server   = "192.168.1.128"; // server IP/hostname of the SSH server
//$username = "pi"; // username for the user you are connecting as on the SSH server
//$password = "abcd1234@"; // password for the user you are connecting as on the SSH server
//$command  = "python3 /home/pi/Desktop/rfidreader.py ".$idprofesor." ".$id_puerta.""; // could be anything available on the server you are SSH'ing to

// Establish a connection to the SSH Server. Port is the second param.
//$connection = ssh2_connect($server, 22);

// Authenticate with the SSH server
//ssh2_auth_password($connection, $username, $password);

// Execute a command on the connected server and capture the response
//$stream = ssh2_exec($connection, $command);

// Sets blocking mode on the stream
//stream_set_blocking($stream, true);

// Get the response of the executed command in a human readable form
//$output = stream_get_contents($stream);

// echo output
//echo "<pre>{$output}</pre>";

	    
        }
        if(isset($_POST['ciencias'])) {
        $id_puerta = 1;
	exec('python3 /home/ubuntu/puerta2.py '.$idprofesor.' '.$id_puerta.' > /dev/null &');
	

        }
	if(isset($_POST['recuperar'])) {
	header("Location: menuadmin.php");
	}
        if(isset($_POST['cerrar'])) {
        session_destroy();
        header('Location: index.php');
        }
?>    

    
</body>

</html>
