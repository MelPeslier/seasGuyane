<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RessourcesController extends AbstractController
{
    /**
     * @Route("ressources", name="app_ressources")
     */
    public function index(): Response
    {
        return $this->render('ressources/index.html.twig', []);
    }
}
