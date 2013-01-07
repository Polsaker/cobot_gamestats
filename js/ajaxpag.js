function mostrarDiv(div,divid){
	divv = document.getElementById(divid);
	divv.style.display='';
	div.show("slide", { direction: "right" }, 1500);
}
function ocultarDiv(div){
	div.hide("slide", { direction: "right" }, 1500);
}
function hideDiv(div,divid){
	div.hide("slide", { direction: "right" }, 0);

	divel = document.getElementById(divid);
	divel.style.display='none';
}

function llamarasincrono(url, id_contenedor){
	document.getElementById("stat").innerHTML=document.getElementById("loader").innerHTML; // mostramos el loader
	mostrarDiv( $("#stat"),'stat' );
	
	var pagina_requerida = false
	if (window.XMLHttpRequest) {// Si es Mozilla, Safari etc
		pagina_requerida = new XMLHttpRequest()
	} else if (window.ActiveXObject){ // pero si es IE
		try {
			pagina_requerida = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){ // en caso que sea una versión antigua
			try{
				pagina_requerida = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
		pagina_requerida.onreadystatechange=function(){ // función de respuesta
			cargarpagina(pagina_requerida, id_contenedor)
	}
	pagina_requerida.open('GET', url, true) // asignamos los métodos open y send
	pagina_requerida.send(null);
}
// todo es correcto y ha llegado el momento de poner la información requerida
// en su sitio en la pagina xhtml
function cargarpagina(pagina_requerida, id_contenedor){
	if (pagina_requerida.readyState == 4 && (pagina_requerida.status==200 || window.location.href.indexOf("http")==-1)){
		if(pagina_requerida.responseText){
			document.getElementById(id_contenedor).innerHTML=pagina_requerida.responseText;
		}else{document.getElementById(id_contenedor).innerHTML="<b>Error al obtener datos del servidor</b>";}
	}
	if(pagina_requerida.readyState == 4 && pagina_requerida.status==0){
		document.getElementById(id_contenedor).innerHTML="<b>Error al obtener datos del servidor</b>";
	}
}


$("#HideStat").click(function(evt) {
   evt.preventDefault();
   ocultarDiv($("#stat"));
})
