<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122201705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement ADD idHackathon INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E77D0DD19 FOREIGN KEY (idHackathon) REFERENCES hackathon (id)');
        $this->addSql('CREATE INDEX IDX_B26681E77D0DD19 ON evenement (idHackathon)');
        $this->addSql('ALTER TABLE inscription ADD participants_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6838709D5 FOREIGN KEY (participants_id) REFERENCES participants (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6838709D5 ON inscription (participants_id)');
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
        $this->addSql('ALTER TABLE evenement DROP idHackathon');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6838709D5');
        $this->addSql('DROP INDEX IDX_5E90F6D6838709D5 ON inscription');
        $this->addSql('ALTER TABLE inscription DROP participants_id');
    }
}
