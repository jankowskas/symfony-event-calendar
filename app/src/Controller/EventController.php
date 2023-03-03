<?php

namespace App\Controller;

use App\Provider\EventProvider;
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
    public function getAction(): Response
    {
        return new Response($this->serializer->serialize($this->eventProvider->provide(), 'json'), 200, ['Content-Type'=>'application/json']);
    }
}