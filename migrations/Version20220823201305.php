<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823201305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'rajout des users pour les données seas';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_432E3A7CA76ED395 ON donnee_seas (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7CA76ED395');
        $this->addSql('DROP INDEX IDX_432E3A7CA76ED395 ON donnee_seas');
        $this->addSql('ALTER TABLE donnee_seas DROP user_id');
    }
}
