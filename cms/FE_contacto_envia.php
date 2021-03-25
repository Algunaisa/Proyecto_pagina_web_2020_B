<?php
//FE_contacto_envia.php
require "./funciones/conecta.php";
$con = conecta();

//Recibe variables
$nombre			= $_REQUEST['nombre'];
$apellido		= $_REQUEST['apellido'];
$correo			= $_REQUEST['correo'];
$mensaje		= $_REQUEST['mensaje'];


/*ho $nombre;
echo $apellido;
echo $correo;*/
echo $mensaje;
//header("Location: FE_bienvenido.php");
?>