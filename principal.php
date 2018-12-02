<?php include ('conexion.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<h1>Agencia de Viajes</h1>

<form id="form2" name="form1" method="post" action="usuarios/pidodatos.php">
  <input type="submit" name="login" id="login" value="Submit" />
</form>
<p>&nbsp;</p>
<p>
  <?php $a = verListadoProductos('comprar')?>  
</p>
<p><a href="carrito.php">Ver carrito</a></p>
</body>
</html>