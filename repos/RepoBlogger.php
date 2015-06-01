<?php namespace webshop\repos;
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 21-5-2015
 * Time: 13:46
 */
spl_autoload_register(function($class) {
	include $class . '.php';
});

class RepoBlogger extends DatabaseBlog implements DatabaseInterface
{

	public function save(&$blogger)
	{
		if ($blogger->id == null)
		{
			$this->store($blogger);
		} else
		{
			$this->update($blogger);
		}
	}

	public function store(&$blogger)
	{
		$this->connect();
		$password = password_hash($blogger->password, PASSWORD_DEFAULT);
		$query = $this->prepare("INSERT INTO bloggers (username, password) VALUES (?,?)");
		$query->bind_param("ss", $blogger->username, $password);
		$query->execute();
		$blogger->id = $this->getInsertId();
		$blogger->password = "";
		$this->disconnect();
	}

	/**
	 * Hier hoeft eigenlijk niks te gebeuren
	 * @param $blogger
	 */
	public function update(&$blogger)
	{
//		$this->connect();
//		$query = $this->prepare("UPDATE bloggers SET username=? WHERE id = ?");
//		$query->bind_param("si", $blogger->username, $blogger->id);
//		$query->execute();
//		$this->disconnect();
	}

	public function delete($id)
	{
		$this->connect();
		$query = $this->prepare("DELETE FROM bloggers WHERE id = ?");
		$query->bind_param("i", $id);
		$query->execute();
		$this->disconnect();
	}

	public function all()
	{
		$this->connect();
		$query = $this->prepare("SELECT * FROM bloggers");
		$query->execute();
		$result = $query->get_result();

		$bloggers = array();
		while ($row = $result->fetch_assoc())
		{
			$blogger = new ModelBlogger();
			$blogger->id = $row['id'];
			$blogger->username = $row['username'];
			$bloggers[] = $blogger;
		}
		$this->disconnect();
		return $bloggers;
	}

	public function byID($id)
	{
		$this->connect();
		$query = $this->prepare("SELECT * FROM bloggers WHERE id = ?");
		$query->bind_param("i", $id);
		$query->execute();
		$result = $query->get_result();

		$blogger = null;
		if ($row = $result->fetch_assoc())
		{
			$blogger = new ModelBlogger();
			$blogger->id = $row['id'];
			$blogger->username = $row['username'];
		}
		$this->disconnect();

		return $blogger;
	}

	public function checkPassword(&$blogger)
	{
		$this->connect();
		$query = $this->prepare("SELECT password, id FROM bloggers WHERE username = ?");
		$query->bind_param("s", $blogger->username);
		$query->execute();
		$result = $query->get_result();

		if ($row = $result->fetch_assoc())
		{
			$passwordHash = $row['password'];
			$passwordEntered = $blogger->password;
			$blogger->id = $row['id'];
			$blogger->password = "";
			$this->disconnect();
			return password_verify($passwordEntered, $passwordHash);
		} else
		{
			$this->disconnect();
			return false;
		}
	}
}