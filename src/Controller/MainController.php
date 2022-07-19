<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_intro")
     */
    public function intro(): Response
    {
        return $this->render('main/intro.html.twig', []);
    }

    /**
     * @Route("/accueil", name="app_accueil")
     */
    public function FunctionName(): Response
    {
        return $this->render('main/accueil.html.twig', []);
    }
}
