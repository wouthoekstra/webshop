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
    }

    public function save(&$order)
	{
		if ($order->id == null)
		{
			$this->store($order);
		} else
		{
			$this->update($order);
		}
	}

	public function store(&$order)
	{
		$this->connect();
		$dateTime = date("Y-m-d H:m:s", time());
		$query = $this->prepare("INSERT INTO orders (product_id,customer_id,date_created) VALUES (?,?,?,?)");
		$query->bind_param("ssis", $order->title, 1, $dateTime);
		$query->execute();
		$order->id = $this->getInsertId();
		$order->dateCreated = $dateTime;
		$this->disconnect();
	}

	public function update(&$order)
	{
//		$this->connect();
//		$dateTime = date("Y-m-d H:m:s", time());
//		$query = $this->prepare("UPDATE posts SET title=?,content=?,date_edited=? WHERE id = ?");
//		$query->bind_param("sssi", $order->title, $order->content, $dateTime, $order->id);
//		$query->execute();
//		$order->dateEdited = $dateTime;
//		$this->disconnect();
	}

	public function delete($id)
	{
//		$this->connect();
//		$query = $this->prepare("DELETE FROM posts WHERE id = ?");
//		$query->bind_param("i", $id);
//		$query->execure();
//		$this->disconnect();
	}

	public function all()
	{
		$this->connect();

		$query = $this->prepare("SELECT * FROM orders ORDER BY price DESC");
		$query->execute();
		$result = $query->get_result();

		$orders = array();
		while ($row = $result->fetch_assoc())
		{
            $order = new ModelOrder();
            $order->id = $row['id'];
            $order->product_id = $row['product_id'];
            $order->customer_id = $row['customer_id'];
            $order->dateCreated = $row['dateCreated'];

			$orders[] = $order;
		}

		$this->disconnect();
		return $orders;
	}

	public function allByBlogger($bloggerID)
	{
	}

    public function byID($id)
    {
        $this->connect();
        $query = $this->prepare("SELECT * FROM orders WHERE id = ?");
        $query->bind_param("s", $id);
        $query->execute();
        $result = $query->get_result();
        $order = null;
        if ($row = $result->fetch_assoc()) {
            $order = new ModelOrder();
            $order->id = $row['id'];
            $order->product_id = $row['product_id'];
            $order->customer_id = $row['customer_id'];
            $order->dateCreated = $row['dateCreated'];
        }
        $this->disconnect();
        return $order;
    }
}
