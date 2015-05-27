<?php namespace webshop\Controllers;

class ControllerComment implements ControllerInterface
{
	private $repoComment;
	private $repoPost;

	public function __construct()
	{
		$this->repoComment = new RepoComment();
		$this->repoPost = new RepoPost();
	}

	public function manage($postID = 1)
	{
		$this->index($postID);
	}

	public function index($postID = -1)
	{
		if ($postID == -1)
		{
			$comments = $this->repoComment->all();
		} else
		{
			$comments = $this->repoComment->getCommentsByPost($postID);
		}
		$commentsNum = count($comments);

		$owner = false;

		include "ViewListComments.php";
		include "ViewWriteComment.php";

	}

	public function show($id)
	{

	}

	public function create()
	{

	}

	public function delete($id)
	{
		$location = null;
		if ($_SESSION['logged'])
		{
			$comment = $this->repoComment->byID($id);
			if ($comment !== null)
			{
				$post = $this->repoPost->byID($comment->postID);
				if ($_SESSION['bloggerid'] == $post->bloggerID)
				{
					$this->repoComment->delete($id);
				}
				$location = "?page=post&action=show&id=" . $post->id;
			}
			if ($location === null)
			{
				$location = "?page=post";
			}
			header("Location: " . $location);
		} else
		{
			header("Location: ?page=post");
		}
	}

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

	public function store($postID)
	{
		$comment = new ModelComment();
		$comment->postID = $postID;
		$comment->content = htmlspecialchars($_POST['content'], ENT_QUOTES);
		$comment->visitorName = htmlspecialchars($_POST['name'], ENT_QUOTES);;
		$this->repoComment->save($comment);

		header("Location: ?page=post&action=show&id=" . $postID);
	}
}
