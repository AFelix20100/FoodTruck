<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use function PHPUnit\Framework\isJson;

#[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
#[Route('/admin/utilisateurs')]
class AdminUtilisateursController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[IsGranted('ROLE_ADMIN', message: 'Pas le droit ! Tire toi de là !')]
    #[Route('/clients', name: 'app_admin_clients')]
    public function index(): Response
    {
        $clients = $this->entityManager->getRepository(Utilisateurs::class)->findClients();
        return $this->render('admin/index.html.twig',[
            "clients" => $clients]
        );
    }

    #[Route('/restaurateurs', name: 'app_admin_restaurateurs')]
    public function foodtrucks(): Response
    {
        // $restaurants = $this->entityManager->getRepository(Utilisateurs::class)->findBy(["roles" => array("ROLE_RESTAURATEUR")]);
        $restaurants = $this->entityManager->getRepository(Utilisateurs::class)->findByRole("ROLE_ADMIN");
        dd($restaurants);
        return $this->render('admin/foodtrucks.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/personnel', name: 'app_admin_personnel')]
    public function users(): Response
    {
        return $this->render('admin/utilisateurs.html.twig', [
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
