<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150924010746 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE2904019');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE thread');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, thread_id VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, body LONGTEXT NOT NULL COLLATE utf8_unicode_ci, ancestors VARCHAR(1024) NOT NULL COLLATE utf8_unicode_ci, depth INT NOT NULL, created_at DATETIME NOT NULL, state INT NOT NULL, INDEX IDX_9474526CE2904019 (thread_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thread (id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, permalink VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, is_commentable TINYINT(1) NOT NULL, num_comments INT NOT NULL, last_comment_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE2904019 FOREIGN KEY (thread_id) REFERENCES thread (id)');
    }
}
