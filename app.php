<?php

// path & url

define("PATH",__DIR__ ."/");
define("URL","http://localhost/TechStore/");

define("APATH",__DIR__ ."/admin/");
define("AURL","http://localhost/TechStore/admin/");




// DB setting
define("DB_SERVERNAME", "localhost");
define("DB_DATEBASENAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "techstore");


// include classes
require (PATH.'vendor/autoload.php');

use  TechStore\Classes\Request;
use  TechStore\Classes\Session;

// objects
$request=new Request;
$session=new Session;




?>