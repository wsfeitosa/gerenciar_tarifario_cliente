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

$app->get('/','pog');

$app->run();