<?php
//Base_banners_edita.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();
$id  = $_REQUEST['id'];
$sql =  "SELECT *
		FROM banners
		WHERE id = $id";
$res = mysql_query($sql, $con);

$nombre 	= mysql_result($res, 0, "nombre");
$archivo	= mysql_result($res, 0, "archivo");

$ruta_img	= 'imagenes/banners/'.$archivo;
//echo $ruta_img;
?>

 	<title>Edita</title>
 		<script>
			function validaDatos(){
				var nombre 		= document.forma01.nombre.value;
				//var img			= document.forma01.img.value;
				if(nombre != '') {
					document.forma01.method = 'post';
					document.forma01.action = 'Base_banners_update.php';
					document.forma01.submit();
				}
				else{
					//alert('Error: Faltan campos por llenar');
					$('#mensaje').html('Faltan campos por llenar');
 					setTimeout("$('#mensaje').html('')",5000);
				}
			}

		</script>
 </head>
 <body>

	 <h1>Edicion de Administradores</h1>
	 <br>
 	<a href="Base_banners_lista.php">Regresar Lista</a> <br>
 	<br>
	<form name="forma01" enctype="multipart/form-data">
		<div class="cuadroV">	
			<h1 class="rojo">Edita los campos</h1><br>
			
			<a> <img src = "<?php echo $ruta_img;?>" width="350" height="200"/></a><br><br>
			<input id="img_" type="file" name="img" accept="image/png, .jpeg, .jpg, image/gif" required /><br>
			<br>Nombre
			<input id="nombre_" type="text" name="nombre" placeholder="Escribe el nombre" value="<?php echo $nombre;?>" /><br>
			<br>
			<input class="btn2" type="submit" value="Salvar" onclick="validaDatos(); return false;" /><br>
			<input type="hidden" id="id_sel" name="id_sel" value="<?php echo $id;?>" />
			<div id="mensaje" class="error"></div><br>
		</div>
	</form>
	
 </body>

</html>