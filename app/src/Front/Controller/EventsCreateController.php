<?php

namespace App\Front\Controller;

use App\Form\EventType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsCreateController extends AbstractFrontController
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/create', name: 'front.events.create')]
    public function create(Request $request): Response
    {
        $form = $this->createForm(EventType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $event = $form->getData();

            $this->entityManager->persist($event);
            $this->entityManager->flush();
        }


        return $this->render('/pages/create_event.html.twig', [
            'pageName' => $this->pageName(),
            'form' => $form->createView(),
            'pageClass' => $this->pageClass()
        ]);
    }

    public function pageName(): string
    {
        return 'Dodaj wydarzenie';
    }

    public function pageClass(): string
    {
        return 'create-event';
    }
}
