<?php namespace webshop\controllers;
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 13:33
 */

use \webshop\repos\RepoProduct;
use \webshop\models\ModelProduct;

class ControllerProduct implements ControllerInterface
{
	private $repoProduct;
// import the Intervention Image Manager Class

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
		include "views/ViewListProducts.php";
	}

	public function show($id)
	{
		$product = $this->repoProduct->show($id);

		if ($product === null)
		{
			header("Location: 404");
		}

		include "../views/ViewProduct.php";

	}

	public function create()
	{
        $product = new ModelProduct();
        include "../views/ViewWriteProduct.php";
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

            if(isset($_FILES['input-id'])){
                $file_name = $_FILES['input-id']['name'];
                $file_size =$_FILES['input-id']['size'];
                $file_tmp =$_FILES['input-id']['tmp_name'];
                $file_type=$_FILES['input-id']['type'];

//                // create an image manager instance with favored driver
//                $manager = new ImageManager(array('driver' => 'imagick'));
//
//                // to finally create image instances
//                $file_tmp = $manager->make('foo.jpg')->resize(300, 200);

                move_uploaded_file($file_tmp,"resources/img/".$file_name);
                $product->imageurl = $file_name;
            } else{
                $product->imageurl = "";
            }


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
