	/*
	 * reloader.js 
	 *  - Recarga el ranking de usuarios
	 *   - Nota: Recordar optimizar rank.php
	 */  
	 
	var RequestObject = false;

	window.setInterval("upd_rank()", 4000);
	if (window.XMLHttpRequest) RequestObject = new XMLHttpRequest();
	if (window.ActiveXObject) RequestObject = new ActiveXObject("Microsoft.XMLHTTP");

	function ReqChange() { 
		if (RequestObject.readyState==4) {
			if (RequestObject.responseText.indexOf('invalid') == -1) {
				if(RequestObject.responseText){
					hideMessage('error');
					document.getElementById("rank").innerHTML = RequestObject.responseText;
				}else{					
					showMessage('error','No se pudo conectar al servidor','Esto se puede deber a un problema en su conexión o a un problema temporal del servidor.');
				}
			} else { 
				showMessage('error','No se pudo conectar al servidor','Esto se puede deber a un problema en su conexión o a un problema temporal del servidor.');
			}
		}
	}

	function llamadaAjax() {
		RequestObject.open("GET", "inc/rank.php?"+Math.random() , true);
		RequestObject.onreadystatechange = ReqChange; 
		RequestObject.send(null);
	}

	function upd_rank() {
		llamadaAjax();
	}
