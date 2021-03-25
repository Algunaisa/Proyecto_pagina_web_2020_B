<?php
//productos_update.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables
$id				= $_REQUEST['id_sel'];
$nombre			= $_REQUEST['nombre'];
$codigo			= $_REQUEST['codigo'];
$descripcion	= $_REQUEST['descripcion'];
$costo			= 0.00;
$costo			= $_REQUEST['costo'];
$stock			= 0;
$stock			= $_REQUEST['stock'];
$archivo_n		= $_FILES['foto']['name'];
$tx_a			= '';

if ($archivo_n != ''){
	$archivo		= md5($archivo_n);
	$img_tmp 	= $_FILES['foto']['tmp_name'];
	$urlNueva	='imagenes/productos/'.basename($archivo);//$id.'.jpg';
	if(move_uploaded_file($img_tmp, $urlNueva)){
		$tx_a	= ", archivo_n = '$archivo_n', archivo = '$archivo'";
	}
	
}


$sql = "UPDATE productos
		SET nombre = '$nombre', codigo = '$codigo',
		descripcion = '$descripcion', costo = '$costo',
		stock = '$stock'
		$tx_a
		WHERE id = $id";
$res = mysql_query($sql, $con);
//echo $res;
header("Location: Base_productos_lista.php");
?>