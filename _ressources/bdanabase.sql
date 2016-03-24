DROP DATABASE IF EXISTS MLR1;

CREATE DATABASE IF NOT EXISTS MLR1;
USE MLR1;
# -----------------------------------------------------------------------------
#       TABLE : FACTURE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FACTURE
 (
   NUM_FACTURE INTEGER(2) NOT NULL  ,
   NUM_CONGRESSISTE SMALLINT(1) NOT NULL  ,
   DATE_FACTURE DATE NULL  ,
   CODE_REGLEMENT BOOL NULL  
   , PRIMARY KEY (NUM_FACTURE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FACTURE
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_FACTURE_CONGRESSISTE
     ON FACTURE (NUM_CONGRESSISTE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONGRESSISTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONGRESSISTE
 (
   NUM_CONGRESSISTE SMALLINT(1) NOT NULL  ,
   NUM_ORGANISME SMALLINT(1) NULL  ,
   NUM_HOTEL SMALLINT(1) NOT NULL  ,
   NOM_CONGRESSISTE CHAR(32) NULL  ,
   PRÉNOM_CONGRESSISTE CHAR(32) NULL  ,
   ADRESSE_CONGRESSISTE CHAR(32) NULL  ,
   TEL_CONGRESSISTE CHAR(10) NULL  ,
   DATE_INSCRIPTION DATE NULL  ,
   CODE_ACCOMPAGNATEUR SMALLINT(1) NULL  
   , PRIMARY KEY (NUM_CONGRESSISTE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONGRESSISTE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONGRESSISTE_ORGANISME_PAY
     ON CONGRESSISTE (NUM_ORGANISME ASC);

CREATE  INDEX I_FK_CONGRESSISTE_HOTEL
     ON CONGRESSISTE (NUM_HOTEL ASC);

# -----------------------------------------------------------------------------
#       TABLE : SESSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SESSION
 (
   NUM_SESSION SMALLINT(1) NOT NULL  ,
   DATE_SESSION DATE NULL  ,
   HEURE_SESSION TIME NULL  ,
   NOM_SESSION CHAR(32) NULL  ,
   PRIX_SESSION INTEGER(2) NULL  
   , PRIMARY KEY (NUM_SESSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ORGANISME_PAYEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ORGANISME_PAYEUR
 (
   NUM_ORGANISME SMALLINT(1) NOT NULL  ,
   NOM_ORGANISME CHAR(32) NULL  ,
   ADRESSE_ORGANISME CHAR(32) NULL  
   , PRIMARY KEY (NUM_ORGANISME) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ACTIVITÉ
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ACTIVITE
 (
   NUM_ACTIVITE SMALLINT(1) NOT NULL  ,
   NOM_ACTIVITE CHAR(32) NULL  ,
   DATE_ACTIVITE DATE NULL  ,
   HEURE_ACTIVITE TIME NULL  ,
   PRIX_ACTIVITE INTEGER(2) NULL  
   , PRIMARY KEY (NUM_ACTIVITE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : HOTEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS HOTEL
 (
   NUM_HOTEL SMALLINT(1) NOT NULL  ,
   NOM__HOTEL CHAR(32) NULL  ,
   ADRESSE__HOTEL CHAR(32) NULL  ,
   NOMBRE_ETOILES SMALLINT(1) NULL  ,
   PRIX_PARTICIPANT DECIMAL(5,2) NULL  ,
   PRIX_SUPPL DECIMAL(5,2) NULL  
   , PRIMARY KEY (NUM_HOTEL) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPATION_ACTIVITE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPATION_ACTIVITE
 (
   NUM_CONGRESSISTE SMALLINT(1) NOT NULL  ,
   NUM_ACTIVITE SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUM_CONGRESSISTE,NUM_ACTIVITE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPATION_ACTIVITE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPATION_ACTIVITE_CON
     ON PARTICIPATION_ACTIVITE (NUM_CONGRESSISTE ASC);

CREATE  INDEX I_FK_PARTICIPATION_ACTIVITE_ACT
     ON PARTICIPATION_ACTIVITE (NUM_ACTIVITE ASC);

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPATION_SESSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPATION_SESSION
 (
   NUM_CONGRESSISTE SMALLINT(1) NOT NULL  ,
   NUM_SESSION SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUM_CONGRESSISTE,NUM_SESSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPATION_SESSION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPATION_SESSION_CONG
     ON PARTICIPATION_SESSION (NUM_CONGRESSISTE ASC);

CREATE  INDEX I_FK_PARTICIPATION_SESSION_SESS
     ON PARTICIPATION_SESSION (NUM_SESSION ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE FACTURE 
  ADD FOREIGN KEY FK_FACTURE_CONGRESSISTE (NUM_CONGRESSISTE)
      REFERENCES CONGRESSISTE (NUM_CONGRESSISTE) ;


ALTER TABLE CONGRESSISTE 
  ADD FOREIGN KEY FK_CONGRESSISTE_ORGANISME_PAYEUR (NUM_ORGANISME)
      REFERENCES ORGANISME_PAYEUR (NUM_ORGANISME) ;


ALTER TABLE CONGRESSISTE 
  ADD FOREIGN KEY FK_CONGRESSISTE_HOTEL (NUM_HOTEL)
      REFERENCES HOTEL (NUM_HOTEL) ;


ALTER TABLE PARTICIPATION_ACTIVITE 
  ADD FOREIGN KEY FK_PARTICIPATION_ACTIVITE_CONGRE (NUM_CONGRESSISTE)
      REFERENCES CONGRESSISTE (NUM_CONGRESSISTE) ;


ALTER TABLE PARTICIPATION_ACTIVITE 
  ADD FOREIGN KEY FK_PARTICIPATION_ACTIVITE_ACTIVI (NUM_ACTIVITE)
      REFERENCES ACTIVITE (NUM_ACTIVITE) ;


ALTER TABLE PARTICIPATION_SESSION 
  ADD FOREIGN KEY FK_PARTICIPATION_SESSION_CONGRES (NUM_CONGRESSISTE)
      REFERENCES CONGRESSISTE (NUM_CONGRESSISTE) ;


ALTER TABLE PARTICIPATION_SESSION 
  ADD FOREIGN KEY FK_PARTICIPATION_SESSION_SESSION (NUM_SESSION)
      REFERENCES SESSION (NUM_SESSION) ;

