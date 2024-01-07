<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106012547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mail_contact (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT DEFAULT NULL, date_envoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_96DF675710335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contact_educateur (mail_contact_id INT NOT NULL, educateur_id INT NOT NULL, INDEX IDX_B4FF6D53362CFB6 (mail_contact_id), INDEX IDX_B4FF6D56BFC1A0E (educateur_id), PRIMARY KEY(mail_contact_id, educateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_educateur_educateur (mail_educateur_id INT NOT NULL, educateur_id INT NOT NULL, INDEX IDX_2C2116BA932A6B1A (mail_educateur_id), INDEX IDX_2C2116BA6BFC1A0E (educateur_id), PRIMARY KEY(mail_educateur_id, educateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_96DF675710335F61 FOREIGN KEY (expediteur_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE mail_contact_educateur ADD CONSTRAINT FK_B4FF6D53362CFB6 FOREIGN KEY (mail_contact_id) REFERENCES mail_contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_contact_educateur ADD CONSTRAINT FK_B4FF6D56BFC1A0E FOREIGN KEY (educateur_id) REFERENCES educateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA932A6B1A FOREIGN KEY (mail_educateur_id) REFERENCES mail_educateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA6BFC1A0E FOREIGN KEY (educateur_id) REFERENCES educateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur ADD expediteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mail_educateur ADD CONSTRAINT FK_EE61F4110335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('CREATE INDEX IDX_EE61F4110335F61 ON mail_educateur (expediteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_contact_educateur DROP FOREIGN KEY FK_B4FF6D53362CFB6');
        $this->addSql('ALTER TABLE mail_contact_educateur DROP FOREIGN KEY FK_B4FF6D56BFC1A0E');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA932A6B1A');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA6BFC1A0E');
        $this->addSql('DROP TABLE mail_contact');
        $this->addSql('DROP TABLE mail_contact_educateur');
        $this->addSql('DROP TABLE mail_educateur_educateur');
        $this->addSql('ALTER TABLE mail_educateur DROP FOREIGN KEY FK_EE61F4110335F61');
        $this->addSql('DROP INDEX IDX_EE61F4110335F61 ON mail_educateur');
        $this->addSql('ALTER TABLE mail_educateur DROP expediteur_id');
    }
}
