<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Entity\Client;
use App\Entity\Reservation;
use App\Form\ResaClientType;
use App\Repository\ChambreRepository;
use App\Repository\ClientRepository;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/login')]

class ResaClientController extends AbstractController
{
    #[Route('/resa/client/{id}', name: 'resa_client')]
    public function index( Reservation $reservation ): Response
    {   
        return $this->render('resa_client/index.html.twig', [ "reservation" => $reservation
        ]);
    }

    #[Route('/resa/nouvelle/', name: 'reservation_new', methods: ['GET', 'POST'])]
    public function new( Request $request, EntityManagerInterface $entityManager, ChambreRepository $cr, ReservationRepository $rf): Response
    {   

        $reservation = new Reservation();
        $reservation->setClient( $this->getUser());
        $form = $this->createForm(ResaClientType::class, $reservation);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();
           
            
            $this->addFlash("success","Le Novachidine vous remercie pour votre réservation, voici le détail de votre séjour");
            return $this->redirectToRoute('resa_client', [ "id" => $reservation->getId() ], Response::HTTP_SEE_OTHER);

        }

        return $this->renderForm('resa_client/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
            'chambres' => $cr->findAll(),
            "reservationsfaites" => $rf->reservationsfaites()

            

        ]);
    }

}
