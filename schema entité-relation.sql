#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Joueur
#------------------------------------------------------------

CREATE TABLE Joueur(
        nom                 Varchar (25) ,
        pernom              Varchar (25) ,
        sexe                Char (25) ,
        date_naissance      Date ,
        villle_residence    Varchar (25) ,
        valeur_hachage_mdp  Varchar (25) ,
        pseudonyme          Varchar (25) NOT NULL ,
        bonus               Varchar (25) ,
        malus               Varchar (25) ,
        nb_parties_initiees Int ,
        nb_partiesjouees    Int ,
        PRIMARY KEY (pseudonyme )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Navire
#------------------------------------------------------------

CREATE TABLE Navire(
        type                Varchar (25) ,
        taille              Float ,
        lien_hypertexte     Varchar (25) ,
        coordonnees         Int ,
        etat                Varchar (25) ,
        sens                Char (25) ,
        position_proue      Char (25) ,
        code_alphanumerique Int NOT NULL ,
        pseudonyme          Varchar (25) ,
        PRIMARY KEY (code_alphanumerique )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Partie
#------------------------------------------------------------

CREATE TABLE Partie(
        nb_moyen_tirs_avantvictoire Float NOT NULL ,
        PRIMARY KEY (nb_moyen_tirs_avantvictoire )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Action
#------------------------------------------------------------

CREATE TABLE Action(
        reparation       Varchar (25) ,
        chgt_coordonnees Int ,
        deplacement      Char (25) NOT NULL ,
        PRIMARY KEY (deplacement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Application
#------------------------------------------------------------

CREATE TABLE Application(
        nb_partiesgagnees                        Int ,
        nb_partiesperdues                        Int ,
        ratio_nb_parties_bonusrare               Int ,
        nb_parties_carte_bonus_Étoile_de_la_mort Int ,
        nb_moyen_type_cartetiree                 Int ,
        nb_partiesjouees_sans_aucune_carterare   Int ,
        nb_partiesjouees_plus10cartesrarestirees Int ,
        nb_parties_initiees                      Int NOT NULL ,
        nb_partiesjouees                         Int NOT NULL ,
        pseudonyme                               Varchar (25) ,
        PRIMARY KEY (nb_parties_initiees ,nb_partiesjouees )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tour
#------------------------------------------------------------

CREATE TABLE Tour(
        coordonnees_tir Int ,
        information_tir Varchar (25) ,
        numero          Int NOT NULL ,
        PRIMARY KEY (numero )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Cartes
#------------------------------------------------------------

CREATE TABLE Cartes(
        bonus       Varchar (25) NOT NULL ,
        malus       Varchar (25) NOT NULL ,
        deplacement Char (25) ,
        PRIMARY KEY (bonus ,malus )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tir
#------------------------------------------------------------

CREATE TABLE Tir(
        impacts Char (25) NOT NULL ,
        PRIMARY KEY (impacts )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: initie
#------------------------------------------------------------

CREATE TABLE initie(
        pseudonyme                  Varchar (25) NOT NULL ,
        nb_moyen_tirs_avantvictoire Float NOT NULL ,
        PRIMARY KEY (pseudonyme ,nb_moyen_tirs_avantvictoire )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: se décompose
#------------------------------------------------------------

CREATE TABLE se_decompose(
        nb_moyen_tirs_avantvictoire Float NOT NULL ,
        numero                      Int NOT NULL ,
        PRIMARY KEY (nb_moyen_tirs_avantvictoire ,numero )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: est associée
#------------------------------------------------------------

CREATE TABLE est_associee(
        deplacement Char (25) NOT NULL ,
        numero      Int NOT NULL ,
        PRIMARY KEY (deplacement ,numero )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: agit sur
#------------------------------------------------------------

CREATE TABLE agit_sur(
        bonus   Varchar (25) NOT NULL ,
        malus   Varchar (25) NOT NULL ,
        impacts Char (25) NOT NULL ,
        PRIMARY KEY (bonus ,malus ,impacts )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: touche
#------------------------------------------------------------

CREATE TABLE touche(
        impacts             Char (25) NOT NULL ,
        code_alphanumerique Int NOT NULL ,
        PRIMARY KEY (impacts ,code_alphanumerique )
)ENGINE=InnoDB;

ALTER TABLE Joueur ADD CONSTRAINT FK_Joueur_bonus FOREIGN KEY (bonus) REFERENCES Cartes(bonus);
ALTER TABLE Joueur ADD CONSTRAINT FK_Joueur_malus FOREIGN KEY (malus) REFERENCES Cartes(malus);
ALTER TABLE Joueur ADD CONSTRAINT FK_Joueur_nb_parties_initiees FOREIGN KEY (nb_parties_initiees) REFERENCES Application(nb_parties_initiees);
ALTER TABLE Joueur ADD CONSTRAINT FK_Joueur_nb_partiesjouees FOREIGN KEY (nb_partiesjouees) REFERENCES Application(nb_partiesjouees);
ALTER TABLE Navire ADD CONSTRAINT FK_Navire_pseudonyme FOREIGN KEY (pseudonyme) REFERENCES Joueur(pseudonyme);
ALTER TABLE Application ADD CONSTRAINT FK_Application_pseudonyme FOREIGN KEY (pseudonyme) REFERENCES Joueur(pseudonyme);
ALTER TABLE Cartes ADD CONSTRAINT FK_Cartes_deplacement FOREIGN KEY (deplacement) REFERENCES Action(deplacement);
ALTER TABLE initie ADD CONSTRAINT FK_initie_pseudonyme FOREIGN KEY (pseudonyme) REFERENCES Joueur(pseudonyme);
ALTER TABLE initie ADD CONSTRAINT FK_initie_nb_moyen_tirs_avantvictoire FOREIGN KEY (nb_moyen_tirs_avantvictoire) REFERENCES Partie(nb_moyen_tirs_avantvictoire);
ALTER TABLE se_decompose ADD CONSTRAINT FK_se_decompose_nb_moyen_tirs_avantvictoire FOREIGN KEY (nb_moyen_tirs_avantvictoire) REFERENCES Partie(nb_moyen_tirs_avantvictoire);
ALTER TABLE se_decompose ADD CONSTRAINT FK_se_decompose_numero FOREIGN KEY (numero) REFERENCES Tour(numero);
ALTER TABLE est_associee ADD CONSTRAINT FK_est_associee_deplacement FOREIGN KEY (deplacement) REFERENCES Action(deplacement);
ALTER TABLE est_associee ADD CONSTRAINT FK_est_associee_numero FOREIGN KEY (numero) REFERENCES Tour(numero);
ALTER TABLE agit_sur ADD CONSTRAINT FK_agit_sur_bonus FOREIGN KEY (bonus) REFERENCES Cartes(bonus);
ALTER TABLE agit_sur ADD CONSTRAINT FK_agit_sur_malus FOREIGN KEY (malus) REFERENCES Cartes(malus);
ALTER TABLE agit_sur ADD CONSTRAINT FK_agit_sur_impacts FOREIGN KEY (impacts) REFERENCES Tir(impacts);
ALTER TABLE touche ADD CONSTRAINT FK_touche_impacts FOREIGN KEY (impacts) REFERENCES Tir(impacts);
ALTER TABLE touche ADD CONSTRAINT FK_touche_code_alphanumerique FOREIGN KEY (code_alphanumerique) REFERENCES Navire(code_alphanumerique);
