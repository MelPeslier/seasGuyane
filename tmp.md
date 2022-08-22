$this->addSql('
    CREATE TABLE tb_capteur (capteur VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(capteur)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_date (date_ VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(date_)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_donnee_seas (donnee_seas VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, date_ VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, fournisseur VARCHAR(100) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, capteur VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, echelle VARCHAR(20) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, vehicule VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, resolution VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, type_de_produit VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX FK_resolution (resolution), INDEX FK_capteur (capteur), INDEX FK_type_de_produit (type_de_produit), INDEX FK_echelle (echelle), INDEX FK_date_ (date_), INDEX FK_vehicule (vehicule), INDEX FK_fournisseur (fournisseur), PRIMARY KEY(donnee_seas, date_, fournisseur)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_echelle (echelle VARCHAR(20) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(echelle)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_fournisseur (fournisseur VARCHAR(100) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(fournisseur)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_mes_contenus (image_name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, donnee_seas VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, date_ VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, fournisseur VARCHAR(100) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX FK_contenus_fournisseur (fournisseur), INDEX FK_contenus_date_ (date_), INDEX IDX_F7920D17432E3A7C (donnee_seas), PRIMARY KEY(donnee_seas, date_, fournisseur, image_name)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_mes_thematiques (thematique VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, donnee_seas VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, date_ VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, fournisseur VARCHAR(100) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX FK_thematiques_fournisseur (fournisseur), INDEX FK_thematique (thematique), INDEX FK_thematiques_date_ (date_), INDEX IDX_13903CE0432E3A7C (donnee_seas), PRIMARY KEY(donnee_seas, date_, fournisseur, thematique)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_resolution (resolution VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(resolution)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_thematique (thematique VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, image_name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(thematique)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_type_de_produit (type_de_produit VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, image_name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(type_de_produit)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\'
');
$this->addSql('
    CREATE TABLE tb_vehicule (vehicule VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, image_name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(vehicule)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    CREATE TABLE tb_vehicule_spe (vehicule_spe VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, vehicule VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(vehicule_spe)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' 
');
$this->addSql('
    ALTER TABLE tb_donnee_seas ADD CONSTRAINT FK_type_de_produit FOREIGN KEY (type_de_produit) REFERENCES tb_type_de_produit (type_de_produit)
');
$this->addSql('
    ALTER TABLE tb_donnee_seas ADD CONSTRAINT FK_capteur FOREIGN KEY (capteur) REFERENCES tb_capteur (capteur)
');
$this->addSql('
    ALTER TABLE tb_donnee_seas ADD CONSTRAINT FK_echelle FOREIGN KEY (echelle) REFERENCES tb_echelle (echelle)
');
$this->addSql('
    ALTER TABLE tb_donnee_seas ADD CONSTRAINT FK_resolution FOREIGN KEY (resolution) REFERENCES tb_resolution (resolution)
');
$this->addSql('
    ALTER TABLE tb_donnee_seas ADD CONSTRAINT FK_vehicule FOREIGN KEY (vehicule) REFERENCES tb_vehicule (vehicule)
');
$this->addSql('
    ALTER TABLE tb_donnee_seas ADD CONSTRAINT FK_date_ FOREIGN KEY (date_) REFERENCES tb_date (date_)
');
$this->addSql('
    ALTER TABLE tb_donnee_seas ADD CONSTRAINT FK_fournisseur FOREIGN KEY (fournisseur) REFERENCES tb_fournisseur (fournisseur)
');
$this->addSql('
    ALTER TABLE tb_mes_contenus ADD CONSTRAINT FK_contenus_date_ FOREIGN KEY (date_) REFERENCES tb_donnee_seas (date_)
');
$this->addSql('
    ALTER TABLE tb_mes_contenus ADD CONSTRAINT FK_contenus_fournisseur FOREIGN KEY (fournisseur) REFERENCES tb_donnee_seas (fournisseur)
');
$this->addSql('
    ALTER TABLE tb_mes_contenus ADD CONSTRAINT FK_contenus_donnee_seas FOREIGN KEY (donnee_seas) REFERENCES tb_donnee_seas (donnee_seas)
');
$this->addSql('
    ALTER TABLE tb_mes_thematiques ADD CONSTRAINT FK_thematique FOREIGN KEY (thematique) REFERENCES tb_thematique (thematique)
');
$this->addSql('
    ALTER TABLE tb_mes_thematiques ADD CONSTRAINT FK_thematiques_donnee_seas FOREIGN KEY (donnee_seas) REFERENCES tb_donnee_seas (donnee_seas)
');
$this->addSql('
    ALTER TABLE tb_mes_thematiques ADD CONSTRAINT FK_thematiques_date_ FOREIGN KEY (date_) REFERENCES tb_donnee_seas (date_)
');
$this->addSql('
    ALTER TABLE tb_mes_thematiques ADD CONSTRAINT FK_thematiques_fournisseur FOREIGN KEY (fournisseur) REFERENCES tb_donnee_seas (fournisseur)
');
 