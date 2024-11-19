<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119101205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E996D90CF');
        $this->addSql('DROP INDEX IDX_B26681E996D90CF ON evenement');
        $this->addSql('ALTER TABLE evenement CHANGE hackathon_id idHackathon INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E77D0DD19 FOREIGN KEY (idHackathon) REFERENCES hackathon (id)');
        $this->addSql('CREATE INDEX IDX_B26681E77D0DD19 ON evenement (idHackathon)');
        $this->addSql('ALTER TABLE inscription ADD id_participants_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D66AD9CA5D FOREIGN KEY (id_participants_id) REFERENCES participants (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D66AD9CA5D ON inscription (id_participants_id)');
        $this->addSql('ALTER TABLE participants DROP FOREIGN KEY FK_716970925DAC5993');
        $this->addSql('DROP INDEX UNIQ_716970925DAC5993 ON participants');
        $this->addSql('ALTER TABLE participants DROP inscription_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participants ADD inscription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participants ADD CONSTRAINT FK_716970925DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_716970925DAC5993 ON participants (inscription_id)');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E77D0DD19');
        $this->addSql('DROP INDEX IDX_B26681E77D0DD19 ON evenement');
        $this->addSql('ALTER TABLE evenement CHANGE idHackathon hackathon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E996D90CF FOREIGN KEY (hackathon_id) REFERENCES hackathon (id)');
        $this->addSql('CREATE INDEX IDX_B26681E996D90CF ON evenement (hackathon_id)');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D66AD9CA5D');
        $this->addSql('DROP INDEX IDX_5E90F6D66AD9CA5D ON inscription');
        $this->addSql('ALTER TABLE inscription DROP id_participants_id');
    }
}
