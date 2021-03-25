<?php
session_start();

if ($_SESSION['idU']){
	header("Location: bienvenido.php");
}
?>
<html>
 <head>
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<style>
		body {
		font-family: "Sofia";
		font-size: 22px;
		}
	</style>
 	<title>Ingreso</title>
 	<script src="js/jquery-3.3.1.min.js"></script>
 		<script>
 			function validar(){
 				var correo 		=$('#correo').val();
 				var pass		=$('#pass').val();
 				if(correo != '' && pass != ''){
 					$.ajax({
 						url		 : './funciones/validaCorreoLogin.php?correo='+correo+'&pass='+pass,
 						type	 : 'post',
 						dataType : 'text',
 						data	 : 'correo='+correo+'&pass='+pass,
 						success	 : function(res){
 							if (res == 1) {
								 window.location.href = "./bienvenido.php";
								 //window.location.href = "Base_administradores_lista.php";
							 } else {
 								$('#mensaje').html('Datos incorrectos');
 								setTimeout("$('#mensaje').html('')",5000);
 							}
 						},error: function(){
 								alert('Error al conectar al servidor...');
 						}
 					});//Termina ajax()
 				}
				 else{
					$('#mensaje').html('Faltan campos por llenar');
 								setTimeout("$('#mensaje').html('')",5000);
				 }
 			}
		</script>
 </head>
 <body>

	 <h1>Login</h1>
	 <br><hr>
	<form name="forma01" enctype="multipart/form-data">
		<div class="cuadroV">	
			<h1 class="rojo">Ingresa Datos</h1>

			<br>Usuario
			<input type="text" name="correo" id="correo" placeholder="Escribe tu usuario" value="" /><br>
			<br>Password
			<input type="text" name="pass" id="pass" placeholder="Escribe tu password"/><br>
			<br>
			
			<input class="btn" type="submit" value="Entrar" onclick="validar(); return false;" />
			<input type="hidden" id="id_sel" name="id_sel" value="<?php echo $id;?>" />
			<br>
			<div id="mensaje" class="error"></div><br>
		</div>
	</form>
	
 </body>

</html>