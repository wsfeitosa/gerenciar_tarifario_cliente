$(document).ready(function(){
	
	$("#sair").click(function(){
		window.close();
	});
	
	$("#consultar").click(function(){
		window.location = "/Clientes/gerenciar_tarifario_cliente/index.php/procurar_cliente";		
	});
	
	/** Autocompletar do nome dos clientes **/
	$("#cliente").autocomplete({
		
		source: "/Libs/autocompletar/clientes.php",
		minLength: 3,
		select: function( event, ui ){			
				
				$("#cliente").val("");
				$("#cliente_selecionado").text(ui.item.label);
				$("#id_cliente").val(ui.item.id);
															
		}	
		
	});
	
	$( "#pais" ).autocomplete({
		
		source: "/Libs/autocompletar/pais.php",
		minLength: 3,
		select: function( event, ui ){

			$("#pais").val("");	
			$("#pais").text("");
			$("#paises_selecionados").append(new Option(ui.item.label, ui.item.id));

		}
	});
	
	$("#remover_pais").click(function(){
		
		$("#paises_selecionados option:selected").remove();
		
	});
	
	$("#salvar").click(function(){
		
		var erro = false;
		var msg = "";
		
		if( $("#id_cliente").val() == "" )
		{
			erro = true;
			msg += "Nenhum cliente foi selecionado\n";
		}	
						
		if( $("#paises_selecionados option").size() < 1 )
		{
			erro = true;
			msg += "Nenhum país foi selecionado\n";
		}	
		
		if( erro == true )
		{
			alert(msg);
		}
		else
		{
			/** Seleciona todos os itens do como de paises antes de enviar **/
			$("#paises_selecionados option").each(function(){
				$(this).attr("selected", "selected");
			});
			
			alert("Alterações salvas com sucesso!");
			
			$("form").submit();
		}	
		
	});
	
});