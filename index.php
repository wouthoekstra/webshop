<?php
/**
 * Created by PhpStorm.
 * User: wouth_000
 * Date: 25/05/2015
 * Time: 11:28
 */

// Include the composer autoload file
include_once "vendor/autoload.php";

// Import the necessary classes
//use Illuminate\Database\Capsule\Manager as Capsule;

// Create the Sentry alias
class_alias('Cartalyst\Sentry\Facades\Native\Sentry', 'Sentry');

// Create a new Database connection
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'webshop',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);

$capsule->bootEloquent();

// Find a user using the user email address
$user = Sentry::findUserByLogin('john.doe@example.com');