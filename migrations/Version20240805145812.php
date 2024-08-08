<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240805145812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidatures CHANGE id_etudiant id_etudiant INT NOT NULL, CHANGE id_mobilite id_mobilite INT NOT NULL');
        $this->addSql('ALTER TABLE candidatures ADD CONSTRAINT FK_DE57CF6621A5CE76 FOREIGN KEY (id_etudiant) REFERENCES registred_students (id)');
        $this->addSql('ALTER TABLE candidatures ADD CONSTRAINT FK_DE57CF66928A90C6 FOREIGN KEY (id_mobilite) REFERENCES mobilite (id)');
        $this->addSql('CREATE INDEX IDX_DE57CF6621A5CE76 ON candidatures (id_etudiant)');
        $this->addSql('CREATE INDEX IDX_DE57CF66928A90C6 ON candidatures (id_mobilite)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidatures DROP FOREIGN KEY FK_DE57CF6621A5CE76');
        $this->addSql('ALTER TABLE candidatures DROP FOREIGN KEY FK_DE57CF66928A90C6');
        $this->addSql('DROP INDEX IDX_DE57CF6621A5CE76 ON candidatures');
        $this->addSql('DROP INDEX IDX_DE57CF66928A90C6 ON candidatures');
        $this->addSql('ALTER TABLE candidatures CHANGE id_etudiant id_etudiant VARCHAR(255) NOT NULL, CHANGE id_mobilite id_mobilite VARCHAR(255) NOT NULL');
    }
}
