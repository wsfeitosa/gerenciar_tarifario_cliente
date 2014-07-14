<?php
require 'Slim/Slim.php';

$app = new Slim();

$app->get('/','index');

function index()
{
	echo "Hello World!";	
}

$app->run();