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
