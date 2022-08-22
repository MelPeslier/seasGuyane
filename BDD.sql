

-- 
-- Malheuresement, on ne peut pas importer des données depuis une BDD déja créée,
-- il nous faut alors recréer tout ce code depuis les commandes make:entity de symfony...
-- 


USE seasguyane;

-- 
-- CREATION DES TABLES
-- 

CREATE TABLE TB_date
	(
		date_ VARCHAR(10) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_echelle
	(
		echelle VARCHAR(20) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_capteur
	(
		capteur VARCHAR(30) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_vehicule
	(
		vehicule VARCHAR(30) NOT NULL,
        image_name VARCHAR(255) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_resolution
	(
		resolution VARCHAR(10) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_fournisseur
	(
		fournisseur VARCHAR(100) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_type_de_produit
	(
		type_de_produit VARCHAR(30) NOT NULL,
        image_name VARCHAR(255) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_thematique
	(
		thematique VARCHAR(30) NOT NULL,
        image_name VARCHAR(255) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_vehicule_spe
	(
		vehicule_spe VARCHAR(30) NOT NULL,
        vehicule VARCHAR(30) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_donnee_seas
	(
		donnee_seas VARCHAR(255) NOT NULL,
        date_ VARCHAR(10) NOT NULL,
        fournisseur VARCHAR(100) NOT NULL,

        capteur VARCHAR(30) NOT NULL,
        echelle VARCHAR(20) NOT NULL,
        vehicule VARCHAR(30) NOT NULL,
        resolution VARCHAR(10) NOT NULL,
        type_de_produit VARCHAR(30) NOT NULL
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_mes_contenus
	(
        image_name VARCHAR(255) NOT NULL,
		
        donnee_seas VARCHAR(255) NOT NULL,
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TB_mes_thematiques
	(
        thematique VARCHAR(30) NOT NULL,
        
        donnee_seas VARCHAR(255) NOT NULL,
	)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 
-- CONTRAINTES, CLEFS PRIMAIRES ET CLEFS ETRANGERES
-- 


ALTER TABLE TB_date
	ADD CONSTRAINT PK_date_ PRIMARY KEY  (date_)
;

ALTER TABLE TB_echelle
	ADD CONSTRAINT PK_echelle PRIMARY KEY  (echelle)
;

ALTER TABLE TB_capteur
	ADD CONSTRAINT PK_capteur PRIMARY KEY  (capteur)
;

ALTER TABLE TB_vehicule
	ADD CONSTRAINT PK_vehicule PRIMARY KEY  (vehicule)
;

ALTER TABLE TB_resolution
	ADD CONSTRAINT PK_resolution PRIMARY KEY  (resolution)
;

ALTER TABLE TB_fournisseur
	ADD CONSTRAINT PK_fournisseur PRIMARY KEY  (fournisseur)
;

ALTER TABLE TB_type_de_produit
	ADD CONSTRAINT PK_type_de_produit PRIMARY KEY  (type_de_produit)
;

ALTER TABLE TB_thematique
	ADD CONSTRAINT PK_thematique PRIMARY KEY  (thematique)
;

ALTER TABLE TB_vehicule_spe
	ADD CONSTRAINT PK_vehicule_spe PRIMARY KEY  (vehicule_spe)
;


-- 
-- CLEFS PRIMAIRES COMPOSEES ET CLEFS ETRANGERES
--


ALTER TABLE TB_donnee_seas
	ADD CONSTRAINT FK_date_ 
		FOREIGN KEY (date_) 
			REFERENCES TB_date(date_),

	ADD CONSTRAINT FK_fournisseur 
		FOREIGN KEY (fournisseur) 
			REFERENCES TB_fournisseur(fournisseur),

	ADD CONSTRAINT FK_capteur 
		FOREIGN KEY (capteur) 
			REFERENCES TB_capteur(capteur),

	ADD CONSTRAINT FK_echelle 
		FOREIGN KEY (echelle) 
			REFERENCES TB_echelle(echelle),

	ADD CONSTRAINT FK_vehicule
		FOREIGN KEY (vehicule) 
			REFERENCES TB_vehicule(vehicule),

	ADD CONSTRAINT FK_resolution 
		FOREIGN KEY (resolution) 
			REFERENCES TB_resolution(resolution),

	ADD CONSTRAINT FK_type_de_produit 
		FOREIGN KEY (type_de_produit) 
			REFERENCES TB_type_de_produit(type_de_produit),
            
	ADD CONSTRAINT PK_donnee_seas PRIMARY KEY  (donnee_seas, date_, fournisseur)
;


ALTER TABLE TB_mes_contenus
	ADD CONSTRAINT FK_contenus_donnee_seas 
		FOREIGN KEY (donnee_seas) 
			REFERENCES TB_donnee_seas(donnee_seas),

	ADD CONSTRAINT FK_contenus_date_
		FOREIGN KEY (date_)
			REFERENCES TB_donnee_seas(date_),

	ADD CONSTRAINT FK_contenus_fournisseur 
		FOREIGN KEY (fournisseur) 
			REFERENCES TB_donnee_seas(fournisseur),

	ADD CONSTRAINT PK_mes_contenus PRIMARY KEY (donnee_seas, date_, fournisseur, image_name)
;


ALTER TABLE TB_mes_thematiques
	ADD CONSTRAINT FK_thematiques_donnee_seas
		FOREIGN KEY (donnee_seas) 
			REFERENCES TB_donnee_seas(donnee_seas),

	ADD CONSTRAINT FK_thematiques_date_	
		FOREIGN KEY (date_)
			REFERENCES TB_donnee_seas(date_),

	ADD CONSTRAINT FK_thematiques_fournisseur 
		FOREIGN KEY (fournisseur) 
			REFERENCES TB_donnee_seas(fournisseur),

	ADD CONSTRAINT FK_thematique 
		FOREIGN KEY (thematique)
			REFERENCES TB_thematique(thematique),

	ADD CONSTRAINT PK_mes_thematiques PRIMARY KEY (donnee_seas, date_, fournisseur, thematique)
;