<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\RegistredStudentsRepository;
use App\Entity\RegistredStudents;



class RegistredStudentController extends AbstractController
{
    #[Route('/dashboard/listeEtudiants', name: 'app_list_student')]
    public function index(RegistredStudentsRepository $registredStudentsRepository): Response
    {
        return $this->render('registred_student/index.html.twig', [
            'registredStudents' => $registredStudentsRepository->findAll(),
        ]);
    }

    #[Route('/dashboard/registredstudent/{id<\d+>}', name: 'show_student')]
    public function showClient(EntityManagerInterface $entityManager, $id): Response
    {
        $student = $entityManager->getRepository(RegistredStudents::class)->find($id);
        if (!$student) {
            throw $this->createNotFoundException(
                'No student found for id '.$id
            );
        }
        return $this->render('registred_student/showstudent.html.twig', ['student' => $student]);
    }

    #[Route('/dashboard/registredstudents/update/{id}', name: 'student_update')]
    public function update(Request $request, ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $student= $entityManager->getRepository(RegistredStudents::class)->find($id);
        if (!$student) {
            throw $this->createNotFoundException(
                'No student found for id '
            );
        }

        $currentNom = $student->getNomEtudiant();
        $currentPrenom = $student->getPrenomEtudiant();
        $currentCin = $student->getCin();
        $currentEmailUniversitaire = $student->getEmailUniversitaire();
        $currentIdUniversitaire = $student->getIdEtudiantUniversitaire();

        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $cin = $request->request->get('cin');
        $emailuniversitaire =$request->request->get('emailuniversitaire');
        $idUniversitaire = $request->request->get('idUniversitaire');

        $student->setNomEtudiant($nom ? $nom : $currentNom);
        $student->setPrenomEtudiant($prenom ? $prenom : $currentPrenom);
        $student->setCin($cin ? $cin : $currentCin);
        $student->setEmailUniversitaire($emailuniversitaire ? $emailuniversitaire : $currentEmailUniversitaire);
        $student->setIdEtudiantUniversitaire($idUniversitaire ? $idUniversitaire : $currentIdUniversitaire);

        $entityManager->flush();

        return $this->redirectToRoute('show_student', ['id'=>$id]);
    }

    #[Route('/dashboard/registredstudents/delete/{id}', name: 'student_delete')]
    public function delete(RegistredStudentsRepository $repository, ManagerRegistry $doctrine, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $student= $entityManager->getRepository(RegistredStudents::class)->find($id);
        if (!$student) {
            throw $this->createNotFoundException(
                'No student found for id '.$id
            );
        }
        $entityManager->remove($student);
        $entityManager->flush();

        return $this->redirectToRoute('app_list_student');
    }
}
