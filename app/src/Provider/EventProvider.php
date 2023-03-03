<?php

namespace App\Provider;

use App\Repository\EventRepository;

class EventProvider
{
    private EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function provide(): array
    {
        return $this->eventRepository->findAll();
    }
}