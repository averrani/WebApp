CREATE TABLE Utilisateur (
  id_user INTEGER PRIMARY KEY AUTOINCREMENT,
  Nom TEXT NOT NULL,
  mdp TEXT NOT NULL
);

CREATE TABLE Cours (
  id_cours INTEGER PRIMARY KEY AUTOINCREMENT,
  nom_du_cours TEXT NOT NULL,
  Nombre_de_topics INTEGER DEFAULT 0,
  Nombre_de_posts INTEGER DEFAULT 0,
  date TEXT NOT NULL 
);

CREATE TABLE Sujet (
  id_sujet INTEGER PRIMARY KEY AUTOINCREMENT,
  id_cours INTEGER NOT NULL,
  Nom_de_topic TEXT NOT NULL,
  Nombre_de_posts INTEGER DEFAULT 0,
  date TEXT NOT NULL,
  FOREIGN KEY (id_cours) REFERENCES Cours(id_cours)
);

CREATE TABLE Post (
  id_post INTEGER PRIMARY KEY AUTOINCREMENT,
  id_sujet INTEGER NOT NULL,
  id_user INTEGER NOT NULL,
  Texte_de_post TEXT NOT NULL,
  date TEXT NOT NULL,
  FOREIGN KEY (id_sujet) REFERENCES Sujet(id_sujet),
  FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user)
);

CREATE TABLE Suit_un_cours (
  id_user INTEGER NOT NULL,
  id_cours INTEGER NOT NULL,
  PRIMARY KEY (id_user, id_cours),
  FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user),
  FOREIGN KEY (id_cours) REFERENCES Cours(id_cours)
);
