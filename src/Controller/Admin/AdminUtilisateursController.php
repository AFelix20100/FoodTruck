<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateurs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
    public function clients(): Response
    {
        $clients = $this->entityManager->getRepository(Utilisateurs::class)->findByRole("ROLE_CLIENT");
        return $this->render('admin/utilisateurs/clients.html.twig',[
            "clients" => $clients
            ]
        );
    }

    #[Route('/restaurateurs', name: 'app_admin_restaurateurs')]
    public function restaurateurs(): Response
    {
        $restaurateurs = $this->entityManager->getRepository(Utilisateurs::class)->findByRole("ROLE_RESTAURATEUR");
        return $this->render('admin/utilisateurs/restaurateurs.html.twig', [
            'restaurateurs' => $restaurateurs,
        ]);
    }


    #[Route('/administrateurs', name: 'app_admin_administrateurs')]
    public function administrateurs(): Response
    {
        $administrateurs = $this->entityManager->getRepository(Utilisateurs::class)->findByRole("ROLE_ADMIN");
            
        return $this->render('admin/utilisateurs/administrateurs.html.twig', [
            'administrateurs' => $administrateurs,
        ]);
    }

    #[Route('/supprimer/{type}/{id}', name: 'app_admin_supprimer_utilisateur')]
    public function supprimerUtilisateur(string $type, Utilisateurs $utilisateur): RedirectResponse
    {
        $this->entityManager->remove($utilisateur);
        $this->entityManager->flush();

        // Redirection en fonction du type d'utilisateur
        switch ($type) {
            case 'client':
                return $this->redirectToRoute('app_admin_clients');
            case 'restaurateur':
                return $this->redirectToRoute('app_admin_restaurateurs');
            case 'administrateur':
                return $this->redirectToRoute('app_admin_administrateurs');
            default:
                // Redirection par défaut vers une page d'accueil ou une autre page appropriée
                return $this->redirectToRoute('app_home');
        }
    }

}
