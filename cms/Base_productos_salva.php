<?php
//producto_salva.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables

$nombre			= $_REQUEST['nombre'];
$codigo			= $_REQUEST['codigo'];
$descripcion	= $_REQUEST['descripcion'];
$costo			= 0.00;
$costo			= $_REQUEST['costo'];
$stock			= 0;
$stock			= $_REQUEST['stock'];
$archivo_n		= $_FILES['foto']['name'];

$archivo	= md5($archivo_n);

$fotoTmp 	= $_FILES['foto']['tmp_name'];
$urlNueva	='imagenes/productos/'.basename($archivo);//$id.'.jpg';

copy($fotoTmp, $urlNueva);


//Inserta en BD
$sql = "INSERT INTO productos VALUES
		(0,'$nombre','$codigo','$descripcion','$costo','$stock','$archivo_n','$archivo',1,0)";
$res = mysql_query($sql, $con);
//echo $res;
header("Location: Base_productos_lista.php");
?>