<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240805134447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidatures ADD id INT AUTO_INCREMENT NOT NULL, DROP id_candidature, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE employe ADD nom_employe VARCHAR(255) NOT NULL, ADD prenom_employe VARCHAR(255) NOT NULL, DROP nom, DROP prenom, CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE mobilite CHANGE date_de_creation date_de_creation DATE NOT NULL');
        $this->addSql('ALTER TABLE registred_students ADD nom_etudiant VARCHAR(255) NOT NULL, ADD prenom_etudiant VARCHAR(255) NOT NULL, ADD mot_de_passe_etudiant VARCHAR(255) NOT NULL, DROP nom, DROP prenom, DROP mot_de_passe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidatures MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON candidatures');
        $this->addSql('ALTER TABLE candidatures ADD id_candidature INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE employe MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON employe');
        $this->addSql('ALTER TABLE employe ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, DROP nom_employe, DROP prenom_employe, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE mobilite CHANGE date_de_creation date_de_creation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE registred_students ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD mot_de_passe VARCHAR(255) NOT NULL, DROP nom_etudiant, DROP prenom_etudiant, DROP mot_de_passe_etudiant');
    }
}
