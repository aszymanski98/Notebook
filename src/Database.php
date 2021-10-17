<?php

declare(strict_types=1);

namespace App;

use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;
use App\Exception\StorageException;

class Database
{

  private \PDO $conn;

  public function __construct(array $config)
  {
    try {
      $this->validateConfig($config);
      $this->createConnection($config);
    } catch (\PDOException $e) {
      throw new StorageException('Connection error');
    }
  }

  public function getNote(int $id): array
  {
    try {
      $query = "SELECT * 
      FROM notes
      WHERE id = $id";

      $result = $this->conn->query($query);
      $note = $result->fetch(\PDO::FETCH_ASSOC);
    } catch (\Throwable $e) {
      throw new StorageException('Failed getting note details', 400, $e);
    }

    if (!$note) {
      throw new NotFoundException("Note with id $id does no exist");
      exit('This note does not exist');
    }
    return $note;
  }

  public function getNotes(): array
  {
    try {
      $query = "SELECT id, title, inserted_ts
      FROM notes";

      $result = $this->conn->query($query);
      return $result->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\Throwable $e) {
      throw new StorageException('Failed getting notes data', 400, $e);
    }
  }

  public function createNote(array $data): void
  {
    try {
      $title = $this->conn->quote($data["title"]);
      $description = $this->conn->quote($data["description"]);

      $query = "INSERT INTO notes(title, description) 
      VALUES ($title, $description)";

      $this->conn->exec($query);
    } catch (\Throwable $e) {
      throw new StorageException('Failed to create new note', 400, $e);
    }
  }

  public function editNote(int $id, array $data): void
  {
    try {
      $title = $this->conn->quote($data['title']);
      $description = $this->conn->quote($data['description']);

      $query = "UPDATE notes
      SET title = $title, description = $description, updated_ts = current_timestamp
      WHERE id = $id";

      $this->conn->exec($query);
    } catch (\Throwable $e) {
      throw new StorageException('Failed to edit note', 400, $e);
    }
  }

  private function createConnection(array $config): void
  {
    $this->conn = new \PDO(
      "mysql:dbname={$config['database']};host={$config['host']}",
      $config['user'],
      $config['password'],
      [
        \PDO::ERRMODE_EXCEPTION,
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
