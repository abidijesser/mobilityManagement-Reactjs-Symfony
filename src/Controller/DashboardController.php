<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'employe_dashboard')]
    public function employe(SessionInterface $session): Response
    {
        if (!$session->has('user_id') || $session->get('user_type') !== 'employe') {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('dashboard/employeDashboard.html.twig');
    }

    #[Route('/espritMobilité', name: 'student_dashboard')]
    public function student(SessionInterface $session): Response
    {
        if (!$session->has('user_id') || $session->get('user_type') !== 'student') {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('dashboard/studentDashboard.html.twig');
    }
}
