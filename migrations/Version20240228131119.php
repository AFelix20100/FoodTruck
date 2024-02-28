<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228131119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE composition_commande (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, plats_id INTEGER NOT NULL, commande_id INTEGER NOT NULL, quantite INTEGER NOT NULL, CONSTRAINT FK_30292864AA14E1C8 FOREIGN KEY (plats_id) REFERENCES plats (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_3029286482EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_30292864AA14E1C8 ON composition_commande (plats_id)');
        $this->addSql('CREATE INDEX IDX_3029286482EA2E54 ON composition_commande (commande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE composition_commande');
    }
}
