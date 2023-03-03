<?php

namespace App\Provider;

use App\Repository\EventRepository;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

class EventProvider
{
    private EventRepository $eventRepository;
    private TagAwareCacheInterface $cache;

    public function __construct(EventRepository $eventRepository, TagAwareCacheInterface $cache)
    {
        $this->eventRepository = $eventRepository;
        $this->cache = $cache;
    }

    public function provide(): array
    {
        $cacheId = 'events';

        return $this->cache->get($cacheId, function (ItemInterface $item) use ($cacheId) {
            $item->expiresAfter(100);
            $item->tag($cacheId);
            return $this->eventRepository->findAll();
        });
    }
}