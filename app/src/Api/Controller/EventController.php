<?php

namespace App\Api\Controller;

use App\Api\Provider\EventProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EventController extends AbstractController
{
    private EventProvider $eventProvider;
    private SerializerInterface $serializer;

    public function __construct(EventProvider $eventProvider, SerializerInterface $serializer)
    {
        $this->eventProvider = $eventProvider;
        $this->serializer = $serializer;
    }

    #[Route('/api/events', name: 'api.events.get', methods: ['GET'])]
    public function get(): Response
    {
        return new Response($this->serializer->serialize($this->eventProvider->provide(), 'json'), 200, ['Content-Type' => 'application/json']);
    }

    #[Route('/api/events/{id}', name: 'api.events.get_by_id', methods: ['GET'])]
    public function getById(int $id): Response
    {
        return new Response($this->serializer->serialize($this->eventProvider->provide(), 'json'), 200, ['Content-Type' => 'application/json']);
    }
}
