<?php

namespace App\Controller\Back;

use App\Entity\Trip;
use App\Form\Back\TripType;
use App\Repository\TripRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/back/trip', name: 'app_back_trip_')]
class TripController extends AbstractController
{
    #[Route('/', name: 'browse', methods:["GET"])]
    public function browse(TripRepository $tripRepository): Response
    {
        $allTrips = $tripRepository->findAll();

        return $this->render('back/trip/browse.html.twig', [
            'tripList' => $allTrips,
        ]);
    }
    
    #[Route('/{id<\d+>}', name: 'read', methods:["GET"])]
    public function read(): Response
    {
        return $this->render('back/trip/read.html.twig', [
            'controller_name' => 'TripController',
        ]);
    }

    #[Route('/{id<\d+>}/edit', name: 'edit', methods:["GET", "POST"])]
    public function edit(): Response
    {
        return $this->render('back/trip/edit.html.twig', [
            'controller_name' => 'TripController',
        ]);
    }

    #[Route('/add', name: 'add', methods:["GET", "POST"])]
    public function add(EntityManagerInterface $em, Request $request): Response
    {
        $trip = new Trip();

        $form = $this->createForm(TripType::class);
        $form->setData($trip);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            // 
            $em->persist($trip);

            $em->flush();

            $this->addFlash('success', 'Voyage ajouté avec succès');
            return $this->redirectToRoute('app_back_trip_browse');
        }

        return $this->render('back/trip/add.html.twig', [
            'form' => $form,
        ]);
    }


    #[Route('/{id<\d+>}/delete', name: 'delete', methods:["GET", "POST"])]
    public function delete(): Response
    {
        return $this->render('back/trip/delete.html.twig', [
            'controller_name' => 'TripController',
        ]);
    }
}
