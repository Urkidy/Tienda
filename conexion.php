<?php 
$conexion=mysql_connect('localhost','root','') or die ('No hay conexión a la base de datos');
$db=mysql_select_db('tienda',$conexion)or die ('No existe la base de datos.');

function ActualizarStock($id,$can){
	
	$consulta = "SELECT * FROM productos WHERE id=$id";
	$res = mysql_query($consulta);
	$fila = mysql_query_array($res);
	$enStock = $fila['cuanto hay']; //obtengo la catidad del stock
	//le paso el id del producto y la cantidad comprada
	//Escribo en mi base de datos
	if (isset($id)){
		$can = $enStock-$can;
		$cad = "UPDATE productos SET cuanto_hay='$can' WHERE id=$id";
		mysql_query($cad);
		//echo $cad;
		echo '<p>Registro Actualizado!</p>';
		}
	}
	
?>
<?php function verListadoProductos($modo){?>

<h1>Agencia de Viajes</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>BUSCAR:</td>
      <td><label for="buscar"></label>
      <input type="text" name="buscar" id="buscar" /></td>
      <td><input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" /></form></td>
    </tr>
    <tr>
      <td colspan="8" align="center">LISTADO DE PRODUCTOS</td>
    </tr>
    <tr>
      <td bgcolor="#0099FF">ID</td>
      <td bgcolor="#0099FF">IMAGEN</td>
      <td bgcolor="#0099FF">NOMBRE</td>
      <td bgcolor="#0099FF">DECRIPCION</td>
      <td bgcolor="#0099FF">PRECIO</td>
      <td bgcolor="#0099FF">ENSTOCK</td>
      <td bgcolor="#0099FF">FECHA</td>
      <td bgcolor="#0099FF">AGREGAR</td>
    </tr>
    
<?php 
	$consulta=mysql_query("SELECT * FROM productos");
	if(isset($_POST['buscar'])){
		$consulta=mysql_query("SELECT * FROM productos WHERE nombre LIKE '%".$_POST['buscar']."%'");
	};


	while($filas=mysql_fetch_array($consulta)){
		$id=$filas['id'];
		$imagen=$filas['imagen'];
		$nombre=$filas['nombre'];
		$desc=$filas['descripcion'];
		$precio=$filas['precio'];
		$enStock=$filas['cuanto_hay'];
		$fecha=$filas['fecha'];
				
?>

    <tr>
     <?php if ($modo<>'edicion'){?> 
      <td bgcolor="#FFFFCC"><?php echo $id ?></td>
      <td bgcolor="#FFFFCC"><img src="<?php echo $imagen; ?>" width="70" height="70"><br></td>
      <td bgcolor="#FFFFCC"><?php echo $nombre ?></td>
      <td bgcolor="#FFFFCC"><?php echo $desc ?></td>
      <td bgcolor="#FFFFCC"><?php echo $precio ?></td>
      <td bgcolor="#FFFFCC"><?php echo $enStock ?></td>
      <td bgcolor="#FFFFCC"><?php echo $fecha ?></td>
      <td bgcolor="#FFFFCC">
      <form action="carrito/carrito.php" method="post" name="compra">
      	<input name="id_txt" type="hidden" value="<?php echo $id ?>" />
        <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
        <input name="precio" type="hidden" value="<?php echo $precio ?>" />
        <input name="cantidad" type="hidden" value="1" />
      	<input name="Comprar" type="submit" value="Comprar" />
      	</form>
        <?php }else{?>
        <td bgcolor="#FFFFCC"><?php echo $id ?></td>
      <td bgcolor="#FFFFCC"><img src="<?php echo '../'.$imagen; ?>" width="70" height="70"><br></td>
      <td bgcolor="#FFFFCC"><?php echo $nombre ?></td>
      <td bgcolor="#FFFFCC"><?php echo $desc ?></td>
      <td bgcolor="#FFFFCC"><?php echo $precio ?></td>
      <td bgcolor="#FFFFCC"><?php echo $enStock ?></td>
      <td bgcolor="#FFFFCC"><?php echo $fecha ?></td>
      <td bgcolor="#FFFFCC">
      <form action="editar.php" method="post" name="compra">
      	<input name="id_txt" type="hidden" value="<?php echo $id ?>" />
        <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
        <input name="precio" type="hidden" value="<?php echo $precio ?>" />
        <input name="cantidad" type="hidden" value="1" />
      	<input name="Comprar" type="submit" value="Editar" />
      	</form>
        <?php }?>
      </td>
    </tr>
<?php }?>
    
  </table>
<?php }?>
?>