create table Client (
	email varchar(40) PRIMARY KEY,
	password char(40) not null
);

Create table Editeur(
	id SERIAL,
	nom varchar(40) unique not null,
	contact varchar(50),
	url varchar(50),
	PRIMARY KEY (id)
);
CREATE table Article(
	 titre varchar(50) primary key,
	 editeur integer references Editeur(id),
	 prix numeric
);

create table emetUnAvis (
	 note integer check (note between 0 and 5),
	 commentaire varchar(500),
	 client varchar(50) references Client(email),
	 article varchar(50) references Article(titre),
	 PRIMARY key(client,article)
);
create table Application (
	titre varchar(50) references Article(titre) primary key
);
create table Ressource (
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
	versionDuSyst varchar(50) references SystemeExploitation(versionA) unique not null
);

create table CompatibleAvec (
 titreA varchar(50) references Article(titre),
 iddusyst integer references SystemeExploitation(id),
 primary key(titreA,iddusyst)
)

Create table Terminal(
	numSerie varchar(50) primary key,
	typeModele varchar(50) references Modele(designation) NOT NULL,
	clientUser varchar(50) references Client(email),
	idAchatSimple integer references Moyen(id)
);

create table Installation(
	terminalInst varchar(50) references Terminal(numSerie),
	articleInst varchar(50) references Article(titre),
	dateInst date,
	primary key(terminalInst,articleInst)
);

CREATE TYPE typeMoyen AS ENUM ('CB', 'CPP');

create table Moyen (
 id SERIAL PRIMARY KEY,
 num varchar(50) not null,
 type typeMoyen,
 montantDepart numeric,
 montCourant numeric,
 dateValide date
);


create table AchatSimple (
 idPaiement SERIAL PRIMARY KEY,
 dateDePaiment date,
 titre varchar(50) references Article(titre),
 idClient varchar(50) references Client(email),
 idMoyen integer references Moyen(id)
);

CREATE TYPE typeDuree AS ENUM ('mois', 'annne','semestre');
create table Automatique (
idPaiement SERIAL PRIMARY KEY,
 dateDePaiment date,
 duree typeDuree,
 titre varchar(50) references Article(titre),
 idClient varchar(50) references Client(email),
 idMoyen integer references Moyen(id)
);

create table Defini (
idPaiement SERIAL PRIMARY KEY,
 dateDePaiment date,
 dureeDefini integer,
 duree typeDuree,
 titre varchar(50) references Article(titre),
 idClient varchar(50) references Client(email),
 	idMoyen integer references Moyen(id)
); 


insert into SystemeExploitation values (nextval('systemeexploitation_id_seq'),'5.0','Android');
insert into SystemeExploitation values (nextval('systemeexploitation_id_seq'),'8.0','iOs');
insert into Modele values ('Nexus','A',1);
insert into Terminal values ('111','Nexus','test',null);
SELECT numSerie, typeModele FROM Terminal WHERE clientUser = 'test'; 