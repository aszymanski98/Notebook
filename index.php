<?php

declare(strict_types=1);

namespace App;

require_once("./src/Utils/debug.php");
require_once("./src/View.php");

const DEFAULT_PAGE = 'list';

$action = $_GET['action'] ?? DEFAULT_PAGE;

$view = new View();

$view->render($action);
