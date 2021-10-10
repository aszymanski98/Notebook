<?php

declare(strict_types=1);

namespace App;

require_once('./src/View.php');

class Controller
{

  private array $postData;
  private array $getData;
  private const DEFAULT_PAGE = 'list';

  public function __construct(array $getData, array $postData)
  {
    $this->getData = $getData;
    $this->postData = $postData;
  }

  public function run(): void
  {
    $action = $this->getData['action'] ?? self::DEFAULT_PAGE;

    $view = new View();

    $viewParams = [];

    switch ($action) {
      case 'create':
        $page = 'create';
        $created = false;

        if (!empty($this->postData)) {
          $created = true;

          $viewParams = [
            "title" => $this->postData['title'],
            "description" => $this->postData['description'],
          ];
        }

        $viewParams['created'] = $created;
        break;
      default:
        $page = 'list';
        $viewParams['resultList'] = 'Here list';
        break;
    }

    $view->render($page, $viewParams);
  }
}
