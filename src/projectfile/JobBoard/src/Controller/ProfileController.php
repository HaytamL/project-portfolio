<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

final class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    #[IsGranted('ROLE_USER')]
    public function index(JWTTokenManagerInterface $JWTManager): Response
    {
        // Si l'utilisateur n'est pas connecté
        if ($this->getUser() == null) {
            return $this->redirectToRoute('app_home');
        }

        $profileToken = $JWTManager->create($this->getUser());


        return $this->render('profile/index.html.twig', [
            "profileToken" => $profileToken,
        ]);
    }
}
