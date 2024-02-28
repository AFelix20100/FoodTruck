<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228194825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__plats AS SELECT id, nom, description, prix, img FROM plats');
        $this->addSql('DROP TABLE plats');
        $this->addSql('CREATE TABLE plats (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, img VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_854A620ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO plats (id, nom, description, prix, img) SELECT id, nom, description, prix, img FROM __temp__plats');
        $this->addSql('DROP TABLE __temp__plats');
        $this->addSql('CREATE INDEX IDX_854A620ABCF5E72D ON plats (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__plats AS SELECT id, nom, description, prix, img FROM plats');
        $this->addSql('DROP TABLE plats');
        $this->addSql('CREATE TABLE plats (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, img VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO plats (id, nom, description, prix, img) SELECT id, nom, description, prix, img FROM __temp__plats');
        $this->addSql('DROP TABLE __temp__plats');
    }
}
