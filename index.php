<?php

declare(strict_types=1);

namespace App;

require_once("./src/Utils/debug.php");
require_once("./src/NoteController.php");
require_once("./src/Request.php");
require_once("./src/Exception/AppException.php");

use App\Exception\AppException;
use App\Exception\ConfigurationException;

$configuration = require_once("./config/config.php");

// error_reporting(0);
// ini_set('display_errors', '0');

$request = new Request($_GET, $_POST);

try {
  AbstractController::initConfiguration($configuration);
  (new NoteController($request))->run();
} catch (ConfigurationException $e) {
  echo "<h1>An error has occurred in the application</h1>";
  echo "Problem with application, try again later";
} catch (AppException $e) {
  echo "<h1>An error has occurred in the application</h1>";
  echo "<h3>" . $e->getMessage() . "</h3>";
} catch (\Throwable $e) {
  echo "<h1>An error has occurred in the application</h1>";
  //dump($e);
}
