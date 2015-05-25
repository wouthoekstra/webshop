<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 13:53
 */

spl_autoload_register(function($class) {
	include $class . '.php';
});
class RepoOrder extends DatabaseBlog implements DatabaseInterface
{

    public function save(&$order)
	{
        $this->store($order);
	}

	public function store(&$order)
	{
		$this->connect();
		$dateTime = date("Y-m-d H:m:s", time());
        $product_id = 2;
        $customer_id = 1;
		$query = $this->prepare("INSERT INTO orders (product_id,customer_id,date_created) VALUES (?,?,?)");
		$query->bind_param("iis", $product_id, $customer_id, $dateTime);
		$query->execute();
		$order->id = $this->getInsertId();
		$order->dateCreated = $dateTime;
		$this->disconnect();
	}

	public function update(&$order)
	{
	}

	public function delete($id)
	{
	}

	public function all()
	{
	}

	public function allByBlogger($bloggerID)
	{
	}

    public function byID($id)
    {
    }
}
