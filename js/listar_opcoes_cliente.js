$(document).ready(function(){
	
	$("a").click(function(){
		
		var url = "https://" + location.host + $(this).attr('link');
		
		NovaJanela($(this).attr('link'),"Cadastrar Paises",1024,768);
		
	});
	
	$("#sair").click(function(){
		window.close();
	});
	
	$("#voltar").click(function(){
		window.location = "/Clientes/gerenciar_tarifario_cliente/index.php/procurar_cliente";
	});
	
	function NovaJanela(pagina,nome,w,h,scroll){
        LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
        TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
        settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
        win = window.open(pagina,nome,settings);
    }
	
});