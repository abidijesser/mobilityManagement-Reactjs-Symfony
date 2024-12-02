<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CandidaturesController extends AbstractController
{
    #[Route('/dashboard/candidatures', name: 'app_candidatures')]
    public function index(): Response
    {
        $mobilities = [
            ['nom' => 'Abidi', 'prenom' => 'Youssef', 'universite' => 'EUROCOM', 'score' => 85],
            ['nom' => 'Mefahi', 'prenom' => 'Wissem', 'universite' => 'ENIT', 'score' => 40],
            ['nom' => 'Nasri', 'prenom' => 'Jasser', 'universite' => 'Iteam', 'score' => 69],
            ['nom' => 'Naat', 'prenom' => 'Mey', 'universite' => 'ISEP', 'score' => 79],
            ['nom' => 'Temtem', 'prenom' => 'Ahmed', 'universite' => 'Université de Lyon', 'score' => 92],
            ['nom' => 'Ghodhbani', 'prenom' => 'Maha', 'universite' => 'FSM', 'score' => 51],
            ['nom' => 'Youssef', 'prenom' => 'Nour', 'universite' => 'Université de Lyon', 'score' => 92],
            ['nom' => 'Selmaoui', 'prenom' => 'Amine', 'universite' => 'Université de Lyon', 'score' => 57],
            ['nom' => 'Tounsi', 'prenom' => 'Radhi', 'universite' => 'Université de Lyon', 'score' => 92],
            ['nom' => 'Trabelsi', 'prenom' => 'Ghofrane', 'universite' => 'ENIT', 'score' => 92],
            ['nom' => 'Kammoun', 'prenom' => 'Yassine', 'universite' => 'Université de Lyon', 'score' => 71],
        ];

        return $this->render('candidatures/index.html.twig', [
            'mobilities' => $mobilities,
        ]);
    }
}
