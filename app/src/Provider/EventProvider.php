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

        dump($filters);

        if (isset($filters['search'])) {
            $criteria['search'] = $filters['search'];
        }

        if (isset($filters['associations']) && is_array($filters['associations'])) {
            $criteria['associations'] = $filters['associations'];
        }


        return $this->eventFinder->find($criteria);
    }
}