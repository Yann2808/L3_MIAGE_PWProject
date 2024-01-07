<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106003222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mail_educateur (id INT AUTO_INCREMENT NOT NULL, date_envoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE educateur DROP INDEX IDX_763C012278EEB1EF, ADD UNIQUE INDEX UNIQ_763C012278EEB1EF (licencie_id_id)');
        $this->addSql('ALTER TABLE educateur CHANGE licencie_id_id licencie_id_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mail_educateur');
        $this->addSql('ALTER TABLE educateur DROP INDEX UNIQ_763C012278EEB1EF, ADD INDEX IDX_763C012278EEB1EF (licencie_id_id)');
        $this->addSql('ALTER TABLE educateur CHANGE licencie_id_id licencie_id_id INT DEFAULT NULL');
    }
}
