<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 21-5-2015
 * Time: 15:29
 */
spl_autoload_register(function($class) {
	include $class . '.php';
});

class ControllerBlogger
{
	private $repoBlogger;

	public function __construct()
	{
		$this->repoBlogger = new RepoBlogger();
	}

	public function manage()
	{
		$this->index();
	}

	public function index()
	{
		$bloggers = $this->repoBlogger->all();
		include "ViewListBlogger.php";
	}

	public function create()
	{
		include "ViewWriteBlogger.php";
	}

	public function store()
	{
		if (isset($_POST['username']))
		{
			$blogger = new ModelBlogger();
			$blogger->username = $_POST['username'];
			$blogger->password = $_POST['password'];
			$_POST['username'] = "";
			$_POST['password'] = "";
			$this->repoBlogger->save($blogger);

			header("Location: ?page=post");
		}
	}

	public function show()
	{

	}
}