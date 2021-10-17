<?php

declare(strict_types=1);

spl_autoload_register(function (string $classNamespace) {
  $path = str_replace(['\\', 'App/'], ['/', ''], $classNamespace);
  $path = "src/$path.php";
  require_once($path);
});

require_once("./src/Utils/debug.php");

use App\Request;
use App\Controller\AbstractController;
use App\Controller\NoteController;
use App\Exception\AppException;
use App\Exception\ConfigurationException;

$configuration = require_once("./config/config.php");

// error_reporting(0);
// ini_set('display_errors', '0');

$request = new Request($_GET, $_POST, $_SERVER);

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
