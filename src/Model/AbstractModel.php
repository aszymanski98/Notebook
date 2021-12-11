<?php

namespace App\Model;

use App\Exception\ConfigurationException;
use App\Exception\StorageException;

abstract class AbstractModel
{
    protected \PDO $conn;

    public function __construct($config)
    {
        try {
            $this->createConnection($config);
        } catch (\PDOException $e) {
            throw new StorageException('Connection error');
        }
    }

    private function createConnection($config): void
    {
        $this->conn = new \PDO($config);
    }
}