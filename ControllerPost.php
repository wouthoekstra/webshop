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

class ControllerPost implements ControllerInterface
{
	private $repoPost;
	private $repoComment;

	public function __construct()
	{
		$this->repoPost = new RepoPost();
		$this->repoComment = new RepoComment();
	}

	public function manage($bloggerID)
	{
		if (empty($bloggerID))
		{
			$posts = $this->repoPost->all();
		} else
		{
			$posts = $this->repoPost->allByBlogger($bloggerID);
		}
		include "ViewManagePost.php";
	}

	public function index($bloggerID)
	{
		if (empty($bloggerID))
		{
			$posts = $this->repoPost->all();
		} else
		{
			$posts = $this->repoPost->allByBlogger($bloggerID);
		}
		include "ViewListPosts.php";
	}

	public function show($id)
	{
		$post = $this->repoPost->byID($id);

		if ($post === null)
		{
			header("Location: 404");
		}

		$owner = false;
		if ($_SESSION['logged'] && $post->bloggerID == $_SESSION['bloggerid'])
		{
			$owner = true;
		}

		$comments = $this->repoComment->getCommentsByPost($id);

		$commentsNum = count($comments);


		include "ViewPost.php";
		include "ViewListComments.php";
		include "ViewWriteComment.php";

	}

	public function create()
	{
		$post = new ModelPost();
		include "ViewWritePost.php";
	}

	public function store($data)
	{
		if ($_SESSION['logged'])
		{
			$post = new ModelPost();
			$post->title = htmlspecialchars($_POST['title'], ENT_QUOTES);
			$post->content = htmlspecialchars($_POST['content'], ENT_QUOTES);
			$post->bloggerID = $_SESSION['bloggerid'];
			$this->repoPost->save($post);
			header("Location: ?page=post&action=show&id=" . $post->id);
		} else
		{
			header("Location: ?page=post");
		}
	}

    public function delete($id)
    {

    }

	public function update($id)
	{
		if ($_SESSION['logged'])
		{
			$post = $this->repoPost->byID($id);
			$post->title = htmlspecialchars($_POST['title'], ENT_QUOTES);
			$post->content = htmlspecialchars($_POST['content'], ENT_QUOTES);
			$post->bloggerID = $_SESSION['bloggerid'];
			$this->repoPost->save($post);
			header("Location: ?page=post&action=show&id=" . $post->id);
		} else
		{
			header("Location: ?page=post");
		}
	}

	public function edit($id)
	{
		$post = $this->repoPost->byID($id);
		include "ViewWritePost.php";
	}
}
