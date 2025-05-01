<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418114409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coach (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, linkedin_account VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, specialite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coach_hackathon (coach_id INT NOT NULL, hackathon_id INT NOT NULL, INDEX IDX_1D4BE2D83C105691 (coach_id), INDEX IDX_1D4BE2D8996D90CF (hackathon_id), PRIMARY KEY(coach_id, hackathon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coach_hackathon ADD CONSTRAINT FK_1D4BE2D83C105691 FOREIGN KEY (coach_id) REFERENCES coach (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach_hackathon ADD CONSTRAINT FK_1D4BE2D8996D90CF FOREIGN KEY (hackathon_id) REFERENCES hackathon (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coach_hackathon DROP FOREIGN KEY FK_1D4BE2D83C105691');
        $this->addSql('ALTER TABLE coach_hackathon DROP FOREIGN KEY FK_1D4BE2D8996D90CF');
        $this->addSql('DROP TABLE coach');
        $this->addSql('DROP TABLE coach_hackathon');
    }
}
