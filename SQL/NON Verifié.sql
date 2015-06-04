create table Client (
	id SERIAL,
	email varchar(40) unique not null,
	password char(40) not null,
	PRIMARY KEY(id)
);
CREATE TABLE phpro_users (
phpro_user_id int(11) NOT NULL auto_increment,
phpro_username varchar(20) NOT NULL,
phpro_password char(40) NOT NULL,
PRIMARY KEY (phpro_user_id),
UNIQUE KEY phpro_username (phpro_username)
);
create table emetUnAvis (
	note integer check (note between 0 and 5),
	commentaire varchar2(500)
	client varchar2(50) reference Client(email),
	article varchar2(50) reference Article(titre)
);
create table Application (
	titre varchar2(50) primary key
);
create table Ressource (
	titre varchar(50) primary key
	application varchar(50) reference Application(titre)
);
CREATE table Article(
	titre varchar2(50) primary key,
	editeur varchar2(50) reference Editeur(idEditeur),
	prix number
);

Create table Editeur(
	idEditeur varchar2(50) primary key,
	contact varchar2(50),
	url varchar2(50)
);

Create table SystemeExploitation(
	version varchar2(50),
	nom varchar2(50)
);

Create table Modele(
	designation varchar2(50) primary key,
	nomConstructeur varchar2(50),
	versionDuSyst varchar2(50) reference SystemeExploitation(version) unique not null
);

Create table CPP(
	numero varchar2(50),
	montantDepart number,
	montCourant number,
	dateValide date,
	clientPaye varchar2(50) reference Client(email),
	idPaiement ?? reference Paye(paiement) NOT NULL
);

Create table Terminal(
	numSerie varchar2(50) primary key,
	typeModele varchar2(50) reference Modele(designation) NOT NULL,
	clientUser varchar2(50) reference Client(email),
	idAchatSimple varchar2(50) reference AchatSimple(ipPaiement),
	idAchatAbo varchar2(50) reference Abonnement(idPaiement),
);