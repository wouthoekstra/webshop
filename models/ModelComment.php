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
class ModelComment
{
	public $id;
	public $postID;
	public $visitorName;
	public $content;
	public $dateCreated;
	public $dateEdited;

}
