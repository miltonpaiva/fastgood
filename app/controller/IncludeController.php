<?php 

/**
 * IncludeController
 */
class IncludeController
{
	private $projectName;
	private $urlWeb;
	private $paths = array();
	
	function __construct()
	{
		global $project_name;

		$this->projectName 			= 	$project_name;

		$this->urlWeb 				= 	"{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$this->projectName}";

		$this->paths['absolut'] 	= 	$_SERVER['DOCUMENT_ROOT'];
		$this->paths['css'] 		= 	$this->urlWeb . '/app/assets/css/';
		$this->paths['js'] 			= 	$this->urlWeb . '/app/assets/js/';
		$this->paths['adicional'] 	= 	$this->urlWeb . '/app/assets/adicional/';
		$this->paths['img'] 		= 	$this->urlWeb . '/app/assets/img/';
		$this->paths['pages'] 		= 	"{$this->paths['absolut']}/{$this->projectName}/app/view/";
		$this->paths['parts'] 		= 	"{$this->paths['absolut']}/{$this->projectName}/includes/parts/";
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

	public function archive($file, $type)
	{
		switch ($type) {
			case 'css':
				$tag = "<link href='{$this->paths['css']}{$file}' rel='stylesheet'>";
				break;
			case 'js':
				$tag = "<script type='text/javascript' src='{$this->paths['js']}{$file}'></script>";
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