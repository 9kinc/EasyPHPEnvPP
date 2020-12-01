<?php

require "easyphpenvpp.php"; // include the class
//require "vendor/autoload.php"; // include the class

$file_dir = '.env';
$easyenv = new EasyPHPEnvPP($file_dir); 

echo "<pre>";
print_r($easyenv->print_data()); 
echo "</pre>";

// test
echo "<hr> Key APP_URL: " .$_ENV["APP_URL"]; 
echo "<hr> Key APP_NAME: " .$_SERVER["APP_NAME"]; 

?>