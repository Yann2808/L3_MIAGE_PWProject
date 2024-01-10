<?php

// namespace App\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

// class SecurityController extends AbstractController
// {
//     #[Route('/security', name: 'app_security')]
//     public function index(): Response
//     {
//         return $this->render('security/index.html.twig', [
//             'controller_name' => 'SecurityController',
//         ]);
//     }
// }

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\LoginFormType;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    // public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    // {
    //     $error = $authenticationUtils->getLastAuthenticationError();
    //     $lastUsername = $authenticationUtils->getLastUsername();

    //     $form = $this->createForm(LoginFormType::class);

    //     return $this->render('security/login.html.twig', [
    //         'last_username' => $lastUsername,
    //         'error' => $error,
    //         'form' => $form->createView(),
    //     ]);
    // }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
