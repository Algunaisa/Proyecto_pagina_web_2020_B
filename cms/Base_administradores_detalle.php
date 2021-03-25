<?php
//Base_administradores_detalle.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();
$id  = $_REQUEST['id'];
$sql =  "SELECT *
		FROM administradores_lista
		WHERE id = $id";
$res = mysql_query($sql, $con);

$nombre 	= mysql_result($res, 0, "nombre");
$apellidos 	= mysql_result($res, 0, "apellidos");
$correo 	= mysql_result($res, 0, "correo");
$rol 		= mysql_result($res, 0, "rol");
$sta		= mysql_result($res, 0, "status");
$archivo_n 	= mysql_result($res, 0, "archivo_n");
$ruta_foto	= 'imagenes/fotos/'.$archivo_n;

$rol_txt 	= ($rol == 1) ? 'Gerente' : 'Ejecutivo';
$sta_txt 	= ($sta == 1) ? 'Activo' : 'Inactivo';
//echo $status;
?>
 	<title>Detalle</title>
 	<h1>Detalle Usuario</h1>
	<br>
	<a href="Base_administradores_lista.php"> Regresar lista</a> <br>
	<br>
 	
	<div class="cuadroV">
		<a> <img src = "<?php echo $ruta_foto;?>" width="200" height="200"/></a><br><br>
		<br>Nombre
		<?php echo "$nombre $apellidos"; ?><br>
		<br>Correo
		<?php echo "$correo"; ?><br>
		<br>Puesto
		<?php echo "$rol_txt";//2.-> ejecutivo no gerente ?><br>
		<br>Estado
		<?php echo "$sta_txt"; ?></li>
	</div>
	
 </body>

</html>