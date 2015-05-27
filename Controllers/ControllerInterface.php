<?php namespace webshop\Controllers;

interface ControllerInterface
{
	function index($bloggerID);
    function show($id);
	function create();
	function edit($id);
	function store($id);
	function update($id);
	function delete($id);
	function manage($id);
}