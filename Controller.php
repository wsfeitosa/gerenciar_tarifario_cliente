<?php	
function cadastrar_paises($id_cliente = 0)
{
	$app = Slim::getInstance();
	
	$app->render("cadastrar_paises.php");
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
	
	var_dump($rowSet);
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
	
