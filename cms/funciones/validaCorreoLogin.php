<?php
//validaCorreoLogin.php

session_start();

require "conecta.php";
$con = conecta();

//Recibe variables
$correo		= $_REQUEST['correo'];
$pass		= $_REQUEST['pass'];
$pass		= md5($pass);

$sql	= "SELECT * FROM administradores_lista
			WHERE correo = '$correo' AND pass = '$pass' 
			AND status = 1 AND eliminado = 0";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);
// si encontro algo
if($num){
	$idU	= mysql_result($res, 0, "id");
	$nombre	= mysql_result($res, 0, "nombre").' '.mysql_result($res, 0, "apellidos");
	$correo	= mysql_result($res, 0, "correo");

	$_SESSION['idU']		= $idU;
	$_SESSION['nombre']		= $nombre;
	$_SESSION['correo']		= $correo;
}

echo $num;
//header("Location: Base_administradores_lista.php");
?>