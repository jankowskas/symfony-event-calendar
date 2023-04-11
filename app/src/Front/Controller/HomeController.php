<?php

namespace App\Front\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractFrontController
{
    #[Route('/', name: 'front.home')]
    public function home(): Response
    {
        return $this->render('/pages/home.html.twig', [
            'pageName' => $this->pageName(),
        ]);
    }

    public function pageName(): string
    {
        return 'Strona główna';
    }
}
