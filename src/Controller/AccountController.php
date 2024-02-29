<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[IsGranted('ROLE_USER')]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class AccountController extends AbstractController
{
    #[Route('/{id}/mon-compte', name: 'app_account')]
    public function index(Utilisateurs $utilisateur): Response
    {
        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
}
