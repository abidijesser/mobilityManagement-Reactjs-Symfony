<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\RegistredStudents;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;





class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(): Response
    {
        return $this->render('login/login.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }

    #[Route('/login/?', name: 'action_login')]
    public function login(Request $request, ManagerRegistry $doctrine, 
    UserPasswordHasherInterface $passwordHasher, RequestStack $requestStack): Response
    {
        $emailUniversitaire = $request->request->get('emailUniversitaire');
        $password = $request->request->get('password');

        $student = $doctrine->getRepository(RegistredStudents::class)->findOneBy(['emailUniversitaire' => $emailUniversitaire]);

        if ($student) {
            if ($passwordHasher->isPasswordValid($student, $password)) {

                $session = $requestStack->getSession();
                $session->start();
                $session->set('student_id', $student->getIdEtudiant());

                $this->addFlash(
                    'notice',
                    'Your changes were saved!'
                );
                
                return $this->redirectToRoute('list_mobilite'); 

            } else {
                return new Response('Mot de passe incorrect.');
            }

        } else {
            return new Response('Email universitaire non trouvé.');
        }
    }


}
