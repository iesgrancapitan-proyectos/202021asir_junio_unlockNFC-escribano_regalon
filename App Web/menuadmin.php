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
	<meta name="viewport" content="width=device-width"/>
	    <!-- Bootstrap core CSS -->
	<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
	
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

	<title>Menu NFC</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	

</head>
<body>
<div class="container-fluid">
<h1 align="center">Menu Administración NFC</h1>
<div class="card w-100">
  <div class="card-body" align="center">
    <h5 class="card-title">Crear Usuarios</h5>
    <p class="card-text">Desde aqui podras dar de alta a los nuevos usuarios.</p>
    <a href="crearusuario.php" class="btn btn-primary">Entrar</a>
  </div>
</div>
<div class="card w-100">
  <div class="card-body" align="center">
    <h5 class="card-title">Lista Usuarios</h5>
    <p class="card-text">Lista de todos los usuarios del sistema.</p>
    <a href="listausuarios.php" class="btn btn-primary">Entrar</a>
  </div>
</div>
<br>
<form method="post" align="center">
<input type="submit" class="btn btn-danger btn-lg" name="cerrar" value="Cerrar Sesion"/>
<a class="btn btn-primary btn-lg" href="menu.php" role="button">Menú</a>
</form>
</div>
</body>
<?php
        if(isset($_POST['cerrar'])) {
        session_destroy();
        header('Location: index.php');
        }
?>



</html>
