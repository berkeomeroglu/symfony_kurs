<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190320133112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, isim VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_grup (user_id INT NOT NULL, grup_id INT NOT NULL, INDEX IDX_A80C1CDEA76ED395 (user_id), INDEX IDX_A80C1CDE569AD2DE (grup_id), PRIMARY KEY(user_id, grup_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grup (id INT AUTO_INCREMENT NOT NULL, isim VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_grup ADD CONSTRAINT FK_A80C1CDEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_grup ADD CONSTRAINT FK_A80C1CDE569AD2DE FOREIGN KEY (grup_id) REFERENCES grup (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_grup DROP FOREIGN KEY FK_A80C1CDEA76ED395');
        $this->addSql('ALTER TABLE user_grup DROP FOREIGN KEY FK_A80C1CDE569AD2DE');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_grup');
        $this->addSql('DROP TABLE grup');
    }
}
