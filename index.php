<?php

declare(strict_types=1);

namespace App;

require_once("./src/Utils/debug.php");
require_once("./src/View.php");

// error_reporting(0);
// ini_set('display_errors', '0');

const DEFAULT_PAGE = 'list';

$action = $_GET['action'] ?? DEFAULT_PAGE;

$view = new View();

$viewParams = [];

if ($action === 'create') {
  $page = 'create';
  $created = false;

  if (!empty($_POST)) {
    $created = true;

    $viewParams = [
      "title" => $_POST['title'],
      "description" => $_POST['description'],
    ];
  }

  $viewParams['created'] = $created;
} else {
  $page = 'list';
  $viewParams['resultList'] = 'Here list';
}

$view->render($page, $viewParams);
