<?php

declare(strict_types=1);

namespace App;

require_once("./src/Exception/StorageException.php");
require_once("./src/Exception/ConfigurationException.php");

use App\Exception\ConfigurationException;
use App\Exception\StorageException;
use PDOException;
use PDO;
use Throwable;

class Database
{

  private PDO $conn;

  public function __construct(array $config)
  {
    try {
      $this->validateConfig($config);
      $this->createConnection($config);
    } catch (PDOException $e) {
      throw new StorageException('Connection error');
    }
  }

  public function createNote(array $data): void
  {
    try {
      $title = $this->conn->quote($data["title"]);
      $description = $this->conn->quote($data["description"]);

      $query = "INSERT INTO notes(title, description) VALUES ($title, $description)";

      $this->conn->exec($query);
    } catch (Throwable $e) {
      throw new StorageException('Failed to create new note', 400, $e);
    }
  }

  private function createConnection(array $config): void
  {
    $this->conn = new PDO(
      "mysql:dbname={$config['database']};host={$config['host']}",
      $config['user'],
      $config['password'],
      [
        PDO::ERRMODE_EXCEPTION,
      ]
    );
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
