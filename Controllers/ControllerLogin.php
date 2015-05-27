<?php namespace webshop\Controllers;

class ControllerLogin implements ControllerInterface
{
	private $repoBlogger;

	public function __construct()
	{
		$this->repoBlogger = new RepoBlogger();
	}

	public function manage($data)
	{
		$this->index();
	}

    public function show($id)
    {

    }

    public function update($id)
    {

    }

    public function edit($id)
    {

    }

	public function index()
	{
		header("Location: ?page=post");
	}

	public function store($data)
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

	public function delete($id)
	{
		$_SESSION['logged'] = false;
		header("Location: ?page=post");
	}

	public function create()
	{

	}
}