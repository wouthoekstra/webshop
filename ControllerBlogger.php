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

class ControllerBlogger implements ControllerInterface
{
	private $repoBlogger;

	public function __construct()
	{
		$this->repoBlogger = new RepoBlogger();
	}

    public function show($id)
    {

    }

	public function manage($data)
	{
		$this->index();
	}

	public function index($data=null)
	{
		$bloggers = $this->repoBlogger->all();
		include "ViewListBlogger.php";
	}

	public function create()
	{
		include "ViewWriteBlogger.php";
	}

	public function store($data)
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

    public function delete($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

}