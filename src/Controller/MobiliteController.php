<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Mobilite;


class MobiliteController extends AbstractController
{
    #[Route('/dashboard/mobilité', name: 'app_mobilite')]
    public function mobility(): Response
    {
        return $this->render('mobilite/addMobility.html.twig');
    }

    #[Route('/dashboard/mobilité/ajouter', name: 'add_mobilite')]
    public function addMobility(ManagerRegistry $doctrine, Request $request): Response
    {

        $em = $doctrine->getManager();
        $mobilite = new Mobilite();

        $nomEcole = $request->request->get('nomEcole');
        $siteWeb = $request->request->get('siteWeb');       
        $niveau = $request->request->get('niveau');
        $specialite = $request->request->get('specialite'); 
        $option = $request->request->get('option'); 
        $nbreTotal = $request->request->get('nbrePlace'); 

        $mobilite->setNomUniversité($nomEcole);
        $mobilite->setSiteWeb($siteWeb);
        $mobilite->setNiveau($niveau);
        $mobilite->setSpecialite($specialite);
        $mobilite->setOption($option);
        $mobilite->setDateDeCreation(new \DateTime('today'));
        if($nbreTotal){
            $mobilite->setNbreDePlaceTotal($nbreTotal);
        }
        else {
            $mobilite->setNbreDePlaceTotal(null);
        }

        $em->persist($mobilite);
        $em->flush();

        return new Response('Mobility added successfully');
    }

    #[Route('/dashboard/listeMobilité', name: 'list_mobilite')]
    public function listMobility(): Response
    {
        return $this->render('mobilite/listMobility.html.twig');
    }

}

