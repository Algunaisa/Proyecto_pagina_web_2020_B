<?php
include('encabezado.php');
?>
 	<title>Formulario request</title>
 		<script>
 			function verificaCodigo(){
 				var id		=$('#id_sel').val();
 				var codigo 	=$('#codigo').val();
 				if(codigo != ''){
 					$.ajax({
 						url		 : './funciones/verificaCodigo.php',
 						type	 : 'post',
 						dataType : 'text',
 						data	 : 'id='+id+'&codigo='+codigo,
 						success	 : function(res){
 							if (res > 0) {
 								$('#mensaje1').html('El codigo '+codigo+' ya esta registrado');
 								$('#codigo').val('');
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
				var codigo 		= document.forma01.codigo.value;
				var des			= document.forma01.descripcion.value;
				var costo 		= document.forma01.costo.value;
				var stock 		= document.forma01.stock.value; // 0, 1-2
				var foto		= document.forma01.foto.value;
				//alert(foto);
				if(nombre && codigo && des && costo && stock && foto != '') {
					document.forma01.method = 'post';
					document.forma01.action = 'Base_productos_salva.php';
					document.forma01.submit();
				}
				else{
					//alert('Error: Faltan campos por llenar');
					$('#mensaje2').html('Faltan campos por llenar');
 					setTimeout("$('#mensaje2').html('')",5000);
				}
			}
		</script>
	  	
 </head>
 <body>

	<h1>Alta de Productos</h1>
	<br>
 	<a href="Base_productos_lista.php"> Regresar Lista</a> <br>
 	<br>
	<form name="forma01" enctype="multipart/form-data">
		<div class="cuadroV">	
			<h1 class="rojo">Llena los campos</h1><br>

			<input id="foto_" type="file" name="foto" accept="image/png, .jpeg, .jpg" required /><br>
			<br>Nombre
			<input id="nombre_" type="text" name="nombre" placeholder="Escribe el nombre" required /><br>
			<br>Codigo
			<input id="codigo" type="text" name="codigo" placeholder="Escribe codigo" onBlur="verificaCodigo();" required />
			<div id="mensaje1" class="error"></div><br>
			<br>Descripcion
			<input id="descripcion" type="text" name="descripcion" placeholder="Escribe una descripcion"/><br>
			<br>Costo
			<input id="costo_" type="number" name="costo" value='0'/><br>
			<br>Stock
			<input id="stock_" type="number" name="stock" value='0'/><br><br>

			<input class="btn" type="submit" value="Salvar" onclick="validaDatos(); return false;" />
			<input type="hidden" id="id_sel" name="id_sel" value="0" />
			<div id="mensaje2" class="error"></div><br>
		</div>
	</form>
	
 </body>

</html>