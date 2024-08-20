<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\RegistredStudents;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SignupController extends AbstractController
{
    #[Route('/signup', name: 'app_signup')]
    public function index(): Response
    {
        return $this->render('signup/signup.html.twig');
    }

    #[Route('/signup/z', name: 'action_signup')]
    public function signup( ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher, SessionInterface $session): Response
    {
        $student = new RegistredStudents();
        $em= $doctrine->getManager();

        $nom=$request->request->get('nom');
        $prenom=$request->request->get('prenom');
        $idUniversitaire=$request->request->get('idUniversitaire');
        $cin=$request->request->get('cin');
        $emailUniversitaire=$request->request->get('emailUniversitaire');
        $emailPersonnel=$request->request->get('emailPersonnel');
        $password=$request->request->get('password');

        $hashedPassword = $passwordHasher->hashPassword(
            $student,
            $password 
        );

        $student->setNomEtudiant($nom);
        $student->setPrenomEtudiant($prenom);
        $student->setIdEtudiantUniversitaire($idUniversitaire);
        $student->setCin($cin);
        $student->setEmailUniversitaire($emailUniversitaire);
        $student->setEmailPersonnel($emailPersonnel);
        $student->setMotDePasseEtudiant($hashedPassword);

        $em->persist($student);
        $em->flush();

        $session->set('student_id', $student->getIdEtudiant());

        return new Response('done, y re id is:' .$student->getIdEtudiant());
    }
}
