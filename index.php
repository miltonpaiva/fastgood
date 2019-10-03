<?php 

	$project_name = 'fastgood';

	require_once $_SERVER['DOCUMENT_ROOT'] . "/{$project_name}/includes/connect_db.php";
	if (!isset($_SESSION)) session_start();
	$pdo = Database::conexao();

	require_once $_SERVER['DOCUMENT_ROOT'] . "/{$project_name}/app/controller.php";

	$inc = new Controller();
	$path_info = '';
	if (isset($_SERVER['PATH_INFO'])) {$path_info = explode('/', $_SERVER['PATH_INFO']);}
	$inc->includePage($path_info);
?>