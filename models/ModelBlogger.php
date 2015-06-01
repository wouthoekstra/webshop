<?php namespace webshop\models;
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 13:24
 */
//namespace models;
spl_autoload_register(function($class) {
	include $class . '.php';
});
class ModelBlogger
{
	public $id;
	public $username;
	public $password;

}
