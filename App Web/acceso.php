
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="acceso.php">
      <img class="mb-4" src="./imagenes/nfc.png" alt="" width="110" height="110">
      <h1 class="h3 mb-3 font-weight-normal">Acceso Web-NFC</h1>
      <p></p>
      <input type="text" id="inputEmail" class="form-control" placeholder="Nombre Usuario" name="usuario" required autofocus><p></p>
      <p></p>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="contrasena" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recuerdame
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar">Acceder</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
      
      <?php
	if(isset($_REQUEST["entrar"]))
	{
		include ('conexion.php');
		//Construimos consulta para seleccionar usuario y contraseña
		$query = "Select id,usuario,contraseña,rol from profesores where usuario like '".$_REQUEST['usuario']."' and contraseña like md5('".$_REQUEST['contrasena']."')";
		
		//Lanzamos la consulta contra el servidor
		$result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_assoc($result)) {
		  
		    $idprofesor = $row['id'];
		    $rol = $row['rol'];		    
 }
		    		

		
		if(mysqli_num_rows($result) == 0) {
			echo "<div style='color:red' align='center'>Usuario o contraseña incorrecto</div>";
			echo "<div style='color:red' align='center'>Será redirigido en 5 segundos a la página principal</div>";
			header("refresh:5;url=index.php");
		}
		else {
			session_start();
			$_SESSION['usuario'] = $_REQUEST['usuario'];
			$_SESSION['fechahora'] = date('m/d/Y g:ia');
			$_SESSION['idprofesor'] = $idprofesor;
			$_SESSION['rol'] = $rol;
			header("Location: menu.php");
			
			}
			
	};
?>
      
      
    </form>
  </body>
</html>
