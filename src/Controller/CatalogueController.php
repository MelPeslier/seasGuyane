<?php

namespace App\Controller;

use App\Entity\DonneeSeas;
use App\Form\DonneeSeasType;
use App\Repository\DonneeSeasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CatalogueController extends AbstractController
{
    // *****************************************************************************************************
    // Retourne la page pour afficher toutes les données
    // *****************************************************************************************************

    #[Route(path: 'catalogue', name: 'app_catalogue', methods: ['GET'])]
    public function index(DonneeSeasRepository $repo): Response
    {
        return $this->render('catalogue/index.html.twig', ['donneeSeas' => $repo-> findBy([])]);
    }



    // *****************************************************************************************************
    // Retourne la page du formulaire de remplissage 'la création d'une donnée SEAS'
    // *****************************************************************************************************

    #[Route(path: 'catalogue/creer', name: 'app_catalogue_creer', methods: ['GET', 'POST'])]
    public function creer(Request $request, EntityManagerInterface $em): Response
    {
        $ds = new DonneeSeas;

        $form = $this->createForm(DonneeSeasType::class, $ds);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ds->setUser($this->getUser());
            $em->persist($ds);
            $em->flush();

            $this->addFlash('success','Donnée Seas créer avec succès');

            return $this->redirectToRoute('app_catalogue');
        }

        return $this->render('catalogue/creer.html.twig', [
            'form' => $form->createView()
        ]);
    }



    // *****************************************************************************************************
    // Retourne la page pour afficher une explication détaillée
    // *****************************************************************************************************

    #[Route(path: 'catalogue/{id<[0-9]+>}', name: 'app_catalogue_afficher', methods: ['GET'])]
    public function afficher(DonneeSeas $ds): Response
    {
        return $this->render('catalogue/afficher.html.twig', compact('ds'));
    }



    // *****************************************************************************************************
    // Retourne la page pour modifier une donnée SEAS
    // *****************************************************************************************************

    #[Route(path: 'catalogue/{id<[0-9]+>}/modifer', name: 'app_catalogue_modifier', methods: ['GET', 'POST'])]
    public function modifier(Request $request, DonneeSeas $ds, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(DonneeSeasType::class, $ds, []);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $em->flush();

            $this->addFlash('success','Donnée SEAS modifier avec succès');

            return $this->redirectToRoute('app_catalogue');
        }

        return $this->render('catalogue/modifier.html.twig', [
            'donneeSeas' => $ds,
            'form' => $form->createView()
        ]);
    }



    // *****************************************************************************************************
    // Retourne la page avec toutes les données et supprime la donnée sélectionnée
    // *****************************************************************************************************

    #[Route(path: 'catalogue/{id<[0-9]+>}', name: 'app_catalogue_supprimer', methods: ['POST'])]
    public function supprimer(Request $request,DonneeSeas $ds, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('supprimer_ds_' . $ds->getId(), $request->request->get('pas_un_token_csrf'))) {
            $em->remove($ds);
            $em->flush();

            $this->addFlash('info','Donnée SEAS supprimer avec succès');
        }
        return $this->redirectToRoute('app_catalogue');
    }
}
