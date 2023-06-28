<?php

namespace App\Finder;

use Doctrine\DBAL\Connection;

class EventFinder
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function find(?array $criteria = []): array
    {
        return [];
    }
}