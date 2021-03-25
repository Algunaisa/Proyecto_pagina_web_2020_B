<?php
//Base_administradores_lista.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();

$sql = "SELECT *
		FROM administradores_lista
		WHERE status = 1 AND eliminado = 0";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

?>


<?php

?>	

	<title>Lista Admin</title>
	<h1>Lista de Administradores</h1>
	<br>
	<a href="Base_administradores_alta.php"> Nuevo registro</a> <br>
	<br>
	<table id="admns" width="100"> 
		<tr> 
			<th>ID</td>
			<th>Nombre</td>
			<th>Apellidos</td>
			<th>Correo</td>
			<th>Rol</td>
			<th colspan="3">Acciones</td>
		</tr>

<?php


for($i = 0; $i < $num; $i++){
	$id			= mysql_result($res, $i, "id");
	$nombre		= mysql_result($res, $i, "nombre");
	$apellidos	= mysql_result($res, $i, "apellidos");
	$correo		= mysql_result($res, $i, "correo");
	$rol		= mysql_result($res, $i, "rol");
	$rol_text 	= ($rol == 1) ? 'Gerente' : 'Ejecutivo';
	echo "<tr>";
	echo " <td>$id</td>";
	echo " <td>$nombre</td>";
	echo " <td>$apellidos</td>";
	echo " <td>$correo</td>";
	echo " <td>$rol_text</td>";
	echo " <td><a href=\"Base_administradores_detalle.php?id=$id\">Ver detalle</a></td>";
	echo " <td><a href=\"Base_administradores_edita.php?id=$id\">Editar</a></td>";
	echo " <td><a href=\"Base_administradores_elimina.php?id=$id\">Eliminar</a></td>";
	echo "<tr>";
}

?>
</table>
</body>
</html>