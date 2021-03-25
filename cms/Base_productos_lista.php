<?php
//Base_productos_lista.php

include('encabezado.php');

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

	<title>Lista Productos</title>
	<h1>Lista de Productos</h1>
	<br>
	<a href="Base_productos_alta.php"> Nuevo registro</a> <br>
	<br>
	<table id="admns" width="100"> 
		<tr> 
			<th>ID</td>
			<th>Nombre</td>
			<th>Codigo</td>
			<th colspan="3">Acciones</td>
		</tr>

<?php


for($i = 0; $i < $num; $i++){
	$id			= mysql_result($res, $i, "id");
	$nombre		= mysql_result($res, $i, "nombre");
	$codigo		= mysql_result($res, $i, "codigo");
	echo "<tr>";
	echo " <td>$id</td>";
	echo " <td>$nombre</td>";
	echo " <td>$codigo</td>";
	echo " <td><a href=\"Base_productos_detalle.php?id=$id\">Ver detalle</a></td>";
	echo " <td><a href=\"Base_productos_edita.php?id=$id\">Editar</a></td>";
	echo " <td><a href=\"Base_productos_elimina.php?id=$id\">Eliminar</a></td>";
	echo "<tr>";
}

?>
</table>
</body>
</html>