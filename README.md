# Easily Parse PHP .env Files!
  
## Installation
via Composer:
```bash
$ composer require 9kinc/easyphpenvpp
```
or
Include easyphpenvpp.php in your script  

## Usage

```php
require "easyphpenvpp.php"; // include the class

$file_dir = '.env';
$easyenv = new EasyPHPEnvPP($file_dir); 

echo "<pre>";
print_r($easyenv->print_data()); 
echo "</pre>";

// ## functions
// $easyenv->get_file_found(); # Use this to see if file was found
// $easyenv->get_data_list(); # Array with key and value data inside , use for loop to get these values!
// $easyenv->get_errors(); # Array containing all the errors


// test
echo "<hr> Key APP_URL: " .$_ENV["APP_URL"]; 
echo "<hr> Key APP_NAME: " .$_SERVER["APP_NAME"]; 
```

You can use $_SERVER or $_ENV to get your values!

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
