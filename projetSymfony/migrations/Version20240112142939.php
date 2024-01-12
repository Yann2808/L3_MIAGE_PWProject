<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240112142939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BBE7A1254A');
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_educateur DROP FOREIGN KEY FK_EE61F4110335F61');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA6BFC1A0E');
        $this->addSql('ALTER TABLE educateur DROP FOREIGN KEY FK_763C012278EEB1EF');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556128A3C7387');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612526E8E58');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE educateur');
        $this->addSql('DROP TABLE licencie');
        $this->addSql('ALTER TABLE categories CHANGE code code VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX numeroTel ON contacts');
        $this->addSql('DROP INDEX email ON contacts');
        $this->addSql('ALTER TABLE contacts ADD telephone VARCHAR(255) NOT NULL, DROP numeroTel');
        $this->addSql('ALTER TABLE educateurs DROP INDEX licencie_id, ADD UNIQUE INDEX UNIQ_CE18B2EEB56DCD74 (licencie_id)');
        $this->addSql('ALTER TABLE educateurs CHANGE licencie_id licencie_id INT NOT NULL, CHANGE isAdmin isAdmin TINYINT(1) DEFAULT NULL');
        $this->addSql('DROP INDEX numero_licencie ON licencies');
        $this->addSql('ALTER TABLE licencies DROP FOREIGN KEY licencies_ibfk_1');
        $this->addSql('ALTER TABLE licencies DROP FOREIGN KEY licencies_ibfk_2');
        $this->addSql('ALTER TABLE licencies CHANGE numero_licencie numero_licencie INT DEFAULT NULL');
        $this->addSql('DROP INDEX contact_id ON licencies');
        $this->addSql('CREATE INDEX IDX_E88CCB15E7A1254A ON licencies (contact_id)');
        $this->addSql('DROP INDEX categorie_id ON licencies');
        $this->addSql('CREATE INDEX IDX_E88CCB15BCF5E72D ON licencies (categorie_id)');
        $this->addSql('ALTER TABLE licencies ADD CONSTRAINT licencies_ibfk_1 FOREIGN KEY (contact_id) REFERENCES contacts (id)');
        $this->addSql('ALTER TABLE licencies ADD CONSTRAINT licencies_ibfk_2 FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_96DF675710335F61 FOREIGN KEY (expediteur_id) REFERENCES educateurs (id)');
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BBE7A1254A');
        $this->addSql('ALTER TABLE mail_contact_contact ADD CONSTRAINT FK_94F6F3BBE7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur DROP FOREIGN KEY FK_EE61F4110335F61');
        $this->addSql('ALTER TABLE mail_educateur ADD CONSTRAINT FK_EE61F4110335F61 FOREIGN KEY (expediteur_id) REFERENCES educateurs (id)');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA6BFC1A0E');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA6BFC1A0E FOREIGN KEY (educateur_id) REFERENCES educateurs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, code VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, telephone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE educateur (id INT AUTO_INCREMENT NOT NULL, licencie_id_id INT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mot_de_passe VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_admin TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_763C012278EEB1EF (licencie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, contact_id_id INT DEFAULT NULL, categorie_id_id INT DEFAULT NULL, numero_licence INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_3B755612526E8E58 (contact_id_id), INDEX IDX_3B7556128A3C7387 (categorie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE educateur ADD CONSTRAINT FK_763C012278EEB1EF FOREIGN KEY (licencie_id_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556128A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612526E8E58 FOREIGN KEY (contact_id_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE categories CHANGE code code VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE contacts ADD numeroTel VARCHAR(15) NOT NULL, DROP telephone');
        $this->addSql('CREATE UNIQUE INDEX numeroTel ON contacts (numeroTel)');
        $this->addSql('CREATE UNIQUE INDEX email ON contacts (email)');
        $this->addSql('ALTER TABLE educateurs DROP INDEX UNIQ_CE18B2EEB56DCD74, ADD INDEX licencie_id (licencie_id)');
        $this->addSql('ALTER TABLE educateurs CHANGE licencie_id licencie_id INT DEFAULT NULL, CHANGE isAdmin isAdmin TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE licencies DROP FOREIGN KEY FK_E88CCB15E7A1254A');
        $this->addSql('ALTER TABLE licencies DROP FOREIGN KEY FK_E88CCB15BCF5E72D');
        $this->addSql('ALTER TABLE licencies CHANGE numero_licencie numero_licencie VARCHAR(20) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX numero_licencie ON licencies (numero_licencie)');
        $this->addSql('DROP INDEX idx_e88ccb15e7a1254a ON licencies');
        $this->addSql('CREATE INDEX contact_id ON licencies (contact_id)');
        $this->addSql('DROP INDEX idx_e88ccb15bcf5e72d ON licencies');
        $this->addSql('CREATE INDEX categorie_id ON licencies (categorie_id)');
        $this->addSql('ALTER TABLE licencies ADD CONSTRAINT FK_E88CCB15E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)');
        $this->addSql('ALTER TABLE licencies ADD CONSTRAINT FK_E88CCB15BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_96DF675710335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BBE7A1254A');
        $this->addSql('ALTER TABLE mail_contact_contact ADD CONSTRAINT FK_94F6F3BBE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur DROP FOREIGN KEY FK_EE61F4110335F61');
        $this->addSql('ALTER TABLE mail_educateur ADD CONSTRAINT FK_EE61F4110335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA6BFC1A0E');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA6BFC1A0E FOREIGN KEY (educateur_id) REFERENCES educateur (id) ON DELETE CASCADE');
    }
}
