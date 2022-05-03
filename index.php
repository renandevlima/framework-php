<?php
ini_set("default_charset", "UTF-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

// If you want just Rest responses, comment the line below
// header("Content-type: application/json; charset=utf-8");

use Core\Core;

require_once 'vendor/autoload.php';
require_once 'app/core/Core.php';
require_once 'lib/Database/Connection.php';

// add all your controllers below
require_once 'app/controller/IndexController.php';
require_once 'app/controller/ExampleController.php';

// add all your models below
require_once 'app/model/Example.php';


// If you want just Rest responses, comment the five lines below
$loader = new \Twig\Loader\FilesystemLoader('app/view');
$twig = new \Twig\Environment($loader, [
  'cache' => 'app/view/cache',
  'auto_reload' => true
]);

$env = parse_ini_file('./.env');
$core = new Core;

// If you want just Rest responses, comment the line below
echo $core->start($_GET);

// If you want just Rest responses, uncomment the line below
// die(json_encode($core->start($_GET), JSON_UNESCAPED_UNICODE));
