<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908034734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE temperature DROP FOREIGN KEY FK_BE4E2A6C6BF4B111');
        $this->addSql('DROP INDEX IDX_BE4E2A6C6BF4B111 ON temperature');
        $this->addSql('ALTER TABLE temperature DROP moteur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE temperature ADD moteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE temperature ADD CONSTRAINT FK_BE4E2A6C6BF4B111 FOREIGN KEY (moteur_id) REFERENCES moteur (id)');
        $this->addSql('CREATE INDEX IDX_BE4E2A6C6BF4B111 ON temperature (moteur_id)');
    }
}
