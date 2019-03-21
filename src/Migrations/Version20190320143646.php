<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190320143646 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE kart (id INT AUTO_INCREMENT NOT NULL, numara VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gorev (id INT AUTO_INCREMENT NOT NULL, gorev VARCHAR(255) NOT NULL, bitis_zamani DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD kart_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649293A83D8 FOREIGN KEY (kart_id) REFERENCES kart (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649293A83D8 ON user (kart_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649293A83D8');
        $this->addSql('DROP TABLE kart');
        $this->addSql('DROP TABLE gorev');
        $this->addSql('DROP INDEX UNIQ_8D93D649293A83D8 ON user');
        $this->addSql('ALTER TABLE user DROP kart_id');
    }
}
