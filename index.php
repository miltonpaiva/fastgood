<?php
	/**
	 * [$project_path Contem o path padrão da aplicação]
	 * @var [string]
	 */
	$project_path = current(explode('index.php', $_SERVER['SCRIPT_NAME']));

	/**
	 * [$project_name Nome da aplicação]
	 * @var string
	 */
	$project_name = 'Fast GOOD';

	require_once $_SERVER['DOCUMENT_ROOT'] . "{$project_path}includes/connect_db.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "{$project_path}app/controller.php";

	/**
	 * [$pdo instancia da conexão com o banco]
	 * @var [Object]
	 */
	$pdo = Database::conexao();

	/**
	 * [$inc Instancia da Classe Controller]
	 * @var Controller
	 */
	$inc = new Controller();

	/**
	 * @param  [String]
	 * @return [Array]
	 */
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

	/**
	 * [$path_info define as ações na aplicação]
	 * @var [Array]
	 */
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