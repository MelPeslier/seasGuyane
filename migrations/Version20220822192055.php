<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220822192055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ajout des champs imageName pour utiliser le bundle vichuploaderbundle';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mes_contenus ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE image_name image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE thematique ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE image_name image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE type_de_produit ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE image_name image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE image_name image_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mes_contenus DROP created_at, DROP updated_at, CHANGE image_name image_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE thematique DROP created_at, DROP updated_at, CHANGE image_name image_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE type_de_produit DROP created_at, DROP updated_at, CHANGE image_name image_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule DROP created_at, DROP updated_at, CHANGE image_name image_name VARCHAR(255) NOT NULL');
    }
}
