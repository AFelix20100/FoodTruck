<?php

// src/DataFixtures/PlatsFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Plats;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PlatsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Obtenez une référence à la catégorie "Entrée" que vous avez créée dans les fixtures de la catégorie
        $entreeCategory = $this->getReference('categorie_entree');

        // Créez un plat pour la catégorie "Entrée"
        $platEntree = new Plats();
        $platEntree->setNom("Salade César");
        $platEntree->setDescription("Salade verte, blanc de poulet, croûtons, parmesan, sauce césar.");
        $platEntree->setPrix(9.99);
        $platEntree->setCategorie($entreeCategory);
        $manager->persist($platEntree);

        // Répétez ce processus pour d'autres plats et catégories
        // Par exemple, pour le plat principal
        $platPrincipalCategory = $this->getReference('categorie_plat_principal');
        $platPrincipal = new Plats();
        $platPrincipal->setNom("Steak frites");
        $platPrincipal->setDescription("Steak de bœuf grillé accompagné de frites croustillantes.");
        $platPrincipal->setPrix(14.99);
        $platPrincipal->setCategorie($platPrincipalCategory);
        $manager->persist($platPrincipal);

        // Pour les desserts
        $dessertCategory = $this->getReference('categorie_dessert');
        $tarteAuxPommes = new Plats();
        $tarteAuxPommes->setNom("Tarte aux pommes");
        $tarteAuxPommes->setDescription("Délicieuse tarte aux pommes faite maison avec une pâte feuilletée légère et des pommes fraîches.");
        $tarteAuxPommes->setPrix(6.99);
        $tarteAuxPommes->setCategorie($dessertCategory);
        $manager->persist($tarteAuxPommes);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CategorieFixtures::class,
        );
    }
}
