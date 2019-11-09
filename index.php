<?php

	$project_path = current(explode('index.php', $_SERVER['SCRIPT_NAME']));
	$project_name = 'Fast GOOD';

	require_once $_SERVER['DOCUMENT_ROOT'] . "{$project_path}includes/connect_db.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "{$project_path}app/controller.php";

	$pdo = Database::conexao();

	$inc = new Controller();

	function formatPath($path_info)
	{
		$data = explode('/', $path_info);
		foreach ($data as $key => $path) {
			if ($path == "") {
				unset($data[$key]);
			}
		}
		return $data;
	}

	$path_info = formatPath(@$_SERVER['PATH_INFO']);

	if (count($path_info) == 1){
		$entity = $path_info[1];
		$inc->includePage($entity);
	}elseif(count($path_info) == 2){
		$action = implode('/', $path_info);
		$inc->includeModel($action);
	}else{
		$inc->includePage();
	}

?>