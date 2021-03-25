<?php
//Base_productos_detalle.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();
$id  = $_REQUEST['id'];
$sql =  "SELECT *
		FROM productos
		WHERE id = $id";
$res = mysql_query($sql, $con);

$nombre 		= mysql_result($res, 0, "nombre");
$codigo 		= mysql_result($res, 0, "codigo");
$descripcion	= mysql_result($res, 0, "descripcion");
$costo 			= mysql_result($res, 0, "costo");
$stock			= mysql_result($res, 0, "stock");
$sta			= mysql_result($res, 0, "status");
$archivo 		= mysql_result($res, 0, "archivo");
$ruta_foto		= 'imagenes/productos/'.$archivo;

$sta_txt 	= ($sta == 1) ? 'Activo' : 'Inactivo';
//echo $status;
?>
 	<title>Detalle</title>
 	<h1>Detalle productos</h1>
	<br>
	<a href="Base_productos_lista.php"> Regresar lista</a> <br>
	<br>
 	
	<div class="cuadroV">
	<br><a> <img src = "<?php echo $ruta_foto;?>" width="200" height="200"/></a><br>
		<br>Nombre:
		<?php echo "$nombre"; ?><br>
		<br>Codigo:
		<?php echo "$codigo"; ?><br>
		<br>Descripcion:
		<?php echo "$descripcion";?><br>
		<br>Costo:
		<?php echo "$costo";?><br>
		<br>Stock:
		<?php echo "$stock";?><br>
		<br>Estado:
		<?php echo "$sta_txt"; ?></li>
	</div>
 </body>
</html>