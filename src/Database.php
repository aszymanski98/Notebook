<?php

declare(strict_types=1);

namespace App;

require_once("./src/Exception/StorageException.php");
require_once("./src/Exception/ConfigurationException.php");

use App\Exception\ConfigurationException;
use App\Exception\StorageException;
use PDOException;
use PDO;

class Database
{
  public function __construct(array $config)
  {
    try {
      $this->validateConfig($config);

      $connection = new PDO(
        "mysql:dbname={$config['database']};host={$config['host']}",
        $config['user'],
        $config['password']
      );
    } catch (PDOException $e) {
      throw new StorageException('Connection error');
    }
  }

  private function validateConfig(array $config): void
  {
    if (
      empty($config['database'])
      || empty($config['host'])
      || empty($config['user'])
      || empty($config['password'])
    ) {
      throw new ConfigurationException('Storage configuration error');
    }
  }
}
