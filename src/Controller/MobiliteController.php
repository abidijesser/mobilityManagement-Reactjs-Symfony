<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MobiliteController extends AbstractController
{
    #[Route('/mobilite', name: 'app_mobilite')]
    public function index(): Response
    {
        return $this->render('mobilite/index.html.twig', [
            'controller_name' => 'MobiliteController',
        ]);
    }
}
