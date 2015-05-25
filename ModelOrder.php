<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 13:24
 */

spl_autoload_register(function($class) {
	include $class . '.php';
});

class ModelOrder
{
	public $id;
	public $product_id;
	public $customer_id;
	public $dateCreated;
}

