<?php
//administradores_salva.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables

$nombre			= $_REQUEST['nombre'];
$apellidos		= $_REQUEST['apellidos'];
$correo			= $_REQUEST['correo'];
$pass			= $_REQUEST['pass'];
$rol			= $_REQUEST['rol'];
$archivo_n		= $_FILES['foto']['name'];//
$archivo 		= '';

$pass		= md5($pass);//ENCRIPTAR contraseña

$fotoTmp 	= $_FILES['foto']['tmp_name'];
$urlNueva	='imagenes/fotos/'.basename($archivo_n);//$id.'.jpg';

copy($fotoTmp, $urlNueva);
$archivo	= md5($archivo_n);

//Inserta en BD
$sql = "INSERT INTO administradores_lista VALUES
		(0,'$nombre','$apellidos','$correo','$pass',$rol,'$archivo_n','$archivo',1,0)";
$res = mysql_query($sql, $con);

header("Location: Base_administradores_lista.php");
?>