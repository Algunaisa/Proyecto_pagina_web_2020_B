<?php
//administradores_lista.php
require "./funciones/conecta.php";
$con = conecta();

$sql = "SELECT *
		FROM administradores_lista
		WHERE status = 1 AND eliminado = 0";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

//echo "<a href=\"Base_administradores_alta.php\">Nuevo administrador</a> <br><br>";

?> 
	<table border="1" width="100"> 
		<tr align="middle"> 
			<td colspan="6">Listado de Administradores</td>
		</tr>
		<tr align="middle"> 
			<td colspan="6">
				<a href="Base_administradores_alta.php">Nuevo administrador</a>
			</td>
		</tr>
		<tr align="middle">
			<td>ID</td>
			<td>Nombres</td>
			<td>Apellidos</td>
			<td>Correo</td>
			<td>Rol</td>
			<td>Elimina</td>
		</tr> 
<?php

for($i = 0; $i < $num; $i++){
	$id			= mysql_result($res, $i, "id");
	$nombre		= mysql_result($res, $i, "nombre");
	$apellidos	= mysql_result($res, $i, "apellidos");
	$correo		= mysql_result($res, $i, "correo");
	$rol		= mysql_result($res, $i, "rol");
	$rol_text 	= ($rol == 1) ? 'Gerente' : 'Ejecutivo';
	?> 
		<tr align="middle">
			<td>
				<?php echo $id; ?>
			</td>
			<td>
				<?php echo $nombre; ?>
			</td>
			<td>
				<?php echo $apellidos; ?>
			</td>
			<td>
				<?php echo $correo; ?>
			</td>
			<td>
				<?php echo $rol_text; ?>
			</td>
			<td>
				<a href="Base_administradores_elimina.php?id=$id">Click para eliminar</a> <br>
			</td>
		</tr> 
	<?php
	//echo "$id --- $nombre $apellidos ==> ";
	//echo "<a href=\"Base_administradores_elimina.php?id=$id\">Click para eliminar</a> <br>";
	//echo "<br>";
}

?> </table> <?php

?>