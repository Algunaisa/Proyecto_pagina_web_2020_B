<?php
//Base_pedidos_detalle.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();
$id  = $_REQUEST['id'];
$sql =  "SELECT *
		FROM pedidos
		WHERE id = $id";
$res = mysql_query($sql, $con);

$fecha 		= mysql_result($res, 0, "fecha");
$user		= mysql_result($res, 0, "usuario");
$status 	= mysql_result($res, 0, "status");

$sta_txt 	= ($sta == 1) ? 'Activo' : 'Inactivo';

//-------------------------------------------------
$sql2 =  "SELECT *
		FROM pedidos_productos
		WHERE id_pedido = $id";
$res2 = mysql_query($sql2, $con);
$num = mysql_num_rows($res2);
//echo $status;
//-------------------------------------------------
$suma = 0;
?>
 	<title>Detalle</title>
 	<h1>Detalle del pedido</h1>
	<br>
	<a href="Base_pedidos_lista.php"> Regresar lista</a> <br>
	<br>
 	
	<div class="cuadroV"><br>
		<h1 class="rojo">Pedido #<?php echo $id;?></h1>
		<br>Fecha:
		<?php echo " $fecha"; ?>
		<br>Usuario:
		<?php echo " $user"; ?>
		<hr>
		<?php

		for($i = 0; $i < $num; $i++){
			$id_producto	= mysql_result($res2, $i, "id_producto");
			$cantidad		= mysql_result($res2, $i, "cantidad");
			$precio			= mysql_result($res2, $i, "precio");

			$sql3 =  "SELECT *
					FROM productos
					WHERE id = $id_producto";
			$res3 = mysql_query($sql3, $con);

			$nombre_producto = mysql_result($res3, 0, "nombre");

			echo "Producto: $nombre_producto<br>";
			echo "Cantidad: $cantidad<br>";
			echo "Precio: $$precio<br>";
			echo "<hr>";
			$suma+=$precio;
		}
		echo "<hr>";
		echo "Total: $$suma<br>";
		?>

		<hr>

		
	</div>
	
 </body>

</html>