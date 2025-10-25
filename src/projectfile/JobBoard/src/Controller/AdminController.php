<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

final class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'app_admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(JWTTokenManagerInterface $JWTManager): Response
    {
        $adminToken = $JWTManager->create($this->getUser());

        return $this->render('admin/index.html.twig', [
            "adminToken" => $adminToken,
        ]);
    }
}
