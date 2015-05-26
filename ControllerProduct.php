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

class ControllerProduct implements ControllerInterface
{
	private $repoProduct;

	public function __construct()
	{
		$this->repoProduct = new RepoProduct();
	}

	public function manage($bloggerID)
	{
	}

	public function index($data)
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

		include "ViewProduct.php";

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
            $product = new ModelProduct();
            $product->name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            $product->price = htmlspecialchars($_POST['price'], ENT_QUOTES);
            $product->stock = htmlspecialchars($_POST['stock'], ENT_QUOTES);
            $product->color = htmlspecialchars($_POST['color'], ENT_QUOTES);
            $product->description = htmlspecialchars($_POST['description'], ENT_QUOTES);
            $product->imageurl = "";
            $this->repoProduct->save($product);
            header("Location: ?page=product&action=show&id=" . $product->id);
        } else
        {
            header("Location: ?page=post");
        }
	}

	public function update($id)
	{
	}

    public function delete($id)
    {

    }

	public function edit($id)
	{
	}

}
