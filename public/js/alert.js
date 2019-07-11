function janela_mensagem(mensagem,tipo,link){
	$("#Modal").fadeToggle();
	 $('#texto').text('Deseja completar ação, ' + mensagem + ' ' + tipo + '?');
	 $("#true" ).click(function() {
	   	window.location.href = link;
	});
	$("#false").click(function() {
	    $( "#Modal" ).fadeOut();
	});
}