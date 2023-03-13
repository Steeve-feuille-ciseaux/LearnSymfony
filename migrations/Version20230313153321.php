<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313153321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE methode ADD feature_id INT NOT NULL');
        $this->addSql('ALTER TABLE methode ADD CONSTRAINT FK_A236423860E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id)');
        $this->addSql('CREATE INDEX IDX_A236423860E4B879 ON methode (feature_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE methode DROP FOREIGN KEY FK_A236423860E4B879');
        $this->addSql('DROP INDEX IDX_A236423860E4B879 ON methode');
        $this->addSql('ALTER TABLE methode DROP feature_id');
    }
}
