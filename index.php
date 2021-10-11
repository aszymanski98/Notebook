<?php

declare(strict_types=1);

namespace App;

require_once("./src/Utils/debug.php");
require_once("./src/Controller.php");
require_once("./src/Exception/AppException.php");

use App\Exception\AppException;
use App\Exception\ConfigurationException;

$configuration = require_once("./config/config.php");

// error_reporting(0);
// ini_set('display_errors', '0');

$request = [
  'get' => $_GET,
  'post' => $_POST
];

try {
  Controller::initConfiguration($configuration);
  (new Controller($request))->run();
} catch (AppException $e) {
  echo ("<h1>An error has occurred in the application</h1>");
  echo ("<h3>" . $e->getMessage() . "</h3>");
} catch (\Throwable $e) {
  echo ("<h1>An error has occurred in the application</h1>");
}
