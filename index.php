<?
 header("Cache-Control: no-cache");
 header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Estadisticas de los juegos</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/reloader.js"></script>
		<script type="text/javascript" src="js/ajaxpag.js"></script>
		<script type="text/javascript" src="js/notify.js"></script>

		
		<link rel="stylesheet" href="css/loading.css" type="text/css" />
		<link rel="stylesheet" href="css/main.css" type="text/css" />

		<script type="text/javascript">
			var msgType = ['warning','success','error','info'];
			$(function() { 
				hideDiv( $("#stat"),'stat' );
				
				// Notificaciones (personalizar a gusto si se lo desea)
				/*var noticia = aleatorio(1,3);
				switch(noticia){
					case 1: showMessage('success','¿Como puedo jugar?','Si quieres jugar a este juego, solo debes entrar al canal ##wikijuegos de <a href="http://freenode.net">FreeNode</a>, escribir <b>!alta</b> y despues hacer un montón de flood escribiendo <b>!dados</b><br />');break;
					case 2: showMessage('info','Torneo de flood de navidad','Se realizará un torneo de flood en el canal ##wikijuegos de freenode los dias 21, 22, 23 y 24 de diciembre. El primero en llegar a las 500000 lineas de flood (se cuentan las hechas anteriormente) ganara un fabuloso premio.');break;
				}*/
			})
			
			function aleatorio(inferior,superior){ 
				numPosibilidades = superior - inferior 
				aleat = Math.random() * numPosibilidades 
				aleat = Math.floor(aleat) 
				return parseInt(inferior) + aleat 
			} 
		</script>
	</head>
	<?php flush(); ?>
	<body>
		<div id="warning" class="warning message"><h3 id="warning_ttl"></h3><p id="warning_msg"></p></div>
		<div id="success" class="success message"><h3 id="success_ttl"></h3><p id="success_msg"></p></div>
		<div id="info" class="info message"><h3 id="info_ttl"></h3><p id="info_msg"></p></div>
		<div id="error" class="error message"><h3 id="error_ttl"></h3><p id="error_msg"></p></div>
		<div class="container">
			<h1>Estadísticas generales de los juegos de CoBot</h1>
			<div id="rank"><?php include("inc/rank.php");?></div>
			
			<div id="stat"></div>
			<div id="loader" style="display:none;"><?php include("inc/loader.php");?></div>
		</div>
		<div class="footer">Copyright &copy; <a href="ircsuga.tk">MK Design</a> (Por Mr. X) 2012</div>

	</body>
</html>
