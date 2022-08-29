<?php

namespace App\Controller;

use App\Entity\VehiculeSpe;
use App\Form\DonneeSeasType;
use App\Form\VehiculeSpeType;
use App\Repository\VehiculeRepository;
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
    public function index(): Response
    {
        return $this->render('catalogue/index.html.twig', [
        ]);
    }



// *****************************************************************************************************
// DONNEE SEAS CRUD
// *****************************************************************************************************


    // *****************************************************************************************************
    // Retourne la page du formulaire de remplissage 'la création d'une donnée SEAS'
    // *****************************************************************************************************

    #[Route(path: 'catalogue/creer', name: 'app_catalogue_creer', methods: ['GET', 'POST'])]
    public function creer(Request $request, EntityManagerInterface $em): Response
    {

        return $this->render('catalogue/creer.html.twig', [
        ]);
    }



    // *****************************************************************************************************
    // Retourne la page pour afficher une explication détaillée
    // *****************************************************************************************************

    #[Route(path: 'catalogue/{id<[0-9]+>}', name: 'app_catalogue_afficher', methods: ['GET'])]
    public function afficher(): Response
    {
        return $this->render('catalogue/afficher.html.twig', compact('ds'));
    }



    // *****************************************************************************************************
    // Retourne la page pour modifier une donnée SEAS
    // *****************************************************************************************************

    #[Route(path: 'catalogue/{id<[0-9]+>}/modifer', name: 'app_catalogue_modifier', methods: ['GET', 'POST'])]
    public function modifier(Request $request, EntityManagerInterface $em): Response
    {

        return $this->render('catalogue/modifier.html.twig', [

        ]);
    }



    // *****************************************************************************************************
    // Retourne la page avec toutes les données et supprime la donnée sélectionnée
    // *****************************************************************************************************

    #[Route(path: 'catalogue/{id<[0-9]+>}', name: 'app_catalogue_supprimer', methods: ['POST'])]
    public function supprimer(Request $request, EntityManagerInterface $em): Response
    {

        return $this->redirectToRoute('app_catalogue');
    }
}