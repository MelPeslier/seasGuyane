<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825125030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'On passe en ManyToOne';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas DROP FOREIGN KEY FK_432E3A7C47E51B64');
        $this->addSql('DROP INDEX IDX_432E3A7C47E51B64 ON donnee_seas');
        $this->addSql('ALTER TABLE donnee_seas DROP mes_contenus_id');
        $this->addSql('ALTER TABLE mes_contenus ADD mes_contenus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mes_contenus ADD CONSTRAINT FK_94FDDE9047E51B64 FOREIGN KEY (mes_contenus_id) REFERENCES donnee_seas (id)');
        $this->addSql('CREATE INDEX IDX_94FDDE9047E51B64 ON mes_contenus (mes_contenus_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee_seas ADD mes_contenus_id INT NOT NULL');
        $this->addSql('ALTER TABLE donnee_seas ADD CONSTRAINT FK_432E3A7C47E51B64 FOREIGN KEY (mes_contenus_id) REFERENCES mes_contenus (id)');
        $this->addSql('CREATE INDEX IDX_432E3A7C47E51B64 ON donnee_seas (mes_contenus_id)');
        $this->addSql('ALTER TABLE mes_contenus DROP FOREIGN KEY FK_94FDDE9047E51B64');
        $this->addSql('DROP INDEX IDX_94FDDE9047E51B64 ON mes_contenus');
        $this->addSql('ALTER TABLE mes_contenus DROP mes_contenus_id');
    }
}
