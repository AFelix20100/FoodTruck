<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229082810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, label VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE commande (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_commande DATE NOT NULL, statut VARCHAR(255) NOT NULL, total DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE TABLE composition_commande (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, plats_id INTEGER NOT NULL, commande_id INTEGER NOT NULL, quantite INTEGER NOT NULL, CONSTRAINT FK_30292864AA14E1C8 FOREIGN KEY (plats_id) REFERENCES plats (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_3029286482EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_30292864AA14E1C8 ON composition_commande (plats_id)');
        $this->addSql('CREATE INDEX IDX_3029286482EA2E54 ON composition_commande (commande_id)');
        $this->addSql('CREATE TABLE food_truck (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, img VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE plats (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, img VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_854A620ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_854A620ABCF5E72D ON plats (categorie_id)');
        $this->addSql('CREATE TABLE utilisateurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, food_truck_id INTEGER DEFAULT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, siret VARCHAR(255) DEFAULT NULL, date_creation DATE NOT NULL, date_modification DATE NOT NULL, CONSTRAINT FK_497B315EEED85B8C FOREIGN KEY (food_truck_id) REFERENCES food_truck (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EE7927C74 ON utilisateurs (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EEED85B8C ON utilisateurs (food_truck_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE composition_commande');
        $this->addSql('DROP TABLE food_truck');
        $this->addSql('DROP TABLE plats');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
