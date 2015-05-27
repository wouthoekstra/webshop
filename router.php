<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 21-5-2015
 * Time: 9:04
 */
spl_autoload_register(function($class) {
	include $class . '.php';
});

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
				$this->controller = new ControllerPost();
				break;
			case "comment":
				$this->controller = new ControllerComment();
				break;
            case "product":
                $this->controller = new ControllerProduct();
                break;
			case "login":
				$this->controller = new ControllerLogin();
				break;
			case "blogger":
				$this->controller = new ControllerBlogger();
				break;
            case "order":
                $this->controller = new ControllerOrder();
                break;
            case "customer":
                $this->controller = new ControllerCustomer();
                break;
			default:
				$this->controller = new ControllerProduct();
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
