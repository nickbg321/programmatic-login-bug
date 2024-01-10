<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\InMemoryUser;

class GuestController extends AbstractController
{
    public function __construct(
        private readonly Security $security,
    ) {
    }

    #[Route('/guest/login', methods: ['GET'])]
    public function login(): Response
    {
        $user = new InMemoryUser('john@example.com', '$2y$13$JLVLxecdG0PxaRA0S8Lkgu7ipSzBQ9hnnlVPtRlYLLn.ooq6F4.OC', ['ROLE_ADMIN']);

        $this->security->login($user, 'security.authenticator.form_login.main', 'main');

        return new Response('You should now be logged in the main firewall.');
    }
}
