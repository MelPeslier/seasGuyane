<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825131705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Pour utiliser les USERS';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7C47E51B64');
        $this->addSql('DROP INDEX IDX_432E3A7C47E51B64 ON donnee_seas');
        $this->addSql('ALTER TABLE donnee_seas DROP mes_contenus_id');
        $this->addSql('ALTER TABLE mes_contenus ADD mes_contenus_id INT DEFAULT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE mes_contenus ADD CONSTRAINT FK_94FDDE9047E51B64 FOREIGN KEY (mes_contenus_id) REFERENCES donnee_seas (id)');
        $this->addSql('ALTER TABLE mes_contenus ADD CONSTRAINT FK_94FDDE90A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_94FDDE9047E51B64 ON mes_contenus (mes_contenus_id)');
        $this->addSql('CREATE INDEX IDX_94FDDE90A76ED395 ON mes_contenus (user_id)');
        $this->addSql('ALTER TABLE mes_thematiques ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE mes_thematiques ADD CONSTRAINT FK_80F2DB93A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_80F2DB93A76ED395 ON mes_thematiques (user_id)');
        $this->addSql('ALTER TABLE thematique ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE thematique ADD CONSTRAINT FK_3A8ED5A8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3A8ED5A8A76ED395 ON thematique (user_id)');
        $this->addSql('ALTER TABLE type_de_produit ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE type_de_produit ADD CONSTRAINT FK_8BE0C81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8BE0C81A76ED395 ON type_de_produit (user_id)');
        $this->addSql('ALTER TABLE vehicule ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DA76ED395 ON vehicule (user_id)');
        $this->addSql('ALTER TABLE vehicule_spe ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule_spe ADD CONSTRAINT FK_BA3FE16EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BA3FE16EA76ED395 ON vehicule_spe (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas ADD mes_contenus_id INT NOT NULL');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7C47E51B64 FOREIGN KEY (mes_contenus_id) REFERENCES mes_contenus (id)');
        $this->addSql('CREATE INDEX IDX_432E3A7C47E51B64 ON donnee_seas (mes_contenus_id)');
        $this->addSql('ALTER TABLE mes_contenus DROP FOREIGN KEY FK_94FDDE9047E51B64');
        $this->addSql('ALTER TABLE mes_contenus DROP FOREIGN KEY FK_94FDDE90A76ED395');
        $this->addSql('DROP INDEX IDX_94FDDE9047E51B64 ON mes_contenus');
        $this->addSql('DROP INDEX IDX_94FDDE90A76ED395 ON mes_contenus');
        $this->addSql('ALTER TABLE mes_contenus DROP mes_contenus_id, DROP user_id');
        $this->addSql('ALTER TABLE mes_thematiques DROP FOREIGN KEY FK_80F2DB93A76ED395');
        $this->addSql('DROP INDEX IDX_80F2DB93A76ED395 ON mes_thematiques');
        $this->addSql('ALTER TABLE mes_thematiques DROP user_id');
        $this->addSql('ALTER TABLE thematique DROP FOREIGN KEY FK_3A8ED5A8A76ED395');
        $this->addSql('DROP INDEX IDX_3A8ED5A8A76ED395 ON thematique');
        $this->addSql('ALTER TABLE thematique DROP user_id');
        $this->addSql('ALTER TABLE type_de_produit DROP FOREIGN KEY FK_8BE0C81A76ED395');
        $this->addSql('DROP INDEX IDX_8BE0C81A76ED395 ON type_de_produit');
        $this->addSql('ALTER TABLE type_de_produit DROP user_id');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DA76ED395');
        $this->addSql('DROP INDEX IDX_292FFF1DA76ED395 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP user_id');
        $this->addSql('ALTER TABLE vehicule_spe DROP FOREIGN KEY FK_BA3FE16EA76ED395');
        $this->addSql('DROP INDEX IDX_BA3FE16EA76ED395 ON vehicule_spe');
        $this->addSql('ALTER TABLE vehicule_spe DROP user_id');
    }
}
