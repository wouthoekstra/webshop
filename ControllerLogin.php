<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 22-5-2015
 * Time: 10:51
 */

class ControllerLogin
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
		header("Location: ?page=post");
	}

	public function store()
	{
		if (isset($_POST['username']))
		{

			$blogger = new ModelBlogger();
			$blogger->username = $_POST['username'];
			$blogger->password = $_POST['password'];
			if ($this->repoBlogger->checkPassword($blogger))
			{
				$_SESSION['username'] = $blogger->username;
				$_SESSION['logged'] = true;
				$_SESSION['bloggerid'] = $blogger->id;

				header("Location: ?page=post&bloggerid=" . $blogger->id);
			} else
			{
				header("Location: ?page=post&warning=incorrectlogin");
			}
		} else
		{
			header("Location: ?page=login&action=index");
		}
	}

	public function delete()
	{
		$_SESSION['logged'] = false;
		header("Location: ?page=post");
	}

	public function create()
	{

	}
}