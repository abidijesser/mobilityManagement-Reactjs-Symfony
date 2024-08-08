<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegistredStudentsController extends AbstractController
{
    #[Route('/registred/students', name: 'app_registred_students')]
    public function index(): Response
    {
        return $this->render('registred_students/index.html.twig', [
            'controller_name' => 'RegistredStudentsController',
        ]);
    }
}
