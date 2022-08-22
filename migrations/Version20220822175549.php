<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220822175549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capteur (id INT AUTO_INCREMENT NOT NULL, capteur VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donnee_seas (id INT AUTO_INCREMENT NOT NULL, date_id INT NOT NULL, fournisseur_id INT NOT NULL, capteur_id INT NOT NULL, echelle_id INT NOT NULL, vehicule_id INT NOT NULL, resolution_id INT NOT NULL, type_de_produit_id INT NOT NULL, mes_contenus_id INT NOT NULL, donne_seas VARCHAR(255) NOT NULL, INDEX IDX_432E3A7CB897366B (date_id), INDEX IDX_432E3A7C670C757F (fournisseur_id), INDEX IDX_432E3A7C1708A229 (capteur_id), INDEX IDX_432E3A7CDD268C11 (echelle_id), INDEX IDX_432E3A7C4A4A3511 (vehicule_id), INDEX IDX_432E3A7C12A1C43A (resolution_id), INDEX IDX_432E3A7C6DA6508 (type_de_produit_id), INDEX IDX_432E3A7C47E51B64 (mes_contenus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE echelle (id INT AUTO_INCREMENT NOT NULL, echelle VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, fournisseur VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mes_contenus (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mes_thematiques (id INT AUTO_INCREMENT NOT NULL, thematique_id INT NOT NULL, donnee_seas_id INT NOT NULL, INDEX IDX_80F2DB93476556AF (thematique_id), INDEX IDX_80F2DB93C2D587F1 (donnee_seas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resolution (id INT AUTO_INCREMENT NOT NULL, resolution VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematique (id INT AUTO_INCREMENT NOT NULL, thematique VARCHAR(30) NOT NULL, image_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_de_produit (id INT AUTO_INCREMENT NOT NULL, type_de_produit VARCHAR(30) NOT NULL, image_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, vehicule VARCHAR(30) NOT NULL, image_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule_spe (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT NOT NULL, vehicule_spe VARCHAR(30) NOT NULL, INDEX IDX_BA3FE16E4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7CB897366B FOREIGN KEY (date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7C670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7C1708A229 FOREIGN KEY (capteur_id) REFERENCES capteur (id)');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7CDD268C11 FOREIGN KEY (echelle_id) REFERENCES echelle (id)');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7C4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7C12A1C43A FOREIGN KEY (resolution_id) REFERENCES resolution (id)');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7C6DA6508 FOREIGN KEY (type_de_produit_id) REFERENCES type_de_produit (id)');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7C47E51B64 FOREIGN KEY (mes_contenus_id) REFERENCES mes_contenus (id)');
        $this->addSql('ALTER TABLE mes_thematiques ADD CONSTRAINT FK_80F2DB93476556AF FOREIGN KEY (thematique_id) REFERENCES thematique (id)');
        $this->addSql('ALTER TABLE mes_thematiques ADD CONSTRAINT FK_80F2DB93C2D587F1 FOREIGN KEY (donnee_seas_id) REFERENCES donnee_seas (id)');
        $this->addSql('ALTER TABLE vehicule_spe ADD CONSTRAINT FK_BA3FE16E4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7C1708A229');
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7CB897366B');
        $this->addSql('ALTER TABLE mes_thematiques DROP FOREIGN KEY FK_80F2DB93C2D587F1');
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7CDD268C11');
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7C670C757F');
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7C47E51B64');
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7C12A1C43A');
        $this->addSql('ALTER TABLE mes_thematiques DROP FOREIGN KEY FK_80F2DB93476556AF');
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7C6DA6508');
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7C4A4A3511');
        $this->addSql('ALTER TABLE vehicule_spe DROP FOREIGN KEY FK_BA3FE16E4A4A3511');
        $this->addSql('DROP TABLE capteur');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE donnee_seas');
        $this->addSql('DROP TABLE echelle');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE mes_contenus');
        $this->addSql('DROP TABLE mes_thematiques');
        $this->addSql('DROP TABLE resolution');
        $this->addSql('DROP TABLE thematique');
        $this->addSql('DROP TABLE type_de_produit');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE vehicule_spe');
    }
}
