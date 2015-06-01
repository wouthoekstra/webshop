<?php namespace webshop;
/**
 * Created by PhpStorm.
 * User: wouth_000
 * Date: 01/06/2015
 * Time: 18:26
 */

class Autoloader {

    public function __construct()
    {
        $this->load();
    }
    public function load() {
        spl_autoload_register(function($class) {
            $class = substr($class,8);
            echo $class . "<br>";
            include $class . '.php';
        });
    }
}