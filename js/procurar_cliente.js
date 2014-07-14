$(document).ready(function(){
			
	/** Autocompletar do nome dos clientes **/
	$("#cliente").autocomplete({
		
		source: "/Libs/autocompletar/clientes.php",
		minLength: 3,
		select: function( event, ui ){			
				
				$("#cliente").val("");
				$("#cliente_selecionado").text("Cliente "+ui.item.label+" selecionado");
				$("#id_cliente").val(ui.item.id);
															
		}	
		
	});
	
	$("#consultar").click(function(){
		
		var erro = false;
		var msg = "";
		
		if( $("#id_cliente").val() == "" )
		{
			erro = true;
			msg += "Nenhum cliente foi selecionado\n";
		}
		
		if( erro == true )
		{
			alert(msg);
		}
		else
		{						
			$("form").submit();
		}	
		
	});
	
});