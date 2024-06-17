<?php

namespace App\Controller;

use App\Entity\Country;
use App\Form\CountryType;
use App\Repository\CountryRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SandboxController extends AbstractController
{
    #[Route('/sandbox/doctrine', name: 'app_sandbox_doctrine')]
    public function doctrine(CountryRepository $countryRepository): Response
    {
        $countryList = $countryRepository->findAll();

        return $this->render('sandbox/doctrine.html.twig', [
            'allCountryList' => $countryList,
        ]);
    }

    #[Route('/sandbox/form', name: 'app_sandbox_form', methods: ["POST", "GET"])]
    public function form(Request $request, EntityManagerInterface $em): Response
    {
        $country = new Country();
        $form = $this->createForm(CountryType::class, $country);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            // 3 traiter le formulaire
            $em->persist($country);

            $em->flush();

            // 4 rediriger
            return $this->redirectToRoute('app_sandbox_doctrine');
        }

        return $this->render('sandbox/form.html.twig', [
            'countryForm' => $form,
        ]);
    }


    #[Route('/sandbox/api', name: 'app_sandbox_api_browse', methods: ["GET"])]
    public function apiBrowse(CountryRepository $countryRepository): Response
    {
        $countryList = $countryRepository->findAll();

        return $this->json(data: $countryList, context: ['groups' => 'sandbox_browse']);
    }

    #[Route('/sandbox/api', name: 'app_sandbox_api_add', methods: ["POST"])]
    public function apiAdd(
        EntityManagerInterface $em,
        Request $request, 
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ): Response
    {
        // $country = new Country;
        // récupérer les données
            // récupérer le json de la requete HTTP
            $json = $request->getContent();
            // créer un objet à partir de ce json
            $country = $serializer->deserialize($json, Country::class, 'json');

            dump($country);
        // valider les données

        $errors = $validator->validate($country);
        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging.
             */
            $errorsString = (string) $errors;
    
            return $this->json(data: $errorsString, status: 400);
        }
        // traiter les données
        $em->persist($country);
        $em->flush();

        return $this->json(data: $country, context: ['groups' => 'sandbox_browse']);
    }


    #[Route('/sandbox/api/{id}', name: 'app_sandbox_api_read', methods: ["GET"], requirements: ["id" => "\d+"])]
    public function apiRead($id, CountryRepository $countryRepository): Response
    {
        $country = $countryRepository->find($id);

        if(is_null($country))
        {
            return $this->json(data: ['success' => false, 'msg' => 'Country non trouvée'], status: Response::HTTP_NOT_FOUND);
        }

        return $this->json(data: $country, context: ['groups' => 'sandbox_browse']);
    }
}
