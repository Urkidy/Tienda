<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>Confirmar Pedido
</h1>

<table width="288" border="0">
  <tr>
    <td colspan="5" align="center">LISTADO DE SUS COMPRAS</td>
  </tr>
  <tr>
    <td width="43" bgcolor="#0099FF">PRODUCTO</td>
    <td width="43" bgcolor="#0099FF">PRECIO</td>
    <td width="43" bgcolor="#0099FF">CANTIDAD</td>
    <td width="131" colspan="2" bgcolor="#0099FF">SUBTOTAL</td>
  </tr>
 <?php 
 session_start();
 $mi_carrito=$_SESSION['carrito'];
 	if(isset($mi_carrito)){
		$total=0;
		for($i=0;$i<count($mi_carrito);$i++){
			if($mi_carrito[$i]<>NULL)
			{
 ?>  
  <tr>
    <td bgcolor="#FFFFCC"><?php echo $mi_carrito[$i]['nombre']; ?></td>
    <td bgcolor="#FFFFCC"><?php echo $mi_carrito[$i]['precio']; ?></td>
    <td bgcolor="#FFFFCC"><?php echo $mi_carrito[$i]['cantidad']; ?></td>
    <?php 
	$subtotal=$mi_carrito[$i]['precio']*$mi_carrito[$i]['cantidad'];
	$total=$total+$subtotal;
	?>
    <td bgcolor="#FFFFCC"><?php echo $subtotal ?>
    </td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
  <?php
			}
  	}
}
  ?>
  
  <tr>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">TOTAL</td>
    <td colspan="2" bgcolor="#FFFFCC"><?php if (isset($total))echo $total ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC">&nbsp;</td>
    <td bgcolor="#FFFFCC"><form id="form1" name="form1" method="post" action="confirmarpedido.php">
      <input type="submit" name="confirmarPedido" id="confirmarPedido" value="Comprar" />
    </form></td>
    <td colspan="2" bgcolor="#FFFFCC">&nbsp;</td>
  </tr>
</table>
</body>
</html>