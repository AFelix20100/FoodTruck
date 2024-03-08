<?php
namespace App\DataFixtures;

use App\Entity\FoodTruck;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FoodTrucksFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Récupérer le restaurateur depuis les références
        $restaurateur = $this->getReference(UtilisateursFixtures::RESTAURATEUR);

        // Créer un FoodTruck pour le restaurateur
        $foodTruck = new FoodTruck();
        $foodTruck->setNom("La P'tite Crêperie");
        $foodTruck->setDescription("Dégustez des crêpes fraîches et gourmandes préparées avec amour dans notre foodtruck La P'tite Crêperie. Venez découvrir nos délicieuses recettes traditionnelles bretonnes ainsi que des créations originales pour satisfaire toutes vos envies sucrées ou salées.");
        $foodTruck->setRestaurateur($restaurateur);
        $foodTruck->setTelephone("0258965623");
        $foodTruck->setSiret("GDG68S4DF6SS6D");
        $manager->persist($foodTruck);
        $manager->flush();
    }

    public function getDependencies()
    {

        return [
            UtilisateursFixtures::class,
        ];
    }
}
