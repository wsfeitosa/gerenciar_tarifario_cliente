<?php	
function procurar_cliente()
{
	$app = Slim::getInstance();
	
	$app->render("procurar_cliente.php");
}

function salvar()
{
	$app = Slim::getInstance();
				
	$conn = Zend_Conn();
	
	foreach( $app->request()->post('paises_selecionados') as $id_pais )
	{
		$dados = array(
						"id_cliente" => $app->request()->post("id_cliente"),
						"id_pais" => $id_pais
		);
		
		$conn->insert("FINANCEIRO.restricao_tarifario_cliente",$dados);
	}	
	
	$app->render("procurar_cliente.php");
	
}
	
