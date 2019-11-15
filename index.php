<?php
	/**
	 * [$project_path Contem o path padrão da aplicação]
	 * @var [string]
	 */
	$project_path = current(explode('index.php', $_SERVER['SCRIPT_NAME']));

	/**
	 * [$project_name Nome da aplicação]
	 * @var [string]
	 */
	$project_name = 'Fast GOOD';

	/**
	 * [$url_web url base do projeto]
	 * @var [string]
	 */
	$url_web = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$project_path}";

	/**
	 * [$include_paths paths base do projeto]
	 * @var [array]
	 */
	$include_paths['adicional'] 	= 	"{$url_web}app/assets/adicional/";
	$include_paths['absolut'] 		= 	$_SERVER['DOCUMENT_ROOT'];
	$include_paths['models'] 		= 	"{$include_paths['absolut']}{$project_path}app/model/";
	$include_paths['pages'] 		= 	"{$include_paths['absolut']}{$project_path}app/view/";
	$include_paths['parts'] 		= 	"{$include_paths['absolut']}{$project_path}includes/parts/";
	$include_paths['css'] 			= 	"{$url_web}app/assets/css/";
	$include_paths['img'] 			= 	"{$url_web}app/assets/img/";
	$include_paths['js'] 			= 	"{$url_web}app/assets/js/";


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