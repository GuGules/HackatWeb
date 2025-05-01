<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418115507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence_secteur (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_secteur_coach_metier (competence_secteur_id INT NOT NULL, coach_metier_id INT NOT NULL, INDEX IDX_4F3E7545B1FEFCF2 (competence_secteur_id), INDEX IDX_4F3E75457B67EEB7 (coach_metier_id), PRIMARY KEY(competence_secteur_id, coach_metier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_tech (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_tech_coach_technique (competence_tech_id INT NOT NULL, coach_technique_id INT NOT NULL, INDEX IDX_5EFB23D9703AC4D6 (competence_tech_id), INDEX IDX_5EFB23D9EE7AF33A (coach_technique_id), PRIMARY KEY(competence_tech_id, coach_technique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coach_hackathon ADD CONSTRAINT FK_1D4BE2D83C105691 FOREIGN KEY (coach_id) REFERENCES coach (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach_hackathon ADD CONSTRAINT FK_1D4BE2D8996D90CF FOREIGN KEY (hackathon_id) REFERENCES hackathon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_secteur_coach_metier ADD CONSTRAINT FK_4F3E7545B1FEFCF2 FOREIGN KEY (competence_secteur_id) REFERENCES competence_secteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_secteur_coach_metier ADD CONSTRAINT FK_4F3E75457B67EEB7 FOREIGN KEY (coach_metier_id) REFERENCES coach (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_tech_coach_technique ADD CONSTRAINT FK_5EFB23D9703AC4D6 FOREIGN KEY (competence_tech_id) REFERENCES competence_tech (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_tech_coach_technique ADD CONSTRAINT FK_5EFB23D9EE7AF33A FOREIGN KEY (coach_technique_id) REFERENCES coach (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coach_hackathon DROP FOREIGN KEY FK_1D4BE2D83C105691');
        $this->addSql('ALTER TABLE coach_hackathon DROP FOREIGN KEY FK_1D4BE2D8996D90CF');
        $this->addSql('ALTER TABLE competence_secteur_coach_metier DROP FOREIGN KEY FK_4F3E7545B1FEFCF2');
        $this->addSql('ALTER TABLE competence_secteur_coach_metier DROP FOREIGN KEY FK_4F3E75457B67EEB7');
        $this->addSql('ALTER TABLE competence_tech_coach_technique DROP FOREIGN KEY FK_5EFB23D9703AC4D6');
        $this->addSql('ALTER TABLE competence_tech_coach_technique DROP FOREIGN KEY FK_5EFB23D9EE7AF33A');
        $this->addSql('DROP TABLE coach');
        $this->addSql('DROP TABLE coach_hackathon');
        $this->addSql('DROP TABLE competence_secteur');
        $this->addSql('DROP TABLE competence_secteur_coach_metier');
        $this->addSql('DROP TABLE competence_tech');
        $this->addSql('DROP TABLE competence_tech_coach_technique');
        $this->addSql('DROP TABLE linkedin_account');
    }
}
