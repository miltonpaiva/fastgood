<?php 

	global $project_path;
	require_once $_SERVER['DOCUMENT_ROOT'] . "{$project_path}app/controller/IncludeController.php";

/**
 * Controller
 */
class Controller
{
	public $include;
	public $DB;

	function __construct()
	{
		$this->include = new IncludeController();
		$this->DB = Database::conexao();
	}

	public function includePage($path_info)
	{
		$this->include->Page($path_info);
	}

	public function includeArchive($file)
	{
		$this->include->Archive($file);
	}

	public function includeParts($file)
	{
		$this->include->parts($file);
	}

	public function includeImg($file)
	{
		$this->include->img($file);
	}
}

?>