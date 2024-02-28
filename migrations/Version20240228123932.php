<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228123932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__utilisateurs AS SELECT id, email, roles, password, telephone, siret, date_creation, date_modification FROM utilisateurs');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('CREATE TABLE utilisateurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, food_truck_id INTEGER DEFAULT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, siret VARCHAR(255) DEFAULT NULL, date_creation DATE NOT NULL, date_modification DATE NOT NULL, CONSTRAINT FK_497B315EEED85B8C FOREIGN KEY (food_truck_id) REFERENCES food_truck (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO utilisateurs (id, email, roles, password, telephone, siret, date_creation, date_modification) SELECT id, email, roles, password, telephone, siret, date_creation, date_modification FROM __temp__utilisateurs');
        $this->addSql('DROP TABLE __temp__utilisateurs');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EE7927C74 ON utilisateurs (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EEED85B8C ON utilisateurs (food_truck_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__utilisateurs AS SELECT id, email, roles, password, telephone, siret, date_creation, date_modification FROM utilisateurs');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('CREATE TABLE utilisateurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, siret VARCHAR(255) DEFAULT NULL, date_creation DATE NOT NULL, date_modification DATE NOT NULL)');
        $this->addSql('INSERT INTO utilisateurs (id, email, roles, password, telephone, siret, date_creation, date_modification) SELECT id, email, roles, password, telephone, siret, date_creation, date_modification FROM __temp__utilisateurs');
        $this->addSql('DROP TABLE __temp__utilisateurs');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EE7927C74 ON utilisateurs (email)');
    }
}
