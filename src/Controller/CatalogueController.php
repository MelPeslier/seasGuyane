<?php

namespace App\Controller;

use App\Repository\SeasDataRepository;
use App\Repository\ThemeRepository;
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
    public function index(SeasDataRepository $repo, ThemeRepository $repo_theme): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'values' => $repo->findAll()
            // ,
            // 'themes' => $repo_theme->findAll()
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
}