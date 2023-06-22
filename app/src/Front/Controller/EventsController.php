<?php

namespace App\Front\Controller;

use App\Form\FiltersType;
use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractFrontController
{
    #[Route('/', name: 'front.events')]
    public function home(Request $request, EventRepository $eventRepository): Response
    {
        $filtersForm = $this->createForm(FiltersType::class);

        $filtersForm->handleRequest($request);

        $filters = null;

        if ($filtersForm->isSubmitted()) {
            $filters = $filtersForm->getData();
        }

        $events = null;

        return $this->render('/pages/events.html.twig', [
            'pageName' => $this->pageName(),
            'events' => $events,
            'filtersForm' => $filtersForm->createView(),
            'pageClass' => $this->pageClass()
        ]);
    }

    public function pageName(): string
    {
        return 'Strona główna';
    }

    public function pageClass(): string
    {
        return 'events';
    }
}
