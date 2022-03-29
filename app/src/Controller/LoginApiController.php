<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class LoginApiController extends AbstractController
{
    /**
     *
     * login api function that return the user data after success or return invalid creditionals
     * @param Request $request
     * @return Response $response
     * @Route("/api/shop/login", name="login", methods={"POST"})
     */
    public function login(Request $request): Response
    {
        $user = $this->getUser();
        return $this->json([
            'username' => $user->getUsername(),
            'roles' => $user->getRoles(),
            'apiToken' => $user->getApiToken()
        ]);
    }
}