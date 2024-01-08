<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108115748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educateur (id INT AUTO_INCREMENT NOT NULL, licencie_id_id INT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, is_admin TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_763C012278EEB1EF (licencie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, contact_id_id INT DEFAULT NULL, categorie_id_id INT DEFAULT NULL, numero_licence INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, INDEX IDX_3B755612526E8E58 (contact_id_id), INDEX IDX_3B7556128A3C7387 (categorie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contact (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT DEFAULT NULL, date_envoie DATETIME NOT NULL, objet VARCHAR(255) DEFAULT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_96DF675710335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contact_contact (mail_contact_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_94F6F3BB3362CFB6 (mail_contact_id), INDEX IDX_94F6F3BBE7A1254A (contact_id), PRIMARY KEY(mail_contact_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_educateur (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT DEFAULT NULL, date_envoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_EE61F4110335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_educateur_educateur (mail_educateur_id INT NOT NULL, educateur_id INT NOT NULL, INDEX IDX_2C2116BA932A6B1A (mail_educateur_id), INDEX IDX_2C2116BA6BFC1A0E (educateur_id), PRIMARY KEY(mail_educateur_id, educateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE educateur ADD CONSTRAINT FK_763C012278EEB1EF FOREIGN KEY (licencie_id_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612526E8E58 FOREIGN KEY (contact_id_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556128A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_96DF675710335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_contact_contact ADD CONSTRAINT FK_94F6F3BB3362CFB6 FOREIGN KEY (mail_contact_id) REFERENCES mail_contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_contact_contact ADD CONSTRAINT FK_94F6F3BBE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur ADD CONSTRAINT FK_EE61F4110335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA932A6B1A FOREIGN KEY (mail_educateur_id) REFERENCES mail_educateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA6BFC1A0E FOREIGN KEY (educateur_id) REFERENCES educateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE educateur DROP FOREIGN KEY FK_763C012278EEB1EF');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612526E8E58');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556128A3C7387');
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BB3362CFB6');
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BBE7A1254A');
        $this->addSql('ALTER TABLE mail_educateur DROP FOREIGN KEY FK_EE61F4110335F61');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA932A6B1A');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA6BFC1A0E');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE educateur');
        $this->addSql('DROP TABLE licencie');
        $this->addSql('DROP TABLE mail_contact');
        $this->addSql('DROP TABLE mail_contact_contact');
        $this->addSql('DROP TABLE mail_educateur');
        $this->addSql('DROP TABLE mail_educateur_educateur');
    }
}
