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
class RepoPost extends DatabaseBlog implements DatabaseInterface
{

	public function save(&$product)
	{
		if ($product->id == null)
		{
			$this->store($product);
		} else
		{
			$this->update($product);
		}
	}

	public function store(&$product)
	{
		$this->connect();
		$dateTime = date("Y-m-d H:m:s", time());
		$query = $this->prepare("INSERT INTO posts (title,content,blogger_id,date_created) VALUES (?,?,?,?)");
		$query->bind_param("ssis", $product->title, $product->content, $product->bloggerID, $dateTime);
		$query->execute();
		$product->id = $this->getInsertId();
		$product->dateCreated = $dateTime;
		$this->disconnect();
	}

	public function update(&$product)
	{
		$this->connect();
		$dateTime = date("Y-m-d H:m:s", time());
		$query = $this->prepare("UPDATE posts SET title=?,content=?,date_edited=? WHERE id = ?");
		$query->bind_param("sssi", $product->title, $product->content, $dateTime, $product->id);
		$query->execute();
		$product->dateEdited = $dateTime;
		$this->disconnect();
	}

	public function delete($id)
	{
		$this->connect();
		$query = $this->prepare("DELETE FROM posts WHERE id = ?");
		$query->bind_param("i", $id);
		$query->execure();
		$this->disconnect();
	}

	public function all()
	{
		$this->connect();

		$query = $this->prepare("SELECT * FROM posts ORDER BY date_created DESC");
		$query->execute();
		$result = $query->get_result();

		$products = array();
		while ($row = $result->fetch_assoc())
		{
			$product = new ModelPost();
			$product->id = $row['id'];
			$product->bloggerID = $row['blogger_id'];
			$product->title = $row['title'];
			$product->content = $row['content'];
			$product->dateCreated = $row['date_created'];
			$product->dateEdited = $row['date_edited'];

			$products[] = $product;
		}

		$this->disconnect();
		return $products;
	}

	public function allByBlogger($bloggerID)
	{
		$this->connect();

		$query = $this->prepare("SELECT * FROM posts WHERE blogger_id = ? ORDER BY date_created DESC");
		$query->bind_param("s", $bloggerID);
		$query->execute();
		$result = $query->get_result();

		$products = array();
		while ($row = $result->fetch_assoc())
		{
			$product = new ModelPost();
			$product->id = $row['id'];
			$product->bloggerID = $row['blogger_id'];
			$product->title = $row['title'];
			$product->content = $row['content'];
			$product->dateCreated = $row['date_created'];
			$product->dateEdited = $row['date_edited'];

			$products[] = $product;
		}

		$this->disconnect();
		return $products;
	}

	public function byID($id)
	{
		$this->connect();

		$query = $this->prepare("SELECT * FROM posts WHERE id = ?");
		$query->bind_param("s", $id);
		$query->execute();
		$result = $query->get_result();
		$product = null;
		if ($row = $result->fetch_assoc())
		{
			$product = new ModelPost();
			$product->id = $row['id'];
			$product->bloggerID = $row['blogger_id'];
			$product->title = $row['title'];
			$product->content = $row['content'];
			$product->dateCreated = $row['date_created'];
			$product->dateEdited = $row['date_edited'];
		}
		$this->disconnect();
		return $product;
	}

}
