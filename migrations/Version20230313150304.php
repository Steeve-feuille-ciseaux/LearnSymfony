<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313150304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test_relation (id INT AUTO_INCREMENT NOT NULL, descriptiont VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feature ADD test_relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE feature ADD CONSTRAINT FK_1FD775666D282AE5 FOREIGN KEY (test_relation_id) REFERENCES test_relation (id)');
        $this->addSql('CREATE INDEX IDX_1FD775666D282AE5 ON feature (test_relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE feature DROP FOREIGN KEY FK_1FD775666D282AE5');
        $this->addSql('DROP TABLE test_relation');
        $this->addSql('DROP INDEX IDX_1FD775666D282AE5 ON feature');
        $this->addSql('ALTER TABLE feature DROP test_relation_id');
    }
}
