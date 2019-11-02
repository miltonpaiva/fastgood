<?php

	$project_path = current(explode('index.php', $_SERVER['SCRIPT_NAME']));
	$project_name = 'Fast GOOD';

	require_once $_SERVER['DOCUMENT_ROOT'] . "{$project_path}includes/connect_db.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "{$project_path}app/controller.php";

	$pdo = Database::conexao();

	$inc = new Controller();

	$path_info = explode('/', $_SERVER['PATH_INFO']);

	if (isset($path_info[1])){
		$page = $path_info[1];
	}elseif(isset($path_info[2])){
		$action = $path_info[2];
	}
	$inc->includePage($page);
?>