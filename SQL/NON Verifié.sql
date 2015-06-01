Create table CPP(
	numero varchar(50),
	montantDepart number,
	montCourant number,
	dateValide date,
	clientPaye varchar(50) reference Client(email),
	idPaiement ?? reference Paye(paiement) NOT NULL
);

Create table Terminal(
	numSerie varchar(50) primary key,
	typeModele varchar(50) reference Modele(designation) NOT NULL,
	clientUser varchar(50) reference Client(email),
	idAchatSimple varchar(50) reference AchatSimple(ipPaiement),
	idAchatAbo varchar(50) reference Abonnement(idPaiement),
);

create table AchatSimple (
	id SERIAL,
	datePaye date,
	titre varchar(50) references Article(titre),
	idClient integer references Client(id),
	idMoyen integer references Moyen(id)
);
create table moyen (
	id SERIAL,
	num varchar(50),not null,
	type
	montantDepart numeric,
	montCourant numeric,
	dateValide date
);
