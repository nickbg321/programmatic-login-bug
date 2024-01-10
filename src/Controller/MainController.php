<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class MainController extends AbstractController
{
    #[Route('/protected', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function protected(): Response
    {
        return new Response('This is a protected route. If you can access it, you are correctly logged in!');
    }

    #[Route('/login', methods: ['GET'])]
    public function login(): Response
    {
        return new Response('Please log in');
    }
}
