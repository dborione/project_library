<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021132136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, birth_date DATE NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('DROP INDEX IDX_1FB30F9812469DE2');
        $this->addSql('DROP INDEX IDX_1FB30F9816A2B381');
        $this->addSql('CREATE TEMPORARY TABLE __temp__book_category AS SELECT book_id, category_id FROM book_category');
        $this->addSql('DROP TABLE book_category');
        $this->addSql('CREATE TABLE book_category (book_id INTEGER NOT NULL, category_id INTEGER NOT NULL, PRIMARY KEY(book_id, category_id), CONSTRAINT FK_1FB30F9816A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1FB30F9812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO book_category (book_id, category_id) SELECT book_id, category_id FROM __temp__book_category');
        $this->addSql('DROP TABLE __temp__book_category');
        $this->addSql('CREATE INDEX IDX_1FB30F9812469DE2 ON book_category (category_id)');
        $this->addSql('CREATE INDEX IDX_1FB30F9816A2B381 ON book_category (book_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_1FB30F9816A2B381');
        $this->addSql('DROP INDEX IDX_1FB30F9812469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__book_category AS SELECT book_id, category_id FROM book_category');
        $this->addSql('DROP TABLE book_category');
        $this->addSql('CREATE TABLE book_category (book_id INTEGER NOT NULL, category_id INTEGER NOT NULL, PRIMARY KEY(book_id, category_id))');
        $this->addSql('INSERT INTO book_category (book_id, category_id) SELECT book_id, category_id FROM __temp__book_category');
        $this->addSql('DROP TABLE __temp__book_category');
        $this->addSql('CREATE INDEX IDX_1FB30F9816A2B381 ON book_category (book_id)');
        $this->addSql('CREATE INDEX IDX_1FB30F9812469DE2 ON book_category (category_id)');
    }
}
