<?php
/**
 * Created by PhpStorm.
 * User: wouth_000
 * Date: 27/05/2015
 * Time: 10:38
 */
	/*
	 |--------------------------------------------------------------------------
	 | Name : development.php
	 | Creator : Avinash Rai
	 | Purpose: simple configure file for Local Environment.
	 |--------------------------------------------------------------------------
	 */

	/*
	 |--------------------------------------------------------------------------
	 |Error Reporting
	 |--------------------------------------------------------------------------
	*/
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	/*
	 |--------------------------------------------------------------------------
	 | Constant Definition (*REQUIRES CHANGE*)
	 |--------------------------------------------------------------------------
	 */
		define ('DS','/');
        define ('ROOT_URI', 'http://localhost/webshop/'); # 'C:\Program Files (x86)\XAMPP\htdocs\\
		define ('BASE_URI', 'http://localhost/webshop/'); # E.g. C:\wamp\www\webshop\\
//		define ('CACHE_URI', ''); # E.g. C:\Program Files (x86)\XAMPP\htdocs\barcode-generator\public_html\cache\\
//		define ('PUBLIC_URL', ''); # E.g. http://localhost/barcode-generator/public_html/
//		define ('CACHE_URL', '');  # E.g. http://localhost/barcode-generator/public_html/cache/

$file_path = 'http://localhost/training/artbook';