<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'employe_dashboard')]
    public function employe(): Response
    {
        return $this->render('dashboard/employeDashboard.html.twig');
    }

    #[Route('/espritMobilité', name: 'student_dashboard')]
    public function student(): Response
    {
        return $this->render('dashboard/studentDashboard.html.twig');
    }
}
