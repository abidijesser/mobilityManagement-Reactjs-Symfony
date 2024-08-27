<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\RegistredStudents;
use App\Entity\Employe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;



class securityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(SessionInterface $session): Response
    {
        $emailIntrouvable = null;
        $passwordIntrouvable=null;
        
        $session->invalidate();

        return $this->render('login/login.html.twig', [
            'emailIntrouvable' => $emailIntrouvable,
            'passwordIntrouvable' => $passwordIntrouvable
        ]);
    }

    #[Route('/login/?', name: 'action_login')]
    public function login(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher, SessionInterface $session): Response
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        $student = $doctrine->getRepository(RegistredStudents::class)->findOneBy(['emailUniversitaire' => $email]);

        if ($student) {

            if ($passwordHasher->isPasswordValid($student, $password)) {
                $session->set('user_id', $student->getIdEtudiant());
                $session->set('user_type', 'student');

                return $this->redirectToRoute('student_dashboard'); 

            } else {
                $emailIntrouvable = null;
                $passwordIntrouvable="Mot de passe incorrecte.";
                return $this->render('login/login.html.twig', [
                    'emailIntrouvable' => $emailIntrouvable,
                    'passwordIntrouvable' => $passwordIntrouvable
                ]);
            }

        } elseif ($employe = $doctrine->getRepository(Employe::class)->findOneBy(['emailEmploye' => $email])) {

            if ($passwordHasher->isPasswordValid($employe, $password)) {
                $session->set('user_id', $employe->getId());
                $session->set('user_type', 'employe');

                return $this->redirectToRoute('employe_dashboard'); 

            } else {
                $emailIntrouvable = null;
                $passwordIntrouvable="Mot de passe incorrecte.";
                return $this->render('login/login.html.twig', [
                    'emailIntrouvable' => $emailIntrouvable,
                    'passwordIntrouvable' => $passwordIntrouvable
                ]);
            }

        } else {

            $passwordIntrouvable=null;
            $emailIntrouvable="Email n'existe pas.";

            return $this->render('login/login.html.twig', [
                'emailIntrouvable' => $emailIntrouvable,
                'passwordIntrouvable' => $passwordIntrouvable
            ]);
        }
    }

    #[Route('/lougout', name: 'logout_action')]
    public function logout(SessionInterface $session): Response
    {
        $session->invalidate();
        return $this->redirectToRoute('app_login');
    }


}
