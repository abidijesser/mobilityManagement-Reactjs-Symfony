<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Employe;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EmployeController extends AbstractController
{
    #[Route('/dashboard/employe', name: 'app_employe')]
    public function employe(): Response
    {
        return $this->render('employe/index.html.twig');
    }

    #[Route('/employe/ajouter', name: 'add_employe')]
    public function addEmploye(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $em = $doctrine->getManager();
        $employe = new Employe();

        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');       
        $email = $request->request->get('email');
        $motDePasse = $request->request->get('motdepasse');  

        $hashedPassword = $passwordHasher->hashPassword(
            $employe,
            $motDePasse 
        );

        $employe->setNomEmploye($nom);
        $employe->setPrenomEmploye($prenom);
        $employe->setMotDePasseEmploye($hashedPassword);
        $employe->setEmailEmploye($email);

        $em->persist($employe);
        $em->flush();

        return new Response('User registered successfully');
    }

    // $isValid = $passwordHasher->isPasswordValid($user, $plainPassword);

}

