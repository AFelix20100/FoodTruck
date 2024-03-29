<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Utilisateurs;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTime;

class UtilisateursFixtures extends Fixture
{
    private $passwordHasher;
    public const RESTAURATEUR = "restaurateur";

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        // Création d'un utilisateur administrateur
        $admin = new Utilisateurs();
        $admin->setEmail('admin@gmail.com');
        $admin->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'adminpassword'));
        $admin->setDateCreation(new DateTime());
        $admin->setDateModification(new DateTime());
        $admin->setPseudo("Admin");
        $manager->persist($admin);

        // Création d'un utilisateur régulier
        $user = new Utilisateurs();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordHasher->hashPassword($user, 'userpassword'));
        $user->setDateCreation(new DateTime());
        $user->setDateModification(new DateTime());
        $admin->setPseudo("User");
        $manager->persist($user);

        // Création d'un utilisateur restaurateur
        $restaurateur = new Utilisateurs();
        $restaurateur->setEmail('restaurateur@gmail.com');
        $restaurateur->setRoles(['ROLE_RESTAURATEUR']);
        $restaurateur->setPassword($this->passwordHasher->hashPassword($restaurateur, 'userpassword'));
        $restaurateur->setDateCreation(new DateTime());
        $restaurateur->setDateModification(new DateTime());
        $admin->setPseudo("Resto");
        $manager->persist($restaurateur);

        $manager->flush();

        $this->addReference(self::RESTAURATEUR, $restaurateur);
    }

    public function getDependencies()
    {
        return 
        [
            UtilisateursFixtures::class
        ];
    }
}
