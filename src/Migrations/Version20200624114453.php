<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200624114453 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task CHANGE status status ENUM(\'Not Started Yet\', \'In Process\', \'Done\')');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25C18272 FOREIGN KEY (projet_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_527EDB25C18272 ON task (projet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25C18272');
        $this->addSql('DROP INDEX IDX_527EDB25C18272 ON task');
        $this->addSql('ALTER TABLE task CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
