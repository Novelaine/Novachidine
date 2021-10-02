<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923104808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tarifs');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tarifs (id INT AUTO_INCREMENT NOT NULL, chambre_simple NUMERIC(5, 2) NOT NULL, chambre_double NUMERIC(5, 2) NOT NULL, chambre_triple NUMERIC(5, 2) NOT NULL, petit_dejeuner NUMERIC(5, 2) NOT NULL, animal NUMERIC(5, 2) NOT NULL, supplement_enfant NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }
}
