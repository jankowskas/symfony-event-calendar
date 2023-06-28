<?php

namespace App\Provider;


use App\Finder\EventFinder;

class EventProvider
{

    private EventFinder $eventFinder;

    public function __construct(EventFinder $eventFinder)
    {
        $this->eventFinder = $eventFinder;
    }

    public function provide(?array $filters = []): array
    {
        $criteria = [];

        if (isset($filters['search'])) {
            $criteria['search'] = $filters['search'];
        }

        if (isset($filters['associations']) && is_array($filters['associations'])) {
            $criteria['associations'] = array_column($filters['associations'], 'name');
        }

        if (isset($filters['bowTypes']) && is_array($filters['bowTypes'])) {
            $criteria['bowTypes'] = array_column($filters['bowTypes'], 'name');
        }

        if (isset($filters['classes']) && is_array($filters['classes'])) {
            $criteria['classes'] = array_column($filters['classes'], 'name');
        }

        if (isset($filters['divisions']) && is_array($filters['divisions'])) {
            $criteria['divisions'] = array_column($filters['divisions'], 'name');
        }

        if (isset($filters['rounds']) && is_array($filters['rounds'])) {
            $criteria['rounds'] = array_column($filters['rounds'], 'name');
        }

        return $this->eventFinder->find($criteria);
    }
}