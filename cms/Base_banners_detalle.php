<?php
//Base_administradores_detalle.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();
$id  = $_REQUEST['id'];
$sql =  "SELECT *
		FROM banners
		WHERE id = $id";
$res = mysql_query($sql, $con);

$nombre 	= mysql_result($res, 0, "nombre");
$sta		= mysql_result($res, 0, "status");
$archivo 	= mysql_result($res, 0, "archivo");
$ruta_img	= 'imagenes/banners/'.$archivo;

$sta_txt 	= ($sta == 1) ? 'Activo' : 'Inactivo';
//echo $status;
?>
 	<title>Detalle</title>
 	<h1>Detalle Banners</h1>
	<br>
	<a href="Base_banners_lista.php"> Regresar lista</a> <br>
	<br>
 	
	<div class="cuadroV">
		<a> <img src = "<?php echo $ruta_img;?>" width="350" height="200"/></a><br><br>
		<br>Nombre:
		<?php echo " $nombre"; ?><br>
		<br>Estado:
		<?php echo " $sta_txt"; ?></li>
	</div>
	
 </body>

</html>