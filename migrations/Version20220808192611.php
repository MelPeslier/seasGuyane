<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220808192611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ajout de la relation (clé étrangère entre) entre la table couret la table user';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cour ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE cour ADD CONSTRAINT FK_A71F964FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A71F964FA76ED395 ON cour (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cour DROP FOREIGN KEY FK_A71F964FA76ED395');
        $this->addSql('DROP INDEX IDX_A71F964FA76ED395 ON cour');
        $this->addSql('ALTER TABLE cour DROP user_id');
    }
}
