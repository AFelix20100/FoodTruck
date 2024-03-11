<?php

namespace App\Controller\Admin;

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
        return $this->render('admin/index.html.twig');
    }

    #[Route('/foodtrucks', name: 'app_admin_foodtrucks')]
    public function foodtrucks(): Response
    {
        return $this->render('admin/foodtrucks.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/plats', name: 'app_admin_plats')]
    public function plats(): Response
    {
        return $this->render('admin/plats.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/previsions', name: 'app_admin_previsions')]
    public function commandes(): Response
    {
        return $this->render('admin/previsions.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/categories-plats', name: 'app_admin_categories')]
    public function categoriesPlats(): Response
    {
        return $this->render('admin/categories-plats.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
