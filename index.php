<?php
require 'Slim/Slim.php';
require $_SERVER['DOCUMENT_ROOT'].'/Conexao/conecta.inc';
require "Controller.php";

$app = new Slim(array(
		'templates.path' => 'View',
		'debug' => true,
		'mode' => 'development',
		'name' => 'gerenciar_tarifario_cliente'
));

$app->get('/procurar_cliente','procurar_cliente');

$app->get('/:id_cliente','cadastrar_paises');

$app->post('/listar_opcoes/','listar_opcoes_cliente');

$app->post('/salvar','salvar');

$app->run();