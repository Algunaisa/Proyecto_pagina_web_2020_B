<?php
include('encabezado.php');
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
				var correo 		= document.forma01.correo.value;
				var apellidos	= document.forma01.apellidos.value;
				var pass 		= document.forma01.pass.value;
				var rol 		= document.forma01.rol.value; // 0, 1-2
				var foto		= document.forma01.foto.value;
				//alert(foto);
				if(nombre && correo && apellidos && pass && rol && foto != '') {
					document.forma01.method = 'post';
					document.forma01.action = 'Base_administradores_salva.php';
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

	<h1>Alta de Administradores</h1>
	<br>
 	<a href="Base_administradores_lista.php"> Regresar Lista</a> <br>
 	<br>
	<form name="forma01" enctype="multipart/form-data">
		<div class="cuadroV">	
			<h1 class="rojo">Llena los campos</h1><br>

			<input id="foto_" type="file" name="foto" accept="image/png, .jpeg, .jpg" required /><br>
			<br>Nombre
			<input id="nombre_" type="text" name="nombre" placeholder="Escribe tu nombre" required /><br>
			<br>Apellido
			<input id="apellidos_" type="text" name="apellidos" placeholder="Escribe tus apellidos" required /><br>
			<br>Correo
			<input id="correo_" type="text" name="correo" placeholder="Escribe tu correo" onBlur="verificaCorreo();" />
			<div id="mensaje1" class="error"></div><br>
			<br>Password
			<input id="pass_" type="text" name="pass" placeholder="Escribe tu password"/><br><br>
			<br>Puesto
			<select name="rol" id="rol">
				<option value="0">Selecciona</option>
				<option value="1">Gerente</option>
				<option value="2">Ejecutivo</option>			
			</select><br><br>
			<input class="btn" type="submit" value="Salvar" onclick="validaDatos(); return false;" />
			<input type="hidden" id="id_sel" name="id_sel" value="0" />
			<div id="mensaje2" class="error"></div><br>
		</div>
	</form>
	
 </body>

</html>