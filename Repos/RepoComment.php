<?php namespace webshop\Repos;

class RepoComment extends DatabaseBlog implements DatabaseInterface
{
	public function save(&$comment)
	{
		if ($comment->id == null)
		{
			$this->store($comment);
		} else
		{
			$this->update($comment);
		}
	}

	public function store(&$comment)
	{
		$this->connect();
		$dateTime = date("Y-m-d H:m:s", time());
		$query = $this->prepare("INSERT INTO comments (post_id,content,visitor_name,date_created) VALUES (?,?,?,?)");
		$query->bind_param("isss", $comment->postID, $comment->content, $comment->visitorName, $dateTime);
		$query->execute();
		$comment->id = $this->getInsertId();
		$comment->dateCreated = $dateTime;
		$this->disconnect();
	}

	/**
	 * Hebben we deze wel nodig?
	 * @param $comment
	 */
	public function update(&$comment)
	{
		$this->connect();
		$dateTime = date("Y-m-d H:m:s", time());
		$query = $this->prepare("UPDATE comments SET visitor_name=?,content=?,date_edited=? WHERE id = ?");
		$query->bind_param("sssi", $comment->visitorName, $comment->content, $dateTime, $comment->id);
		$query->execute();
		$comment->dateEdited = $dateTime;
		$this->disconnect();
	}

	/**
	 * Only accessible to blogger, not visitor
	 * @param $id int ID of the comment to delete
	 */
	public function delete($id)
	{
		$this->connect();
		$query = $this->prepare("DELETE FROM comments WHERE id = ?");
		$query->bind_param("i", $id);
		$query->execute();
		$this->disconnect();
	}

	public function getCommentsByPost($postID)
	{
		$this->connect();

		$query = $this->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY date_created DESC");
		$query->bind_param("i", $postID);
		$query->execute();
		$result = $query->get_result();

		$comments = array();
		while ($row = $result->fetch_assoc())
		{
			$comment = new ModelComment();
			$comment->id = $row['id'];
			$comment->postID = $row['post_id'];
			$comment->content = $row['content'];
			$comment->visitorName = $row['visitor_name'];
			$comment->dateCreated = $row['date_created'];

			$comments[] = $comment;
		}

		$this->disconnect();
		return $comments;
	}

	public function all()
	{
		$this->connect();

		$query = $this->prepare("SELECT * FROM comments ORDER BY date_created DESC");
		$query->execute();
		$result = $query->get_result();

		$comments = array();
		while ($row = $result->fetch_assoc())
		{
			$comment = new ModelComment();
			$comment->id = $row['id'];
			$comment->postID = $row['post_id'];
			$comment->content = $row['content'];
			$comment->visitorName = $row['visitor_name'];
			$comment->dateCreated = $row['date_created'];

			$comments[] = $comment;
		}

		$this->disconnect();
		return $comments;
	}

	public function byID($id)
	{
		$this->connect();

		$query = $this->prepare("SELECT * FROM comments WHERE id = ?");
		$query->bind_param("i", $id);
		$query->execute();
		$result = $query->get_result();

		$comment = null;
		if ($row = $result->fetch_assoc())
		{
			$comment = new ModelComment();
			$comment->id = $row['id'];
			$comment->postID = $row['post_id'];
			$comment->content = $row['content'];
			$comment->visitorName = $row['visitor_name'];
			$comment->dateCreated = $row['date_created'];
		}

		$this->disconnect();
		return $comment;
	}
}
