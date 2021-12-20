<html>
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
<head>
	<meta name="viewport" content="width=device-width"/>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</head>
<body>

<div class="container" align="center"><br>
<h2>Usuarios Registrados</h2>
<div class="row table-responsive">
  <br>
</br>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>RFID</th>
						</tr>
					</thead>

					<tbody>
						<?php
							include ("conexion.php");
							$sql='Select * FROM profesores';
							$result= mysqli_query($conn,$sql);
							while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['usuario']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['rfid']; ?></td>
								<td><a class="btn btn-success" href="editar_usuario.php?id=<?php echo $row['id']; ?>"><span class="fa fa-delete"></span> Editar</a></td>
								<td><a class="btn btn-danger" data-href="borrado.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i><span class="fa fa-delete"></span> Borrar</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Modal para confirmar la eliminacion del usuario -->

		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">Eliminar Usuario</h4>
					</div>
					<div class="modal-body">
						¿Desea eliminar este usuario por incumplimiento de alguna norma?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Borrar</a>
					</div>
				</div>
			</div>
		</div>
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>
<div class="container" align="center">
	<a class="btn btn-primary" href="menuadmin.php" role="button">Menu Administración</a>
</div>
</body>
</html>
