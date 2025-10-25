<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251008093734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advertisement (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, title VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, salary INT NOT NULL, workhours INT NOT NULL, INDEX IDX_C95F6AEE979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, advertisement_id INT NOT NULL, user_id INT DEFAULT NULL, message LONGTEXT NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, phone VARCHAR(20) NOT NULL, INDEX IDX_A45BDDC1A1FBF71B (advertisement_id), INDEX IDX_A45BDDC1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE advertisement ADD CONSTRAINT FK_C95F6AEE979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1A1FBF71B FOREIGN KEY (advertisement_id) REFERENCES advertisement (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD phone VARCHAR(20) DEFAULT NULL, CHANGE firstname firstname VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE advertisement DROP FOREIGN KEY FK_C95F6AEE979B1AD6');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1A1FBF71B');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1A76ED395');
        $this->addSql('DROP TABLE advertisement');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE company');
        $this->addSql('ALTER TABLE user DROP phone, CHANGE firstname firstname VARCHAR(50) NOT NULL');
    }
}
