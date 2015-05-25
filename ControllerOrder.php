<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 13:33
 */

spl_autoload_register(function($class) {
	include $class . '.php';
});

class ControllerOrder implements ControllerInterface
{
	private $repoOrder;

	public function __construct()
	{
		$this->repoOrder = new RepoOrder();
	}

	public function manage($bloggerID)
	{
	}

	public function index()
	{
	}

	public function show($id)
	{
	}

	public function create()
	{
	}

	public function store($data)
	{
	}

    public function delete($id)
    {
    }

	public function update($id)
	{

        $order = new ModelOrder();
        $order->product_id = 2;
        $order->customer_id = 1;
        $this->repoOrder->save($order);
        header("Location: ?page=order&action=byID&id=" . $order->id);
	}

	public function edit($id)
	{
	}

}
