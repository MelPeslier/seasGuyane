<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationSeasController extends AbstractController
{
    /**
     * @Route("/presentation-seas", name="app_presentation_seas")
     */
    public function index(): Response
    {
        return $this->render('presentation_seas/index.html.twig', []);
    }
}
