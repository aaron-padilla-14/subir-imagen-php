<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>subir imagenes</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>
	<h1 class="primary">Hola mundo</h1>
	<form action="subir.php" id="formulario" method="POST" enctype="multipart/form-data">
		<label for="imagen">Imagen:</label>
		<input type="file" class="btn btn-success" name="imagen"/>
		<input type="submit" class="btn btn-primary" name="subir" value="Subir"/>
	</form>
	<div id="respuesta"></div>
	<div class="container-fluid">

	<?php
		require('system/conexion.php');
		$con = new conexion();
		$imagenes = $con->get_imagenes();
	?>

	 <?php foreach ($imagenes as $imagen): ?>
	 	<div class="col-md-3 avatar">
	 	<?php $ruta ="imagenes/".$imagen['imagen'] ?>
			<img src="<?php echo $ruta ?>">
		</div>
	<?php endforeach ?>

	</div>


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- <script type="text/javascript" src="js/script.js"></script> -->


</body>
</html>