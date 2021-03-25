<?php
//Base_banners_salva.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables

$nombre			= $_REQUEST['nombre'];
$archivo		= $_FILES['img']['name'];

$pass		= md5($pass);//ENCRIPTAR contraseña

$img_n		= md5($archivo);

$img_tmp 	= $_FILES['img']['tmp_name'];
$urlNueva	='imagenes/banners/'.basename($img_n);

copy($img_tmp, $urlNueva);

//move_uploaded_file($img_tmp, $urlNueva)

//Inserta en BD
$sql = "INSERT INTO banners VALUES
		(0,'$nombre','$img_n',1,0)";
$res = mysql_query($sql, $con);

header("Location: Base_banners_lista.php");
?>