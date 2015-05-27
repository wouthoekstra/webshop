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
class RepoCustomer extends DatabaseBlog implements DatabaseInterface
{

    public function show($id)
    {
//        $this->connect();
//
//        $query = $this->prepare("SELECT * FROM orders WHERE id = ?");
//        $query->bind_param("s", $id);
//        $query->execute();
//        $result = $query->get_result();
//        $order = null;
//        if ($row = $result->fetch_assoc())
//        {
//        $order = new ModelOrder();
//        $order->id = $row['id'];
//        $order->product_id = $row['product_id'];
//        $order->customer_id = $row['customer_id'];
//        $order->dateCreated = $row['date_created'];
//        }
//
//        $this->disconnect();
//        return $order;
    }

    public function save(&$customer)
	{
        $this->store($customer);
	}

	public function store(&$customer)
	{
		$this->connect();
		$query = $this->prepare("INSERT INTO customers (name, street, house_number, zip, city) VALUES (?,?,?,?,?)");
		$query->bind_param("sssss", $customer->name, $customer->street, $customer->house_number, $customer->zip,$customer->city);
		$query->execute();
		$customer->id = $this->getInsertId();
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
