<?php
include('FE_encabezado.php');
?>
 	<title>Contacto</title>
 		<script>
 			function validaDatos(){
				var nombre 		= document.forma01.nombre.value;
				var apellidos	= document.forma01.apellidos.value;
				var correo		= document.forma01.correo.value;
				var mensaje		= document.forma01.mensaje.value;
				//alert(foto);
				if(nombre && apellidos && correo && mensaje != '') {
					document.forma01.method = 'post';
					document.forma01.action = 'FE_contacto_envia.php';
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

	<h1>Contactanos!</h1>
	<form name="forma01" enctype="multipart/form-data">
		<div class="cuadroV">	
			<h1 class="rojo">Formulario de Contacto</h1>
			<br>Nombre
			<input id="nombre_" type="text" name="nombre" placeholder="Escribe tu nombre" required /><br>
			<br>Apellidos
			<input id="apellidos_" type="text" name="apellidos" placeholder="Escribe tus apellidos" required /><br>
			<br>Correo
			<input id="correo_" type="text" name="correo" placeholder="Escribe tu correo" required /><br>
			
			<br>Mensaje
			<textarea id="mensaje_" rows="5" name="mensaje"  required> </textarea><br>
			<br>
			<input class="btn2" type="submit" value="Enviar" onclick="validaDatos(); return false;" />
			<input type="hidden" id="id_sel" name="id_sel" value="0" />
			<div id="mensaje" class="error"></div><br>
		</div>
	</form>
	
<?php
include('FE_pie.php');
?>