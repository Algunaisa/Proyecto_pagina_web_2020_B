<?php
//Base_productos_edita.php

include('encabezado.php');

require "./funciones/conecta.php";
$con = conecta();
$id  = $_REQUEST['id'];
$sql =  "SELECT *
		FROM productos
		WHERE id = $id";
$res = mysql_query($sql, $con);

$nombre 		= mysql_result($res, 0, "nombre");
$codigo 		= mysql_result($res, 0, "codigo");
$descripcion	= mysql_result($res, 0, "descripcion");
$costo 			= mysql_result($res, 0, "costo");
$stock			= mysql_result($res, 0, "stock");
$sta			= mysql_result($res, 0, "status");
$archivo 		= mysql_result($res, 0, "archivo");
$ruta_foto		= 'imagenes/productos/'.$archivo;

$sta_txt 	= ($sta == 1) ? 'Activo' : 'Inactivo';
//echo $nombre;
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
				if(nombre && codigo && des && costo && stock != '') {
					document.forma01.method = 'post';
					document.forma01.action = 'Base_productos_update.php';
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

	 <h1>Edicion de productos</h1>
	 <br>
 	<a href="Base_productos_lista.php">Regresar Lista</a> <br>
 	<br>
	<form name="forma01" enctype="multipart/form-data">
		<div class="cuadroV">	
			<h1 class="rojo">Edita los campos</h1><br>
			
			<a> <img src = "<?php echo $ruta_foto;?>" width="200" height="200"/></a><br><br>
			<input id="foto_" type="file" name="foto" accept="image/png, .jpeg, .jpg, image/gif" required /><br>
			<br>Nombre
			<input id="nombre_" type="text" name="nombre" value="<?php echo $nombre;?>" /><br>
			<br>Codigo
			<input id="codigo" type="text" name="codigo" value="<?php echo $codigo;?>" onBlur="verificaCodigo();"/>
			<div id="mensaje1" class="error"></div><br>
			<br>Descripcion:
			<input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>"/><br>
			<br>Costo:
			<input type="number" name="costo" id="costo" value="<?php echo $costo;?>"/><br>
			<br>Stock:
			<input type="number" name="stock" id="stock" value="<?php echo $stock;?>"/><br>
			
			<input class="btn" type="submit" value="Salvar" onclick="validaDatos(); return false;" /><br>
			<input type="hidden" id="id_sel" name="id_sel" value="<?php echo $id;?>" />
			<div id="mensaje2" class="error"></div><br>
		</div>
	</form>
	
 </body>

</html>