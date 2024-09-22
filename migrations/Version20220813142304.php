<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220813142304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temperature DROP FOREIGN KEY FK_BE4E2A6C916DA5D9');
        $this->addSql('DROP INDEX IDX_BE4E2A6C916DA5D9 ON temperature');
        $this->addSql('ALTER TABLE temperature CHANGE motemp_id moteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE temperature ADD CONSTRAINT FK_BE4E2A6C6BF4B111 FOREIGN KEY (moteur_id) REFERENCES moteur (id)');
        $this->addSql('CREATE INDEX IDX_BE4E2A6C6BF4B111 ON temperature (moteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temperature DROP FOREIGN KEY FK_BE4E2A6C6BF4B111');
        $this->addSql('DROP INDEX IDX_BE4E2A6C6BF4B111 ON temperature');
        $this->addSql('ALTER TABLE temperature CHANGE moteur_id motemp_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE temperature ADD CONSTRAINT FK_BE4E2A6C916DA5D9 FOREIGN KEY (motemp_id) REFERENCES moteur (id)');
        $this->addSql('CREATE INDEX IDX_BE4E2A6C916DA5D9 ON temperature (motemp_id)');
    }
}
