<?php	
function cadastrar_paises($id_cliente = 0,$sentido = null)
{
	$app = Slim::getInstance();
	$conn = Zend_Conn();
	
	/**
	 * Procura pelos resgistros relacionados ao cliente informado
	 */
	$sql = $conn->
				select("*")->
				from("FINANCEIRO.restricao_tarifario_cliente")->
				join("GERAIS.paises","paises.id_pais = restricao_tarifario_cliente.id_pais",array('pais'))->
				where("id_cliente = ?",$id_cliente)->
				where("sentido = ?",$sentido)->
				order(array("pais ASC"));
	
	$rowSet = $conn->fetchAll($sql);
	
	/**
	 * Recupera a razão do cliente
	*/
	require 'Classes/Cliente.php';
	
	$cliente = new Cliente();
	$dadosDoCliente = $cliente->consultarPorId($id_cliente);
	
	$dadosView = array(
			"cliente" => $dadosDoCliente,
			"restricoes_cliente" => $rowSet,
			"sentido" => $sentido,
	);
			
	$app->render("cadastrar_paises.php",$dadosView);
}

function procurar_cliente()
{
	$app = Slim::getInstance();
	
	$app->render("procurar_cliente.php");
}

function listar_opcoes_cliente()
{
	$app = Slim::getInstance();
	$conn = Zend_Conn();
	
	/**
	 * Procura pelos resgistros relacionados ao cliente informado
	 */
	$sql = $conn->
				select("*")->
				from("FINANCEIRO.restricao_tarifario_cliente")->
				where("id_cliente = ?",$app->request()->post('id_cliente'));
	
	$rowSet = $conn->fetchAll($sql);
	
	/**
	 * Recupera a razão do cliente
	 */
	require 'Classes/Cliente.php';
	
	$cliente = new Cliente();
	$dadosDoCliente = $cliente->consultarPorId($app->request()->post('id_cliente'));
	
	$dadosView = array(
						"cliente" => $dadosDoCliente,
						"restricoes_cliente" => $rowSet,
	);
			
	$app->render("listar_opcoes_cliente.php",$dadosView);
}

function salvar()
{
	$app = Slim::getInstance();
				
	$conn = Zend_Conn();
	
	/** Limpa os registros antes de salvar os novos **/		
	$conn->query(
				"DELETE 
					FROM FINANCEIRO.restricao_tarifario_cliente
				 WHERE
					id_cliente = ".$app->request()->post("id_cliente")." AND 
					sentido = '".$app->request()->post("sentido")."'"
	);
	
	foreach( $app->request()->post('paises_selecionados') as $id_pais )
	{
		$dados = array(
						"id_cliente" => $app->request()->post("id_cliente"),
						"id_pais" => $id_pais,
						"sentido" => $app->request()->post("sentido"),
		);
		
		$conn->insert("FINANCEIRO.restricao_tarifario_cliente",$dados);
	}	
	
	$app->redirect("/Clientes/gerenciar_tarifario_cliente/index.php/cadastrar_paises/".$app->request()->post('id_cliente')."/".$app->request()->post('sentido'));
	
	//$app->render("procurar_cliente.php");
	
}
	
