<?php
//FE_productos_lista.php

include('FE_encabezado.php');

require "./funciones/conecta.php";
$con = conecta();

$sql = "SELECT *
		FROM productos
		WHERE status = 1 AND eliminado = 0";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

?>


<?php

?>

	<title>Productos</title>
	<h1>Catalogo</h1>

<?php


for($j = 0; $j < $num; $j+=3){
	echo "<div class=\"horizontal\">";
	for($i = $j; $i < $j+3; $i++){
		if($i == $num) break;
		echo "<div class=\"cuadroV2\">";
		$id			= mysql_result($res, $i, "id");
		$nombre		= mysql_result($res, $i, "nombre");
		$codigo		= mysql_result($res, $i, "codigo");
		$costo		= mysql_result($res, $i, "costo");
		$stock		= mysql_result($res, $i, "stock");
		$archivo	= mysql_result($res, $i, "archivo");
		$ruta_img	= 'imagenes/productos/'.$archivo;
		echo "<br>";
		echo "<img src = \"$ruta_img\" width=\"150\" height=\"150\"/><br>";
		echo " <a href=\"FE_productos_detalle.php?id=$id\">$nombre</a><br>";
		echo " $codigo<br>";
		echo " $$costo<br>";
		if($stock > 0)
			echo " <a class=\"btn2\" href=\"FE_carrito.php?id=$id\">Compra</a>";
		echo "</div>";
	}
	echo "</div>";
}

?>
</table>
<?php
include('FE_pie.php');
?>