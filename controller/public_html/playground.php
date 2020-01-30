<?php
	session_start();
	require_once __DIR__ . "/../vendor/autoload.php";

	$handler = new \App\Controller\Handler();
	$is_connected = $handler->logic->initClient();

	$handler->render([
		'tag'    => 'playground',
		'title'  => 'Playground',
		'user'   => $handler->user->data,
		'client' => [
			'is_connected' => $is_connected
		],
		'test'   => $handler->logic->getPlaygroundData()
	]);
