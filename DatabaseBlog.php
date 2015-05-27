<?php namespace webshop;

class DatabaseBlog
{
	private $username = "php";
	private $password = "j15cnCwmDWGGcIU";
	private $servername = "localhost";
	private $database = "webshop";

	private $connection;

	protected function connect()
	{
		$this->connection = new \mysqli(
				$this->servername,
				$this->username,
				$this->password,
				$this->database
		);
//		$query = $this->connection->prepare("");
//		$query->er

		if ($this->connection->errno) {
			printf("Connect failed: %s\n", $this->connection->error);
			exit();
		}
	}

	protected function printError()
	{
		if ($this->connection->errno) {
			printf("Connect failed: %s\n", $this->connection->error);
			exit();
		}
	}

	protected function prepare($query)
	{
		if ($this->connection == null)
		{
			$this->connect();
		}
		$result = $this->connection->prepare($query);

		if ($this->connection->errno) {
			printf("Connect failed: %s\n", $this->connection->error);
			exit();
		}
		return $result;
	}

	protected function getInsertId()
	{
		return $this->connection->insert_id;
	}

	protected function disconnect()
	{
		if ($this->connection != null)
		{
			$this->connection->close();
		}
	}

}
