<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\GalerieType;
use App\Repository\GalerieRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/galerie')]
class GalerieController extends AbstractController
{
    #[Route('/', name: 'galerie_index', methods: ['GET'])]
    public function index(GalerieRepository $galerieRepository): Response
    {
        return $this->render('galerie/index.html.twig', [
            'galeries' => $galerieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'galerie_new', methods: ['GET', 'POST'])]
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        $galerie = new Galerie();
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if( $fichier = $form->get("image")->getData() ){

                $nomFichier = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME); 
                $nomFichier = str_replace(" ", "_", $nomFichier);
                $nomFichier .= uniqid() . "." . $fichier->guessExtension();
                $fichier->move($this->getParameter( "dossier_images" ), $nomFichier);
                $galerie->setImage($nomFichier);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($galerie);
            $entityManager->flush();

            return $this->redirectToRoute('galerie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('galerie/new.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'galerie_show', methods: ['GET'])]
    public function show(Galerie $galerie): Response
    {
        return $this->render('galerie/show.html.twig', [
            'galerie' => $galerie,
        ]);
    }

    #[Route('/{id}/edit', name: 'galerie_edit', methods: ['GET', 'POST'])]
    public function edit(EntityManagerInterface $em, Request $request, Galerie $galerie): Response
    {
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            if( $fichier = $form->get("image")->getData() ){

                $nomFichier = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME); 
                $nomFichier = str_replace(" ", "_", $nomFichier);
                $nomFichier .= uniqid() . "." . $fichier->guessExtension();
                $fichier->move($this->getParameter( "dossier_images" ), $nomFichier);
                $galerie->setImage($nomFichier);
            }
            $this->getDoctrine()->getManager()->flush();
           

            return $this->redirectToRoute('galerie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('galerie/edit.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'galerie_delete', methods: ['POST'])]
    public function delete(Request $request, Galerie $galerie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$galerie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($galerie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('galerie_index', [], Response::HTTP_SEE_OTHER);
    }
}
