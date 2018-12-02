<?php include ('../conexion.php');?>

<?php 

$rutaEnServidor='imagenes';
$rutaTemporal=$_FILES['imagen']['tmp_name'];
$nombreImagen=$_FILES['imagen']['name'];
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
move_uploaded_file($rutaTemporal,$rutaDestino);

$nombre=$_POST['nombre'];
$precio=$_POST['precio'];

$desc=$_POST['descripcion'];
$enStock=$_POST['enStock'];
$fecha=$_POST['fecha'];

$sql="INSERT INTO productos (imagen,nombre,descripcion,precio,cuanto_hay,fecha)
	VALUES ('".$rutaDestino."',
	'".$nombre."',
	'".$desc."',
	'".$precio."',
	'".$enStock."',
	'".$fecha."')";
	
$res=mysql_query($sql,$conexion);

if($res)
	echo 'insercción con exito';
else
	echo 'no se pudo insertar';




?>