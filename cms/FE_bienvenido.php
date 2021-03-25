<?php
//Base_productos_lista.php

include('FE_encabezado.php');

require "./funciones/conecta.php";
$con = conecta();

$sql = "SELECT *
		FROM banners
		WHERE status = 1 AND eliminado = 0";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);
$id_banners = rand(1, $num);
$archivo = mysql_result($res, $id_banners - 1, "archivo");
$ruta_banner	= 'imagenes/banners/'.$archivo;

/*************************************************/

$sql2 = "SELECT *
		FROM productos
		WHERE status = 1 
		AND eliminado = 0
		AND stock != 0";
$res2 = mysql_query($sql2, $con);
$num2 = mysql_num_rows($res2);
$id_productos = rand(0, $num2-3);
//for($i = 0; $i < $id_productos; $i++)
	//$id = mysql_result($res2, $i, "id");

?>
	<title>Amigurumis</title>
	
 	<h1>Bienvenido </h1>
	
	<div class="horizontal">

		<?php
		for($i = $id_productos; $i < $id_productos+3; $i++){
			$id_p 		= mysql_result($res2, $i, "id");
			$nombre 	= mysql_result($res2, $i, "nombre");
			$codigo 	= mysql_result($res2, $i, "codigo");
			$costo 		= mysql_result($res2, $i, "costo");
			$archivo 	= mysql_result($res2, $i, "archivo");
			$ruta_img	= 'imagenes/productos/'.$archivo;
			?>
			<div class="cuadroV2">
				<br>
				<img src = "<?php echo $ruta_img;?>" width="150" height="150"/>
				<br>
				<?php
				echo "<a href=\"FE_productos_detalle.php?id=$id_p\">$nombre</a>";
				echo "<br>";
				echo "Codigo: $codigo <br>";
				echo "$$costo <br>";
				echo "<a class=\"btn2\" href=\"FE_carrito.php?id=$id_p\">Comprar</a>";
				?>
			</div><br>
			<?php
		}

		?>

	</div>
	<br>
	<img src = "<?php echo $ruta_banner;?>" width="600" height="200"/></a>

<?php
include('FE_pie.php');
?>