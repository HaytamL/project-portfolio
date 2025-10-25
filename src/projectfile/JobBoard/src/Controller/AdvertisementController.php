<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

final class AdvertisementController extends AbstractController
{
    #[Route('/advertisement', name: 'app_advertisement')]
    public function index(JWTTokenManagerInterface $JWTManager): Response
    {
        $userToken = null;

        if ($this->getUser()) {
            $userToken = $JWTManager->create($this->getUser());
        }


        return $this->render('advertisement/index.html.twig', [
            'userToken' => $userToken,
        ]);
    }
}
