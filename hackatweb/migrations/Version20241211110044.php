<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241211110044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE participants_inscription (participants_id INT NOT NULL, inscription_id INT NOT NULL, INDEX IDX_B4C1F274838709D5 (participants_id), INDEX IDX_B4C1F2745DAC5993 (inscription_id), PRIMARY KEY(participants_id, inscription_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participants_inscription ADD CONSTRAINT FK_B4C1F274838709D5 FOREIGN KEY (participants_id) REFERENCES participants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participants_inscription ADD CONSTRAINT FK_B4C1F2745DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6838709D5');
        $this->addSql('DROP INDEX IDX_5E90F6D6838709D5 ON inscription');
        $this->addSql('ALTER TABLE inscription DROP participants_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participants_inscription DROP FOREIGN KEY FK_B4C1F274838709D5');
        $this->addSql('ALTER TABLE participants_inscription DROP FOREIGN KEY FK_B4C1F2745DAC5993');
        $this->addSql('DROP TABLE participants_inscription');
        $this->addSql('ALTER TABLE inscription ADD participants_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6838709D5 FOREIGN KEY (participants_id) REFERENCES participants (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6838709D5 ON inscription (participants_id)');
    }
}
