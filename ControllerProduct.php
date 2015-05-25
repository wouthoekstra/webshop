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

class ControllerProduct
{
	private $repoProduct;
//	private $repoComment;

	public function __construct()
	{
		$this->repoProduct = new RepoProduct();
//		$this->repoComment = new RepoComment();
	}

	public function manage($bloggerID)
	{
		if (empty($bloggerID))
		{
			$products = $this->repoProduct->all();
		} else
		{
			$products = $this->repoProduct->allByBlogger($bloggerID);
		}
		include "ViewManageProduct.php";
	}

	public function index()
	{
        $products = $this->repoProduct->all();
		include "ViewListProducts.php";
	}

	public function show($id)
	{
		$product = $this->repoProduct->show($id);

		if ($product === null)
		{
			header("Location: 404");
		}

		$owner = false;
		if ($_SESSION['logged'] && $product->bloggerID == $_SESSION['bloggerid'])
		{
			$owner = true;
		}

//		$comments = $this->repoComment->getCommentsByPost($id);

//		$commentsNum = count($comments);


		include "ViewProduct.php";
//		include "ViewListComments.php";
//		include "ViewWriteComment.php";

	}

	public function create()
	{
		$product = new ModelProduct();
		include "ViewWriteProduct.php";
	}

	public function store($data)
	{
		if ($_SESSION['logged'])
		{
			$post = new ModelProduct();
			$post->title = htmlspecialchars($_POST['title'], ENT_QUOTES);
			$post->content = htmlspecialchars($_POST['content'], ENT_QUOTES);
			$post->bloggerID = $_SESSION['bloggerid'];
			$this->repoProduct->save($product);
			header("Location: ?page=post&action=show&id=" . $post->id);
		} else
		{
			header("Location: ?page=post");
		}
	}

	public function update($id)
	{
		if ($_SESSION['logged'])
		{
			$product = $this->repoProduct->show($id);
			$product->title = htmlspecialchars($_POST['title'], ENT_QUOTES);
			$product->content = htmlspecialchars($_POST['content'], ENT_QUOTES);
			$product->bloggerID = $_SESSION['bloggerid'];
			$this->repoProduct->save($product);
			header("Location: ?page=post&action=show&id=" . $product->id);
		} else
		{
			header("Location: ?page=post");
		}
	}

	public function edit($id)
	{
		$product = $this->repoProduct->show($id);
		include "ViewWriteProduct.php";
	}

}
