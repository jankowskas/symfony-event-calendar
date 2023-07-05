<?php

namespace App\Finder;

use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\Connection;
use PDO;

class EventFinder
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function find(?array $criteria = []): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder
            ->select('e.id, e.title')
            ->from('event', 'e');

        if (isset($criteria['search'])) {
            $queryBuilder
                ->andWhere('e.title LIKE :search')
                ->setParameter('search', '%' . $criteria['search'] . '%', PDO::PARAM_STR);
        }

        if (isset($criteria['associations'])) {
            $queryBuilder
                ->andWhere('e.association_id in (:associations)')
                ->setParameter('associations', $criteria['associations'], ArrayParameterType::INTEGER);
        }

        dump($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return $queryBuilder->executeQuery()->fetchAllAssociative();
    }
}