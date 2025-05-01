<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250401112838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE FavorisParticipants (participants_id INT NOT NULL, hackathon_id INT NOT NULL, INDEX IDX_EF8CA538838709D5 (participants_id), INDEX IDX_EF8CA538996D90CF (hackathon_id), PRIMARY KEY(participants_id, hackathon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE FavorisParticipants ADD CONSTRAINT FK_EF8CA538838709D5 FOREIGN KEY (participants_id) REFERENCES participants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE FavorisParticipants ADD CONSTRAINT FK_EF8CA538996D90CF FOREIGN KEY (hackathon_id) REFERENCES hackathon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participants_hackathon DROP FOREIGN KEY FK_76E0AC5C838709D5');
        $this->addSql('ALTER TABLE participants_hackathon DROP FOREIGN KEY FK_76E0AC5C996D90CF');
        $this->addSql('DROP TABLE participants_hackathon');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE participants_hackathon (participants_id INT NOT NULL, hackathon_id INT NOT NULL, INDEX IDX_76E0AC5C996D90CF (hackathon_id), INDEX IDX_76E0AC5C838709D5 (participants_id), PRIMARY KEY(participants_id, hackathon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE participants_hackathon ADD CONSTRAINT FK_76E0AC5C838709D5 FOREIGN KEY (participants_id) REFERENCES participants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participants_hackathon ADD CONSTRAINT FK_76E0AC5C996D90CF FOREIGN KEY (hackathon_id) REFERENCES hackathon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE FavorisParticipants DROP FOREIGN KEY FK_EF8CA538838709D5');
        $this->addSql('ALTER TABLE FavorisParticipants DROP FOREIGN KEY FK_EF8CA538996D90CF');
        $this->addSql('DROP TABLE FavorisParticipants');
    }
}
