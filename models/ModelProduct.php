<?php namespace webshop\models;
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 13:24
 */

spl_autoload_register(function($class) {
	include $class . '.php';
});

class ModelProduct
{
    public $id;
    public $name;
    public $price;
    public $stock;
    public $color;
    public $description;
    public $imageurl;
}

