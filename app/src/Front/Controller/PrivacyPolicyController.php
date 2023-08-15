<?php

namespace App\Front\Controller;

use App\Form\FiltersType;
use App\Provider\EventProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivacyPolicyController extends AbstractFrontController
{
    #[Route('/privacy', name: 'front.privacy')]
    public function home(Request $request, EventProvider $eventProvider): Response
    {


        return $this->render('/pages/privacy.html.twig', [
            'pageName' => $this->pageName(),
            'pageClass' => $this->pageClass()
        ]);
    }

    public function pageName(): string
    {
        return 'Polityka Prywatności';
    }

    public function pageClass(): string
    {
        return 'privacy';
    }
}
