<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519142956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, organisation_id_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, username_canonice VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled VARCHAR(255) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login VARCHAR(255) NOT NULL, confirmation_token VARCHAR(255) NOT NULL, password_requeste VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, last_activity VARCHAR(255) NOT NULL, tel_nr INT NOT NULL, mobile_nr INT NOT NULL, firs_name VARCHAR(255) NOT NULL, insertion_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, zip VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, function VARCHAR(255) NOT NULL, INDEX IDX_957A64796C6A4201 (organisation_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A64796C6A4201 FOREIGN KEY (organisation_id_id) REFERENCES organisation (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE fos_user');
    }
}
