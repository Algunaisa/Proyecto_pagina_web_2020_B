<?php
//administradores_elimina.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables
$id = $_REQUEST['id'];

if ($id > 0){
	//$sql = "DELETE FROM administradores_lista WHERE id = $id";
	$sql = "UPDATE administradores_lista
			SET eliminado = 1 WHERE id = $id";
	$res = mysql_query($sql, $con);
}

header("Location: Base_administradores_lista.php");
?>