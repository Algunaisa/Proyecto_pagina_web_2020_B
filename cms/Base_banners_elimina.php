<?php
//administradores_elimina.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables
$id = $_REQUEST['id'];

if ($id > 0){
	$sql = "UPDATE banners
			SET eliminado = 1 WHERE id = $id";
	$res = mysql_query($sql, $con);
}

header("Location: Base_banners_lista.php");
?>