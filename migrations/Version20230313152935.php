<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313152935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE feature DROP FOREIGN KEY FK_1FD775666D282AE5');
        $this->addSql('ALTER TABLE test_relation2 DROP FOREIGN KEY FK_972A59B4C8121CE9');
        $this->addSql('DROP TABLE test_relation2');
        $this->addSql('DROP TABLE test_relation');
        $this->addSql('DROP INDEX IDX_1FD775666D282AE5 ON feature');
        $this->addSql('ALTER TABLE feature DROP test_relation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test_relation2 (id INT AUTO_INCREMENT NOT NULL, nom_id INT DEFAULT NULL, INDEX IDX_972A59B4C8121CE9 (nom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE test_relation (id INT AUTO_INCREMENT NOT NULL, descriptiont VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE test_relation2 ADD CONSTRAINT FK_972A59B4C8121CE9 FOREIGN KEY (nom_id) REFERENCES feature (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE feature ADD test_relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE feature ADD CONSTRAINT FK_1FD775666D282AE5 FOREIGN KEY (test_relation_id) REFERENCES test_relation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1FD775666D282AE5 ON feature (test_relation_id)');
    }
}
