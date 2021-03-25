<?php
//Base_pedidos_lista.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();

$sql = "SELECT *
		FROM pedidos
		WHERE status = 1"; //cerrado
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

?>


<?php

?>

	<title>Pedidos</title>
	<h1>Lista de Pedidos Cerrados</h1>
	<table id="admns" width="500%"> 
		<tr> 
			<th>ID</td>
			<th></td>
		</tr>

<?php


for($i = 0; $i < $num; $i++){
	$id			= mysql_result($res, $i, "id");
	$nombre		= mysql_result($res, $i, "nombre");
	echo "<tr>";
	echo " <td>$id</td>";
	echo " <td><a href=\"Base_pedidos_detalle.php?id=$id\">Ver detalle</a></td>";
	echo "<tr>";
}

?>
</table>
</body>
</html>