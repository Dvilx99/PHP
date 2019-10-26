CREATE TABLE article (
	ref INTEGER PRIMARY KEY,
	libelle TEXT,
	categorie INTEGER,
	prix REAL,
	image TEXT,
	description TEXT,
	FOREIGN KEY(categorie) REFERENCES categorie(id)
);

CREATE TABLE categorie (
	id INTEGER PRIMARY KEY,
	nom TEXT,
	pere INTEGER,
	FOREIGN KEY(pere) REFERENCES categorie(id)
);

CREATE TABLE utilisateur (
	nom TEXT,
	prenom TEXT,
	email TEXT PRIMARY KEY,
	mdp TEXT
);
CREATE TABLE panier(
	utilisateur TEXT,
	article INTEGER,
	PRIMARY KEY (utilisateur,article),
	FOREIGN KEY (utilisateur) REFERENCES Utilisateur (email),
	FOREIGN KEY (article) REFERENCES Article (ref)
);
