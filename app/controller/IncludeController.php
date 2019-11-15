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
		global $project_path, $url_web, $include_paths;

		$this->projectPath 	= $project_path;
		$this->urlWeb 		= $url_web;
		$this->paths 		= $include_paths;
	}

	public function page($entity = 'login')
	{
		$page = $this->montPath($entity);
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
		echo "{$this->paths['img']}{$file}";
	}

	public function parts($file)
	{
		include "{$this->paths['parts']}{$file}.php";
	}

	public function models($route)
	{
		include "{$this->paths['models']}{$route}.php";
	}
}


 ?>