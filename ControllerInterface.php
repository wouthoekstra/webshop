<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 21-5-2015
 * Time: 13:47
 */

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