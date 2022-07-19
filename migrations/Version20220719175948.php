<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220719175948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'second commit, ajout de la description breve et de l\'image de fond de rubrique';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cour ADD description_breve LONGTEXT NOT NULL, ADD image_fond_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cour DROP description_breve, DROP image_fond_name');
    }
}
