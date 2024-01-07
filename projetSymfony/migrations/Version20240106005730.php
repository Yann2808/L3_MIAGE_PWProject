<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106005730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mail_contact (id INT AUTO_INCREMENT NOT NULL, date_envoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_educateur_educateur (mail_educateur_id INT NOT NULL, educateur_id INT NOT NULL, INDEX IDX_2C2116BA932A6B1A (mail_educateur_id), INDEX IDX_2C2116BA6BFC1A0E (educateur_id), PRIMARY KEY(mail_educateur_id, educateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA932A6B1A FOREIGN KEY (mail_educateur_id) REFERENCES mail_educateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA6BFC1A0E FOREIGN KEY (educateur_id) REFERENCES educateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA932A6B1A');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA6BFC1A0E');
        $this->addSql('DROP TABLE mail_contact');
        $this->addSql('DROP TABLE mail_educateur_educateur');
    }
}
