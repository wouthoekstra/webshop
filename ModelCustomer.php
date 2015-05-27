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

class ModelCustomer
{
    public $id;
    public $name;
    public $street;
    public $house_number;
    public $zip;
    public $city;
}
