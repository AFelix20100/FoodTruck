<?php
// src/DataFixtures/CategoryFixtures.php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public const CATEGORIE_ENTREE = 'categorie_entree';
    public const CATEGORIE_PLAT_PRINCIPAL = 'categorie_plat_principal';
    public const CATEGORIE_DESSERT = 'categorie_dessert';

    public function load(ObjectManager $manager)
    {
        $categoriesData = [
            ['label' => 'Entrée', 'reference' => self::CATEGORIE_ENTREE],
            ['label' => 'Plat principal', 'reference' => self::CATEGORIE_PLAT_PRINCIPAL],
            ['label' => 'Dessert', 'reference' => self::CATEGORIE_DESSERT],
        ];

        foreach ($categoriesData as $data) {
            $category = new Categorie();
            $category->setLabel($data['label']);
            $manager->persist($category);

            // Ajouter une référence à chaque catégorie
            $this->addReference($data['reference'], $category);
        }

        $manager->flush();
    }
}
