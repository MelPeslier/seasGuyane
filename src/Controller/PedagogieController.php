<?php

namespace App\Controller;

use App\Entity\Cour;
use App\Form\CourType;
use App\Repository\CourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PedagogieController extends AbstractController
{
    // *****************************************************************************************************
    // Retourne la page pour afficher toutes les explications
    // *****************************************************************************************************
    /**
     * @Route("/pedagogie", name="app_pedagogie")
     */
    public function index(CourRepository $repo): Response
    {
        return $this->render('pedagogie/index.html.twig', ['cours' => $repo-> findAll()]);
    }



    // *****************************************************************************************************
    // Retourne la page pour afficher une explication détaillée
    // *****************************************************************************************************
    /**
     * @Route("/pedagogie/{id<[0-9]+>}", name="app_pedagogie_affiche", methods={"GET"})
     */
    public function affiche(Cour $cour): Response
    {
        return $this->render('pedagogie/affiche.html.twig', compact('cour'));
    }



    // *****************************************************************************************************
    // Retourne la page du formulaire de remplissage
    // *****************************************************************************************************
    /**
     * @Route("/pedagogie/creer", name="app_pedagogie_creer", methods={"GET", "POST"})
     */
    public function creer(Request $request, EntityManagerInterface $em): Response
    {
        $cour = new Cour;

        $form = $this->createForm(CourType::class, $cour);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $em->persist($cour);
            $em->flush();

            return $this->redirectToRoute('app_pedagogie_affiche', ['id' => $cour->getId()]);
        }

        return $this->render('pedagogie/creer.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
