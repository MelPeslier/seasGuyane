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
     * @Route("/pedagogie", name="app_pedagogie", methods={"GET"})
     */
    public function index(CourRepository $repo): Response
    {
        return $this->render('pedagogie/index.html.twig', ['cours' => $repo-> findBy([], ['createdAt' => 'DESC'])]);
    }



    // *****************************************************************************************************
    // Retourne la page du formulaire de remplissage 'la création du cour'
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

            $this->addFlash('success','Cour créer avec succès');

            return $this->redirectToRoute('app_pedagogie');
        }

        return $this->render('pedagogie/creer.html.twig', [
            'form' => $form->createView()
        ]);
    }



    // *****************************************************************************************************
    // Retourne la page pour afficher une explication détaillée
    // *****************************************************************************************************
    /**
     * @Route("/pedagogie/{id<[0-9]+>}", name="app_pedagogie_afficher", methods={"GET"})
     */
    public function afficher(Cour $cour): Response
    {
        return $this->render('pedagogie/afficher.html.twig', compact('cour'));
    }



    // *****************************************************************************************************
    // Retourne la page pour modifier un cour
    // *****************************************************************************************************
    /**
     * @Route("pedagogie/{id<[0-9]+>}/modifer", name="app_pedagogie_modifier", methods={"GET", "POST"})
     */
    public function modifier(Request $request, Cour $cour, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CourType::class, $cour, []);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $em->flush();

            $this->addFlash('success','Cour modifier avec succès');

            return $this->redirectToRoute('app_pedagogie');
        }

        return $this->render('pedagogie/modifier.html.twig', [
            'cour' => $cour,
            'form' => $form->createView()
        ]);
    }



    // *****************************************************************************************************
    // Retourne la page avec tous les cours et supprime le cour séléctionner
    // *****************************************************************************************************
    /**
     * @Route("pedagogie/{id<[0-9]+>}", name="app_pedagogie_supprimer", methods={"POST"})
     */
    public function supprimer(Request $request,Cour $cour, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('supprimer_cour_' . $cour->getId(), $request->request->get('pas_un_token_csrf'))) {
            $em->remove($cour);
            $em->flush();

            $this->addFlash('info','Cour supprimer avec succès');
        }
        return $this->redirectToRoute('app_pedagogie');
    }
}
