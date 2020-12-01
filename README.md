# Easily Parse PHP .env Files!
  
## Installation

Include easyphpenvpp.php in your script  

## Usage

```php
require "easyphpenvpp.php"; // include the class

$file_dir = '.env';
$easyenv = new EasyPHPEnvPP($file_dir); 

echo "<pre>";
print_r($easyenv->print_data()); 
echo "</pre>";

// test
echo "<hr> Key APP_URL: " .$_ENV["APP_URL"]; 
echo "<hr> Key APP_NAME: " .$_SERVER["APP_NAME"]; 
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
