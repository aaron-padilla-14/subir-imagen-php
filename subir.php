<?php

require('system/conexion.php');
$con = new conexion();



//comprueba si ha ocurrido un error
if ($_FILES['imagen']['error']>0) {
	echo "ha ocurrido un error en la subida";
} else{
	//ahora se verifica si el tipo de archivo es un tipo de imagen permitido
	//y el tamanio del archivoque no exceda los 1000kb
	$permitidos =array("image/jpg","image/jpeg","image/png","image/gif");
	$limite_kb = 1000;
	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
		//esta es la ruta donde se copiara la imagen
		//se debe crear o tener un directorio con el mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta="imagenes/".$_FILES['imagen']['name'];
		//se comprueba si este archivo existe para no volverlo a copiar
		//este paso se puede obviar no es necesario
		//o se le puede dar otro nombre para q no se sobreescriba el actual
		if (!file_exists($ruta)) {
			//aqui movemos el archivo desde la ruta temporal a la ruta creada
			//se usa la variable $resultado par almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado) {
				$nombre = $_FILES['imagen']['name'];
					if ($con->subir_imagen($nombre)) {
					echo "el archivo ha sido subido exitosamente<br>";
					} else {
					die("error");
					}
			} else{
				echo "ocurrio un error al mover el archivo";
			}
		} else{
			echo $_FILES['imagen']['name'].", este archivo existe ";
			echo "<br>".$_FILES['imagen']['size'];
		}
	} else {
		echo "Archivo no permitido, este tipo de archivo es prohibido o excede el tamanio de ".$limite_kb." Kilobytes <br>";
	}
}



?>