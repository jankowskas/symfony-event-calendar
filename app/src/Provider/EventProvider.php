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
        return $this->eventFinder->find($filters);
    }
}