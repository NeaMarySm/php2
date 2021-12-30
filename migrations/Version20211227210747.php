<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227210747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, countrey VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, building INT NOT NULL, apartment INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address_customer (address_id INT NOT NULL, customer_id INT NOT NULL, INDEX IDX_7FB67088F5B7AF75 (address_id), INDEX IDX_7FB670889395C3F3 (customer_id), PRIMARY KEY(address_id, customer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', password_hash VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_number (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, number BIGINT NOT NULL, INDEX IDX_6B01BC5B9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address_customer ADD CONSTRAINT FK_7FB67088F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE address_customer ADD CONSTRAINT FK_7FB670889395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE phone_number ADD CONSTRAINT FK_6B01BC5B9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address_customer DROP FOREIGN KEY FK_7FB67088F5B7AF75');
        $this->addSql('ALTER TABLE address_customer DROP FOREIGN KEY FK_7FB670889395C3F3');
        $this->addSql('ALTER TABLE phone_number DROP FOREIGN KEY FK_6B01BC5B9395C3F3');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE address_customer');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE phone_number');
    }
}
