<?php

namespace App\Controller;

use App\Repository\GalerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/galerie-client')]
class GalerieClientController extends AbstractController
{
    #[Route('/', name: 'galerie_client')]
    public function index(GalerieRepository $galerie): Response
    {
        return $this->render('galerie_client/index.html.twig', [
            "galeries"=>$galerie->findAll(),
            
        ]);
    }
}
