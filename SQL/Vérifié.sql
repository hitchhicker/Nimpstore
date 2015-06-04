CREATE TABLE Client (
	email varchar(40) PRIMARY KEY,
	password char(40) not null
);

CREATE TABLE Editeur(
	id SERIAL,
	nom varchar(40) unique not null,
	contact varchar(50),
	url varchar(50),
	PRIMARY KEY (id)
);
CREATE TABLE Article(
	 titre varchar(50) primary key,
	 editeur integer references Editeur(id),
	 prix numeric
);
CREATE TABLE emetUnAvis (
	 note integer check (note between 0 and 5),
	 commentaire varchar(500),
	 client varchar(50) references Client(email),
	 article varchar(50) references Article(titre)
);
CREATE TABLE Application (
	titre varchar(50) references Article(titre) primary key
);
CREATE TABLE Ressource (
	titre varchar(50) references Article(titre) primary key,
	application varchar(50) references Application(titre)
);


Create table SystemeExploitation(
	id SERIAL,
	versionA varchar(50),
	nom varchar(50),
	PRIMARY KEY(id)
);

Create table Modele(
	designation varchar(50) primary key,
	nomConstructeur varchar(50),
	idDuSyst integer references SystemeExploitation(id) not null
);


// poser la question au prof;
CREATE TABLE CompatibleAvec (
	titreA varchar(50) references Article(titre),
	vers varchar(50) references SystemeExploitation(versionA)
);

// pas de cle ??
CREATE TABLE Installation(
	terminalInst varchar(50) references Terminal(numSerie),
	articleInst varchar(50) references Article(titre),
	dateInst date
);

CREATE TABLE Abonnement(
	idPaiement varchar(50)PRIMARY KEY,
	date Date,
	titreA varchar(50) references Article(titre),
	client varchar(50) references Client(email),
	idM serial references Moyen(id)
);
CREATE TYPE typeMoyen AS ENUM ('CB', 'CPP');

CREATE TABLE Moyen (
 id SERIAL PRIMARY KEY,
 num varchar(50) not null,
 type typeMoyen,
 montantDepart numeric,
 montCourant numeric,
 dateValide date
);
CREATE TYPE typeDuree AS ENUM ('mois', 'annne','semestre');
CREATE TABLE Automatique (
 dateDePaiment date,
 duree typeDuree,
 titre varchar(50) references Article(titre),
 idClient varchar(50) references Client(email),
 idMoyen integer references Moyen(id)
);
CREATE TABLE Defini (
 dureeDefini integer,
 duree typeDuree,
 titre varchar(50) references Article(titre),
 idClient varchar(50) references Client(email),
 idMoyen integer references Moyen(id)
);

CREATE TABLE Terminal(
	numSerie varchar(50) primary key,
	typeModele varchar(50) references Modele(designation) NOT NULL,
	clientUser varchar(50) references Client(email),
	idAchatSimple serial references Moyen(id)
);


CREATE TABLE AchatSimple (
 id SERIAL PRIMARY KEY,
 datePaye date,
 titre varchar(50) references Article(titre),
 idClient varchar(50) references Client(email),
 idMoyen integer references Moyen(id)
);

