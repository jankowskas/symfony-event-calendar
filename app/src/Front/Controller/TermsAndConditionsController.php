<?php

namespace App\Front\Controller;

use App\Form\FiltersType;
use App\Provider\EventProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TermsAndConditionsController extends AbstractFrontController
{
    #[Route('/terms', name: 'front.terms')]
    public function home(Request $request, EventProvider $eventProvider): Response
    {


        return $this->render('/pages/terms.html.twig', [
            'pageName' => $this->pageName(),
            'pageClass' => $this->pageClass()
        ]);
    }

    public function pageName(): string
    {
        return 'Regulamin';
    }

    public function pageClass(): string
    {
        return 'terms';
    }
}
