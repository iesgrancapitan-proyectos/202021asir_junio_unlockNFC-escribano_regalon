<html>
<head>
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
	    <!-- Bootstrap core CSS -->
	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<form action="editar_usuario.php" method="POST" enctype="multipart/form-data" data-toggle="validator">
	<div class="container">
		<h1>Datos del Usuario</h1>
		<?php
		include ('conexion.php');
		$codigo = $_GET['id'];
		$sql = "SELECT * FROM profesores WHERE id = '$codigo'";
		$resultado = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($resultado);
		?>
	<!-- ID del Usuario no se modifica es único -->
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><b>ID Usuario</b></label>
	    <input type="text" class="form-control" id="exampleFormControlInput1" name="id" value="<?php echo $row['id']; ?>" readonly>
	  </div>

	  <!-- Nombre del Usuario -->
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><b>Nombre Usuario</b></label>
	    <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" value="<?php echo $row['usuario']; ?>" readonly>
	    <!-- Valida que el nombre del usuario no sea nulo -->
	</div>

	  <!-- Clave del Usuario-->
	    <div class="form-group">
	    <label for="exampleFormControlInput1"><b>Contraseña</b></label>
	    <input type="text" class="form-control" id="exampleFormControlInput1" name="clave" value="<?php echo $row['contraseña']; ?>" readonly>
	  </div>

	  <!--Email del Usuario-->
	    <div class="form-group">
	    <label for="exampleFormControlInput1"><b>Email</b></label>
	    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="<?php echo $row['email']; ?>" readonly>
	  </div>



<!--Aqui especificamos las puertas disponibles y comprobamos si un usuario tiene acceso a ella-->
	<h3>Puertas Disponibles</h3>
		<?php
		include ('conexion.php');
		$puertas = "SELECT * FROM Puertas";
		$resultado2 = mysqli_query($conn,$puertas);
		$row = mysqli_query($resultado2);
		while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) {
		$id_puerta=$row['id_puerta'];
		$prueba2 = "SELECT * from Permisos Where id_profesor='$codigo' and id_puerta='$id_puerta'";		
		$resultado3 = mysqli_query($conn,$prueba2);
		//echo $prueba2;
		if(mysqli_num_rows($resultado3) == 0) { ?>
		<input type="checkbox" name="checkbox[]" value="<?php echo $row['id_puerta'];?>"><?php echo $row['nombre'];?><br>
<?php
		}
		else {
?>
		<input type="checkbox" name="checkbox[]" value="<?php echo $row['id_puerta'];?>"checked><?php echo $row['nombre'];?><br>
		<?php } } ?>
<button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
	</div>
	</form>


<?php 
if(isset($_REQUEST["actualizar"])){
$checkbox1 = $_POST['checkbox'];
include('conexion.php');
$codigo = $_REQUEST['id'];
$delete = "DELETE FROM Permisos WHERE id_profesor='$codigo'";
$borrado=mysqli_query($conn,$delete);
    $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
		$codigo = $_REQUEST['id'];
		include ('conexion.php');
		
		
		
		$insert = "INSERT INTO Permisos(id_profesor,id_puerta) VALUES($codigo,$chk1)";
		$insercion = mysqli_query($conn,$insert);
		header('Location: listausuarios.php');
       }    
}
?>
</body>
</html>
