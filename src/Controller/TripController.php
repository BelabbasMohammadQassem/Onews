<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TripController extends AbstractController
{
    #[Route('/trip/demo/probleme', name: 'app_trip_browse', methods:"GET")]
    #[Route('/', name: 'app_trip_home', methods:"GET")]
    public function browse(): Response
    {
        return $this->render('trip/browse.html.twig');
    }

    #[Route('/trip/{id}', name: 'app_trip_read', methods:"GET", requirements: ["id" => "\d+"])]
    public function read(): Response
    {
        return $this->render('trip/read.html.twig');
    }
}