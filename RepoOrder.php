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
    public function show($id)
    {
        $this->connect();

        $query = $this->prepare("SELECT * FROM orders WHERE id = ?");
        $query->bind_param("s", $id);
        $query->execute();
        $result = $query->get_result();
        $order = null;
        if ($row = $result->fetch_assoc())
        {
        $order = new ModelOrder();
        $order->id = $row['id'];
        $order->product_id = $row['product_id'];
        $order->customer_id = $row['customer_id'];
        $order->dateCreated = $row['date_created'];
        }

        $this->disconnect();
        return $order;
    }

    public function save(&$order)
	{
        $this->store($order);
	}

	public function store(&$order)
	{
		$this->connect();
		$dateTime = date("Y-m-d H:m:s", time());
		$query = $this->prepare("INSERT INTO orders (product_id,customer_id,date_created) VALUES (?,?,?)");
		$query->bind_param("iis", $order->product_id, $order->customer_id, $dateTime);
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
