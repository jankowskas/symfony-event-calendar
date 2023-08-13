<?php

namespace App\Finder;

use App\Entity\Age;
use App\Entity\BowType;
use App\Entity\Round;
use App\Repository\EventRepository;


class EventFinder
{

    private EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function find(?array $criteria = []): array
    {
        $events = $this->eventRepository->findAll();

        $eventsToReturn = [];

        foreach ($events as $i => $event) {

            if (isset($criteria['search']) && !is_null($criteria['search']) && !str_contains(strtolower($event->getTitle()), strtolower($criteria['search']))) {
                continue;
            }

            if(isset($criteria['associations']) && !empty($criteria['associations']) && !in_array($event->getAssociation()->getId(), $criteria['associations'])) {
                continue;
            }

            if(isset($criteria['bowTypes']) && !empty($criteria['bowTypes'])) {
                $bowTypesIds = array_map(function($bowType) {
                    /** @var BowType $bowType */
                    return $bowType->getId();
                }, $event->getBowTypes()->toArray());

                if (empty(array_intersect($bowTypesIds, $criteria['bowTypes']))) {
                    continue;
                }
            }

            if (isset($criteria['rounds']) && !empty($criteria['rounds'])) {
                $roundsIds = array_map(function($round) {
                    /** @var Round $round */
                    return $round->getId();
                }, $event->getRounds()->toArray());

                if (empty(array_intersect($roundsIds, $criteria['rounds']))) {
                    continue;
                }
            }

            if (isset($criteria['ages']) && !empty($criteria['ages'])) {
                $agesIds = array_map(function($age) {
                    /** @var Age $age */
                    return $age->getId();
                }, $event->getAges()->toArray());

                if (empty(array_intersect($agesIds, $criteria['ages']))) {
                    continue;
                }
            }

            if(isset($criteria['organizers']) && !empty($criteria['organizers']) && !in_array($event->getOrganizer()->getId(), $criteria['organizers'])) {
                continue;
            }

            $eventsToReturn[] = $event;
        }

        return $eventsToReturn;
    }
}