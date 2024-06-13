<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use App\Repository\CountryRepository;
use App\Repository\TagRepository;
use App\Repository\TripRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SandboxController extends AbstractController
{
    #[Route('/sandbox/doctrine', name: 'app_sandbox')]
    public function doctrine(UserRepository $userRepository): Response
    {
        $userList = $userRepository->findAll();

        return $this->render('sandbox/doctrine.html.twig', [
            'allUserList' => $userList,
        ]);
    }

    #[Route('/sandbox/trip', name: 'app_trip_sandbox')]
    public function trip(TripRepository $tripRepository): Response
    {
        $tripList = $tripRepository->findAll();

        return $this->render('sandbox/trip.html.twig', [
            'allTripList' => $tripList,
        ]);
    }


    #[Route('/sandbox/comment', name: 'app_comment_sandbox')]
    public function comment(CommentRepository $commentRepository): Response
    {
        $commentList = $commentRepository->findAll();

        return $this->render('sandbox/trip.html.twig', [
            'allCommentList' => $commentList,
        ]);
    }

    #[Route('/sandbox/country', name: 'app_country_sandbox')]
    public function country(CountryRepository $countryRepository): Response
    {
        $countryList = $countryRepository->findAll();

        return $this->render('sandbox/trip.html.twig', [
            'allCountryList' => $countryList,
        ]);
    }

    #[Route('/sandbox/tag', name: 'app_tag_sandbox')]
    public function tag(TagRepository $tagRepository): Response
    {
        $tagList = $tagRepository->findAll();

        return $this->render('sandbox/trip.html.twig', [
            'allTagList' => $tagList,
        ]);
    }
}