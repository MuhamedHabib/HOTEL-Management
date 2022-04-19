<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419151423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande (iddemande INT AUTO_INCREMENT NOT NULL, nomprenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, datedebut VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(iddemande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (idoffre INT AUTO_INCREMENT NOT NULL, titleoffre VARCHAR(255) NOT NULL, priceoffre VARCHAR(255) NOT NULL, nombreplace VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, style VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(idoffre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE offre');
    }
}
