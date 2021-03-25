<?php
//administradores_update.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables
$id				= $_REQUEST['id_sel'];
$nombre			= $_REQUEST['nombre'];
$apellidos		= $_REQUEST['apellidos'];
$correo			= $_REQUEST['correo'];
$pass			= $_REQUEST['pass'];
$rol			= $_REQUEST['rol'];
$archivo_n		= $_FILES['foto']['name'];//$_REQUEST['foto'];
$archivo 		= '';
$tx_p			= '';
$tx_a			= '';

if ($pass != ''){
	$pass		= md5($pass);//ENCRIPTAR contraseña
	$tx_p		= ", pass = '$pass'";
}

if ($archivo_n != ''){
	$fotoTmp 	= $_FILES['foto']['tmp_name'];
	$urlNueva	='imagenes/fotos/'.basename($archivo_n);//$id.'.jpg';
	$fotoType	= strtolower(pathinfo($urlNueva,PATHINFO_EXTENSION)); //$_FILES['foto']['type'];
	
	if($fotoType == "jpg" || $fotoType == "png" || $fotoType == "jpeg" || $fotoType == "gif" )
	{
		//move_uploaded_file($fotoTmp, $urlNueva);
		
		copy($fotoTmp, $urlNueva);
		$archivo	= md5($archivo_n);
		$tx_a		= ", archivo_n = '$archivo_n', archivo = '$archivo'";
	}
}


$sql = "UPDATE administradores_lista 
		SET nombre = '$nombre', apellidos = '$apellidos',
		correo = '$correo', rol = $rol $tx_p $tx_a
		WHERE id = $id";
$res = mysql_query($sql, $con);

header("Location: Base_administradores_lista.php");
?>