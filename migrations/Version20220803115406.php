<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220803115406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'on rend les champs description et les images non obligatoires';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cour CHANGE description description LONGTEXT DEFAULT NULL, CHANGE image_fond_name image_fond_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cour CHANGE description description LONGTEXT NOT NULL, CHANGE image_fond_name image_fond_name VARCHAR(255) NOT NULL');
    }
}
