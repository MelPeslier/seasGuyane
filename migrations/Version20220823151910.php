<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823151910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'petite correction de faute d\'ortographe';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas CHANGE donne_seas donnee_seas VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas CHANGE donnee_seas donne_seas VARCHAR(255) NOT NULL');
    }
}
