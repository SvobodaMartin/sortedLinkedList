<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230601195659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE linked_list (id INT AUTO_INCREMENT NOT NULL, head LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE node (id INT AUTO_INCREMENT NOT NULL, next_id INT DEFAULT NULL, data VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_857FE845AA23F6C8 (next_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845AA23F6C8 FOREIGN KEY (next_id) REFERENCES node (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE845AA23F6C8');
        $this->addSql('DROP TABLE linked_list');
        $this->addSql('DROP TABLE node');
    }
}
