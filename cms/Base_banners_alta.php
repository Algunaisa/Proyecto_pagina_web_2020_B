<?php
include('encabezado.php');
?>
 	<title>Alta banners</title>
 		<script>
 			function validaDatos(){
				var nombre 		= document.forma01.nombre.value;
				var img		= document.forma01.img.value;
				//alert(foto);
				if(nombre && img != '') {
					document.forma01.method = 'post';
					document.forma01.action = 'Base_banners_salva.php';
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

	<h1>Alta de banners</h1>
	<br>
 	<a href="Base_banners_lista.php"> Regresar Lista</a> <br>
 	<br>
	<form name="forma01" enctype="multipart/form-data">
		<div class="cuadroV">	
			<h1 class="rojo">Llena los campos</h1><br>

			<input id="img_" type="file" name="img" accept="image/png, .jpeg, .jpg" required /><br>
			<br>Nombre
			<input id="nombre_" type="text" name="nombre" placeholder="Escribe el nombre" required /><br><br>
			
			<input class="btn" type="submit" value="Salvar" onclick="validaDatos(); return false;" />
			<input type="hidden" id="id_sel" name="id_sel" value="0" />
			<div id="mensaje" class="error"></div><br>
		</div>
	</form>
	
 </body>

</html>