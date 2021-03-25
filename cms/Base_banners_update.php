<?php
//administradores_update.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables
$id				= $_REQUEST['id_sel'];
$nombre			= $_REQUEST['nombre'];
$archivo		= $_FILES['img']['name'];//$_REQUEST['foto'];
$tx_a			= '';

if ($archivo != ''){
	$img_n		= md5($archivo);
	$img_tmp 	= $_FILES['img']['tmp_name'];
	$urlNueva	='imagenes/banners/'.basename($img_n);//$id.'.jpg';
	if(move_uploaded_file($img_tmp, $urlNueva)){
		$tx_a	= ", archivo = '$img_n'";
	}
	
}

$sql = "UPDATE banners 
		SET nombre = '$nombre' $tx_a
		WHERE id = $id";
$res = mysql_query($sql, $con);

header("Location: Base_banners_lista.php");
?>