<?php 

	global $project_name;
	require_once $_SERVER['DOCUMENT_ROOT'] . "/{$project_name}/app/controller/IncludeController.php";

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

	public function includePage($pathinfo = '')
	{
		$this->include->Page(@$pathinfo[1]);
	}

	public function includeArchive($file, $type)
	{
		$this->include->Archive($file, $type);
	}

	public function includeParts($file)
	{
		$this->include->parts($file);
	}
}

?>