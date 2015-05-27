<?php namespace webshop;
require_once "init.php";
$route = new Router();

class Router {

	public $blog = "";
	public $page = "";
	public $action = "";
	public $id = "";
	public $controller = "";

	public function __construct()
	{
		$this->getParam();
		$this->routePage();
	}

	public function getParam()
	{
		$this->page = isset($_GET['page'])?$this->page = strip_tags($_GET['page']):"";
		$this->action = isset($_GET['action'])?$this->action = strip_tags($_GET['action']):"";
		$this->id = isset($_GET['id'])?$this->id = strip_tags($_GET['id']):"";
		$this->blog = isset($_GET['bloggerid'])?$this->id = strip_tags($_GET['bloggerid']):"";
	}

	public function routePage()
	{
//		echo $this->page . "<br>";
//		echo $this->action . "<br>";
//		echo $this->id . "<br>";
		switch ($this->page)
		{
			case "post":
                $this->controller = new Controllers\ControllerPost();
				break;
			case "comment":
				$this->controller = new Controllers\ControllerComment();
				break;
            case "product":
                $this->controller = new Controllers\ControllerProduct();
                break;
			case "login":
				$this->controller = new Controllers\ControllerLogin();
				break;
			case "blogger":
				$this->controller = new Controllers\ControllerBlogger();
				break;
            case "order":
                $this->controller = new Controllers\ControllerOrder();
                break;
            case "consumer":
                $this->controller = new Controllers\ControllerConsumer();
                break;
			default:
				$this->controller = new Controllers\ControllerProduct();
		}
		switch ($this->action)
		{
			case "all":
				$this->controller->index();
				break;
            case "show":
				$this->controller->show($this->id);
                break;
			case "create":
				$this->controller->create();
				break;
			case "edit":
				$this->controller->edit($this->id);
				break;
			case "store":
				$this->controller->store($this->id);
				break;
			case "update":
				$this->controller->update($this->id);
				break;
			case "delete":
				$this->controller->delete($this->id);
				break;
			case "manage":
				$this->controller->manage($this->blog);
				break;
			default:
				$this->controller->index($this->blog);
		}
	}
}
