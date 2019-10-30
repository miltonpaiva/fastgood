<?php

/**
 * IncludeController
 */
class IncludeController
{
	private $projectPath;
	private $urlWeb;
	private $paths = array();

	function __construct()
	{
		global $project_path;

		$this->projectPath 			= 	$project_path;

		$this->urlWeb 				= 	"{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$this->projectPath}";

		$this->paths['absolut'] 	= 	$_SERVER['DOCUMENT_ROOT'];
		$this->paths['css'] 		= 	$this->urlWeb . 'app/assets/css/';
		$this->paths['js'] 			= 	$this->urlWeb . 'app/assets/js/';
		$this->paths['adicional'] 	= 	$this->urlWeb . 'app/assets/adicional/';
		$this->paths['img'] 		= 	$this->urlWeb . 'app/assets/img/';
		$this->paths['pages'] 		= 	"{$this->paths['absolut']}{$this->projectPath}app/view/";
		$this->paths['parts'] 		= 	"{$this->paths['absolut']}{$this->projectPath}includes/parts/";
	}

	public function page($path_info = '')
	{
		$page = $this->montPath($path_info);
		include $page;
	}

	private function montPath($page_name)
	{
		if ($page_name) {
			return $this->paths['pages'] . "{$page_name}.php";
		}else{
			return $this->paths['pages'] . 'login.php';
		}
	}

	public function archive($file)
	{
		if (strpos($file, 'css')) {
			$tag = "<link href='{$this->paths['css']}{$file}' rel='stylesheet'> \n";
		}
		if (strpos($file, 'js')) {
			$tag = "<script type='text/javascript' src='{$this->paths['js']}{$file}'></script> \n";
		}

		echo $tag;
	}

	public function img($file)
	{
		switch ($type) {
			case 'css':
				$tag = "<link href='{$this->paths['css']}{$file}' rel='stylesheet'> \n";
				break;
			case 'js':
				$tag = "<script type='text/javascript' src='{$this->paths['js']}{$file}'></script> \n";
				break;
		}
		echo $tag;
	}

	public function parts($file)
	{
		include "{$this->paths['parts']}{$file}.php";
	}
}


 ?>