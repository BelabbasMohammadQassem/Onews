<?php

namespace App\Controller\Front;

use App\Entity\Comment;
use App\Entity\Trip;
use App\Form\AddCommentType;
use App\Helper\CommentHelper;
use App\Helper\UserHelper;
use App\Repository\TripRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class TripController extends AbstractController
{
    #[Route('/trip', name: 'app_trip_browse', methods:"GET")]
    #[Route('/', name: 'app_home', methods:"GET")]
    public function browse(TripRepository $tripRepo, CommentHelper $commentHelper): Response
    {
        // 1. préparer les données
        // ici récupérer tous les trips
        // donc on veut faire un select => Repository
        $allTrips = $tripRepo->findAll();
        

        return $this->render('front/trip/browse.html.twig', [
            'tripList' => $allTrips,
            'commentHelper' => $commentHelper
        ]);
    }

    #[Route('/trip/{id}', name: 'app_trip_read', methods:"GET", requirements: ["id" => "\d+"])]
    public function read(Trip $trip): Response
    {
        // 1. préparer les données
        // ici récupérer le Trip qui a l'id fournit dans l'url
        //  a - on récupère l'id, on récupère un repository et on fait un find
        //    - il faut aussi penser à vérifier si l'élément a été trouvé
        // $trip = $tripRepo->find($id);
        // if (is_null($trip))
        // {
        //     throw new NotFoundHttpException('Voyage non trouvé');
        // }
        //  b - on demande de récupérer automatiquement un objet qui correspond à l'id
        //    - la page 404 est gérée automatiquement
        return $this->render('front/trip/read.html.twig', [
            'trip' => $trip,
        ]);
    }

    #[Route('/trip/{id}/comment', name: 'app_trip_add_comment', methods:["GET", "POST"], requirements: ["id" => "\d+"])]
    #[IsGranted('ROLE_USER')]
    public function addComment(Trip $trip, EntityManagerInterface $em, Request $request, UserHelper $userHelper): Response
    {
        if (! $userHelper->canAddComment($this->getUser()))
        {
            throw new AccessDeniedException();
        }
        // on crée une entité
        $comment = new Comment();

        // on crée un formulaire 
        $commentForm = $this->createForm(AddCommentType::class);

        // on le relie à l'entité que l'on a créé
        $commentForm->setData($comment);

        // le composant formulaire 
        //  vérifie si la requete est en post
        //  si oui il récupère les données et remplit l'entité fournie dans setData
        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid())
        {
            // associer le commentaire au voyage dont l'id est dans l'url
            $comment->setTrip($trip);
            // associer le commentaire à l'utilisateur connecté
            $user = $this->getUser();
            $comment->setUser($user);

            $em->persist($comment);

            $em->flush();

            // todo ajouter un message flash

            return $this->redirectToRoute('app_trip_read', ["id" => $trip->getId()] );
        }

        return $this->render('front/trip/add_comment.html.twig', [
            'addCommentForm' => $commentForm
        ]);
    }
}
