<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220829125004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'tables seas_data et theme ainsi que les relations';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seas_data (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date DATE NOT NULL, fournisseur VARCHAR(255) NOT NULL, echelle VARCHAR(10) NOT NULL, capteur VARCHAR(255) NOT NULL, vehicule VARCHAR(255) NOT NULL, resolution VARCHAR(30) NOT NULL, type_de_produit VARCHAR(255) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, INDEX IDX_21AF093AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seas_data_theme (seas_data_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_993B68AAD816A067 (seas_data_id), INDEX IDX_993B68AA59027487 (theme_id), PRIMARY KEY(seas_data_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, theme VARCHAR(255) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seas_data ADD CONSTRAINT FK_21AF093AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE seas_data_theme ADD CONSTRAINT FK_993B68AAD816A067 FOREIGN KEY (seas_data_id) REFERENCES seas_data (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seas_data_theme ADD CONSTRAINT FK_993B68AA59027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seas_data_theme DROP FOREIGN KEY FK_993B68AAD816A067');
        $this->addSql('ALTER TABLE seas_data_theme DROP FOREIGN KEY FK_993B68AA59027487');
        $this->addSql('DROP TABLE seas_data');
        $this->addSql('DROP TABLE seas_data_theme');
        $this->addSql('DROP TABLE theme');
    }
}
