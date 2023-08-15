<?php

namespace App\Front\Controller;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsShowController extends AbstractFrontController
{
    private EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    #[Route('/show/{id}', name: 'front.events.show')]
    public function create(Request $request, int $id): Response
    {
        $event = $this->eventRepository->find($id);

        return $this->render('/pages/show_event.html.twig', [
            'pageName' => $this->pageName(),
            'event' => $event,
            'pageClass' => $this->pageClass()
        ]);
    }

    public function pageName(): string
    {
        return 'Pokaż wydarzenie';
    }

    public function pageClass(): string
    {
        return 'show-event';
    }
}
