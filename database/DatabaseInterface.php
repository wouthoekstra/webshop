<?php namespace webshop\database;
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 21-5-2015
 * Time: 13:47
 */

interface DatabaseInterface
{
	function save(&$model);
	function store(&$model);
	function update(&$model);
	function delete($id);
	function all();
	function byID($id);
}