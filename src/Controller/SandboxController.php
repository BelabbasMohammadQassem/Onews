<?php

namespace App\Controller;

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
}