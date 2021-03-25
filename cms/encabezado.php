<?php
session_start();

if (!$_SESSION['idU']){
	header("Location: index.php");
}

$nombre = $_SESSION['nombre'];
$id		= $_SESSION['idU'];
?>
<html>
    <head>
        <script src="js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="../estilos.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <style>
            body {
            font-family: "Sofia";
            font-size: 22px;
            }
        </style>
    </head>
    <body>
    
    
    <?php
    include('menu.php');
    ?>