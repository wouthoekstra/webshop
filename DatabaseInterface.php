<?php namespace webshop;

interface DatabaseInterface
{
	function save(&$model);
	function store(&$model);
	function update(&$model);
	function delete($id);
	function all();
	function byID($id);
}