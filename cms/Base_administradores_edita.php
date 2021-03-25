<?php
//Base_administradores_edita.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();
$id  = $_REQUEST['id'];
$sql =  "SELECT *
		FROM administradores_lista
		WHERE id = $id";
$res = mysql_query($sql, $con);

$nombre 	= mysql_result($res, 0, "nombre");
$apellidos 	= mysql_result($res, 0, "apellidos");
$correo 	= mysql_result($res, 0, "correo");
$rol 		= mysql_result($res, 0, "rol");
$archivo_n 	= mysql_result($res, 0, "archivo_n");
$archivo	= mysql_result($res, 0, "archivo");

$ruta_foto	= 'imagenes/fotos/'.$archivo_n;
//echo $nombre;
?>

 	<title>Formulario request</title>
 		<script>
 			function verificaCorreo(){
 				var id		=$('#id_sel').val();
 				var correo 	=$('#correo').val();
 				if(correo != ''){
 					$.ajax({
 						url		 : './funciones/verificaCorreo.php',
 						type	 : 'post',
 						dataType : 'text',
 						data	 : 'id='+id+'&correo='+correo,
 						success	 : function(res){
 							if (res > 0) {
 								$('#mensaje1').html('El correo '+correo+' ya esta registrado');
 								$('#correo').val('');
 								setTimeout("$('#mensaje1').html('')",5000);
 							}
 						},error: function(){
 								alert('Error al conectar al servidor...');
 						}
 					});
 				}
 			}

			function validaDatos(){
				var nombre 		= document.forma01.nombre.value;
				var apellidos	= document.forma01.apellidos.value;
				var correo 		= document.forma01.correo.value;
				var rol 		= document.forma01.rol.value; // 0, 1-2
				if(nombre && correo && apellidos && rol > 0) {
					document.forma01.method = 'post';
					document.forma01.action = 'Base_administradores_update.php';
					document.forma01.submit();
				}
				else{
					//alert('Error: Faltan campos por llenar');
					$('#mensaje2').html('Faltan campos por llenar');
 					setTimeout("$('#mensaje1').html('')",5000);
				}
			}

		</script>
 </head>
 <body>

	 <h1>Edicion de Administradores</h1>
	 <br>
 	<a href="Base_administradores_lista.php">Regresar Lista</a> <br>
 	<br>
	<form name="forma01" enctype="multipart/form-data">
		<div class="cuadroV">	
			<h1 class="rojo">Edita los campos</h1><br>
			
			<a> <img src = "<?php echo $ruta_foto;?>" width="200" height="200"/></a><br><br>
			<input id="foto_" type="file" name="foto" accept="image/png, .jpeg, .jpg, image/gif" required /><br>
			<br>Nombre
			<input id="nombre_" type="text" name="nombre" placeholder="Escribe tu nombre" value="<?php echo $nombre;?>" /><br>
			<br>Apellidos
			<input id="apellidos_" type="text" name="apellidos" placeholder="Escribe tus apellidos" value="<?php echo $apellidos;?>" /><br>
			<br>Correo
			<input type="text" name="correo" id="correo" placeholder="Escribe tu correo" onBlur="verificaCorreo();" value="<?php echo $correo;?>" /><br>
			<div id="mensaje1" class="error"></div><br>
			<br>Password
			<input type="text" name="pasw" id="pass" placeholder="Escribe tu password"/><br>
			<br>Puesto
			<select name="rol" id="rol">
				<option value="0">Selecciona</option>
				<option value="1" <?php if ($rol == 1) echo 'selected'; ?> >Gerente</option>
				<option value="2" <?php if ($rol == 2) echo 'selected'; ?> >Ejecutivo</option>			
			</select><br><br>
			<input class="btn2" type="submit" value="Salvar" onclick="validaDatos(); return false;" /><br>
			<input type="hidden" id="id_sel" name="id_sel" value="<?php echo $id;?>" />
			<div id="mensaje2" class="error"></div><br>
		</div>
	</form>
	
 </body>

</html>