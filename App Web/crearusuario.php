<?php
session_start();
if (isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        $fechahora = $_SESSION['fechahora'];
	$idprofesor = $_SESSION['idprofesor'];
	$rol = $_SESSION['rol'];

	if($_SESSION['rol'] == 'Profesor') {
	header('Location: menu.php');
	}
	
	
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

	<title>Menu NFC</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width"/>
	

</head>
	<body>
		<div class="container">
		  <div class="abs-center">
		  <h1>Registro Usuarios</h1>
		    <form action="crearusuario.php" class="border p-3 form">
		      <div class="form-group">
			<label for="usuario">Nombre Usuario</label>
			<input type="text" name="usuario" id="usuario" class="form-control">
		      </div>
		      <div class="form-group">
			<label for="password">Contraseña</label>
			<input type="password" name="password" id="password" class="form-control">
		      </div>
		      <div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control">
		      </div>
		      <div class="form-group">
			<label for="text">RFID</label>
			<input type="text" name="rfid" id="rfid" class="form-control" value="<?php $id = mt_rand(111111111,99999999999); echo $id;?>">
		      </div><br>
			<button type="submit" class="btn btn-primary" name="registrar">Registro Aleatorio</button><br><br>
		   
		      <button type="submit" class="btn btn-warning" name="prueba">Probar Codigo NFC Movil</button><br><br>
<?php
		        if(isset($_REQUEST["prueba"])){			
//Pruebas Socket
error_reporting(E_ALL);

/* Permitir al script esperar para conexiones. */
set_time_limit(1);

/* Activar el volcado de salida implícito, así veremos lo que estamos obteniendo
 * mientras llega. */
ob_implicit_flush();

$address = '172.31.31.179';
$port = 10001;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() falló: razón: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() falló: razón: " . socket_strerror(socket_last_error($sock)) . "\n";
}

do {
    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() falló: motivo " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }

    /* Enviar instrucciones. */
    $msg = "1000";
    socket_write($msgsock, $msg, strlen($msg));
do {
        if (false === ($buf = socket_read($msgsock, 2048))) {
            #echo "socket_read() falló: razón: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }
echo "Su identificador es: ";
echo $buf;
?>
			<input type="text" name="movilnfc" id="movilnfc" class="form-control" value="<?php echo $buf;?>">
			<br><?php
socket_close($msgsock);
        if ($buf == 'shutdown') {
            socket_close($msgsock);
            break 2;
        }
    } while (true);
    socket_close($msgsock);
} while (true);

socket_close($sock);




//$idprofesor=1000;
//$id_puerta=1000;
//exec('python3 /home/usuario/Escritorio/Socker_server.py '.$idprofesor.' '.$id_puerta.' > /dev/null &');
			//$server   = "192.168.1.122";
			//$username = "pi"; 
			//$password = "abcd1234@"; 
			//$command  = "python3 /home/pi/Desktop/leermovil.py"; 
			//$connection = ssh2_connect($server, 22);
			//ssh2_auth_password($connection, $username, $password);
			//$stream = ssh2_exec($connection, $command);
			//stream_set_blocking($stream, true);
			//$output = stream_get_contents($stream);
			}
			?>
			<!--<input type="text" name="movilnfc" id="movilnfc" class="form-control" value="<?php echo $buf;?>">
			<br>-->
		      
		      <button type="submit" class="btn btn-warning" name="regmovil">Registro Movil</button><br><br>
		      <a class="btn btn-primary" href="menuadmin.php" role="button">Menu Administración</a>
		    </form>
		  </div>
		</div>
		<?php	
		
		if(isset($_REQUEST["registrar"])){
		$usuario = $_REQUEST["usuario"];
		$contrasena = $_REQUEST["password"];
		$email = $_REQUEST["email"];
		$rfid = $_REQUEST["rfid"];
		
		//Pruebas Socket
		error_reporting(E_ALL);

/* Permitir al script esperar para conexiones. */
set_time_limit(1);

/* Activar el volcado de salida implícito, así veremos lo que estamos obteniendo
 * mientras llega. */
ob_implicit_flush();

$address = '172.31.31.179';
$port = 11000;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() falló: razón: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() falló: razón: " . socket_strerror(socket_last_error($sock)) . "\n";
}

do {
    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() falló: motivo " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }

    /* Enviar instrucciones. */
    $msg = $rfid;
    socket_write($msgsock, $msg, strlen($msg));
do {
        if (false === ($buf = socket_read($msgsock, 2048))) {
            #echo "socket_read() falló: razón: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }

socket_close($msgsock);
        if ($buf == 'shutdown') {
            socket_close($msgsock);
            break 2;
        }
    } while (true);
    socket_close($msgsock);
} while (true);

socket_close($sock);

		//$server   = "192.168.1.128";
		//$username = "pi"; 
		//$password = "abcd1234@"; 
		//$command  = "python3 /home/pi/Desktop/escribir.py ".$rfid.""; 
		//$connection = ssh2_connect($server, 22);
		//ssh2_auth_password($connection, $username, $password);
		//$stream = ssh2_exec($connection, $command);
		//stream_set_blocking($stream, true);
		//$output = stream_get_contents($stream);
		
		include ('conexion.php');
		$insert = "INSERT INTO profesores(usuario,contraseña,email,rfid) VALUES ('$usuario',md5('$contrasena'),'$email',$rfid)";
		$result = mysqli_query($conn,$insert);
		//echo $insert;
		header("Refresh:2; url=listausuarios.php");
		}
		if(isset($_REQUEST['regmovil'])) {
		include ('conexion.php');
		$usuario = $_REQUEST["usuario"];
		$contrasena = $_REQUEST["password"];
		$email = $_REQUEST["email"];
		$codigo = $_REQUEST['movilnfc'];
		$insert = "INSERT INTO profesores(usuario,contraseña,email,rfid) VALUES ('$usuario',md5('$contrasena'),'$email',$codigo)";
		$result = mysqli_query($conn,$insert);
		//echo $insert;
		header('Location: listausuarios.php');
		}
		?>
 
	
	</body>
</html>
