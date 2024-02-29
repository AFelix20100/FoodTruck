<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
#[Route('/admin')]
class AdminController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
    #[Route('/', name: 'app_admin_index')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
    #[Route('/foodtrucks', name: 'app_admin_foodtrucks')]
    public function foodtrucks(): Response
    {
        return $this->render('admin/foodtrucks.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
    #[Route('/utilisateurs', name: 'app_admin_users')]
    public function users(): Response
    {
        return $this->render('admin/utilisateurs.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
    #[Route('/plats', name: 'app_admin_users')]
    public function plats(): Response
    {
        return $this->render('admin/plats.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
    #[Route('/commandes', name: 'app_admin_users')]
    public function commandes(): Response
    {
        return $this->render('admin/commandes.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
    #[Route('/categories-plats', name: 'app_admin_users')]
    public function categoriesPlats(): Response
    {
        return $this->render('admin/categories-plats.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
