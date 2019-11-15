<?php 

	global $project_path;
	require_once $_SERVER['DOCUMENT_ROOT'] . "{$project_path}app/controller/IncludeController.php";
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
		global $pdo;
		$this->include = new IncludeController();
		$this->DB = $pdo;
	}

	public function includePage($entity = '')
	{
		$this->include->Page($entity);
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

	public function includeModel($route)
	{
		$this->include->models($route);
	}
}

?>