/*
 * notify.js
 *  - Funciones JS para mostrar las notificaciones
 */ 

function hideAllMessages()
{
	 var messagesHeights = new Array(); 
 
	 for (i=0; i<msgType.length; i++)
	 {
		  messagesHeights[i] = $('.' + msgType[i]).outerHeight();
		  $('.' + msgType[i]).css('top', -messagesHeights[i]); 
	 }
}

function hideMessage(type)
{
	 var messagesHeights; 
	messagesHeights = $('.' + type).outerHeight();
	$('.'+type).css('top', -messagesHeights); 
}

function showMessage(type,title,message)
{
	docu=document.getElementById(type);
	if(docu.style.top!="0px"){
		hideAllMessages();
		document.getElementById(type+"_ttl").innerHTML=title;
		document.getElementById(type+"_msg").innerHTML=message;

		$('.'+type).animate({top:"0"}, 1000);
	}
}


$(document).ready(function(){
	 hideAllMessages();
	// showMessage('warning');
	 $('.message').click(function(){			  
		  $(this).animate({top: -$(this).outerHeight()}, 500);
	  });		 
	 
});
