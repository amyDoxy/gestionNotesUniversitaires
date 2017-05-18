CREATE DATABASE  Gestion_Notes;
USE Gestion_Notes;

CREATE TABLE UDM_statut(
	id_statut INT NOT NULL AUTO_INCREMENT,
    libelle_statut enum('etudiant', 'professeur', 'chef de departement', 'secretaire', 'autre'),
	primary key (`id_statut`)
);

CREATE TABLE `UDM_countries` (
	`id` int(11) NOT NULL auto_increment,
	`country_code` varchar(2) NOT NULL default '',
	`country_name` varchar(100) NOT NULL default '',
	PRIMARY KEY (`id`)
);

CREATE TABLE UDM_region(
	id_region int not null auto_increment,
    region_name varchar(30),
    primary key (id_region)
);
CREATE TABLE UDM_faculte(
	id_faculte int not null auto_increment,
    nom_faculte varchar(30),
    primary key(`id_faculte`)
);
CREATE TABLE UDM_departement(
	id_departement int not null auto_increment,
    nom_departement varchar(30),
    faculte int,
    primary key(`id_departement`),
    foreign key (`faculte`) references UDM_faculte(id_faculte)
);

CREATE TABLE UDM_InfosUtilisateur(
	id_infosUtilisateur int NOT NULL  AUTO_INCREMENT,
	
    nom_utilisateur varchar(30),
    prenom_utilisateur varchar(30),
    deuxieme_prenom_utilisateur varchar(30),
    email_utilisateur varchar(255),
    statut int not null,
	num_telephone VARCHAR(20),
    adresse VARCHAR (100) NOT NULL,
    ville VARCHAR (50),
    region int,
    pays_origine int,
    PRIMARY KEY (`id_infosUtilisateur`),
    FOREIGN KEY (`statut`) references `UDM_statut`(id_statut),
    FOREIGN KEY (`region`) references `UDM_region`(id_region),
    FOREIGN KEY (`pays_origine`) references `UDM_countries`(id)
);

CREATE TABLE UDM_utilisateur(
	username char(10) NOT NULL,
    motDePasse varchar(20),
    active bool,
    id_infosUtilisateur int,
    primary key (`username`),
    FOREIGN key(`id_infosUtilisateur`) references UDM_InfosUtilisateur(id_infosUtilisateur)
);


CREATE TABLE UDM_universitaire(
	id_universitaire int not null auto_increment,
    username char(10),
    departement int,
    primary key(id_universitaire),
    foreign key(departement) references UDM_departement(id_departement),
    foreign key	(username) references UDM_utilisateur(username)
);

CREATE TABLE UDM_professeur(
	id_professeur int not null auto_increment,
    grade varchar(20),
    specialite varchar(50),
    universitaire int,
    primary key(id_professeur),
    foreign key(universitaire) references UDM_universitaire(id_universitaire)
);
 
create table UDM_chef_de_departement(
	id_chef_de_departement int not null auto_increment,
    id_professeur int,
    primary key(id_chef_de_departement),
    foreign key(id_professeur) references UDM_professeur(id_professeur)
);

CREATE TABLE UDM_etudiant(
	id_etudiant int not null auto_increment,
    batch varchar(50),
    type enum('temps plein', 'temps partiel'),
    universitaire int,
    primary key(id_etudiant),
    foreign key(universitaire) references UDM_universitaire(id_universitaire),
    FOREIGN KEY (batch) REFERENCES UDM_batch(batch);
);

CREATE TABLE UDM_secretaire(
	id_secretaire int not null auto_increment,
    universitaire int,
    primary key(id_secretaire),
    foreign key(universitaire) references UDM_universitaire(id_universitaire)
);

CREATE TABLE UDM_cours(
	id_cours int not null auto_increment,
    libelle_cours varchar(50),
    coeff_cours float(4,2) unsigned,
    id_dispensateur int,
    primary key(`id_cours`),
    foreign key(`id_dispensateur`) references UDM_professeur(id_professeur)
);


CREATE TABLE UDM_evaluation(
	id_evaluation int not null auto_increment,
    libelle_evaluation varchar(50),
    coeff_evaluation float(4,2),
    cotation_evaluation  int unsigned not null,
    date_evaluation datetime,
    id_cours int,
    primary key(`id_evaluation`),
    foreign key(`id_cours`) references UDM_cours(id_cours)
);

CREATE TABLE UDM_notes(
	id_notes int not null auto_increment,
    points float(6,2) unsigned,
    id_evaluation int,
    primary key(`id_notes`),
    foreign key (`id_evaluation`) references UDM_evaluation(id_evaluation)
);

CREATE TABLE UDM_administrateur_systeme(
	id_administrateur_systeme int auto_increment,
    username char(10),
    primary key(`id_administrateur_systeme`),
    foreign key	(username) references UDM_utilisateur(username)
)

CREATE TABLE UDM_batch_module(
    id_batch_module INT NOT NULL auto_increment,
    nombre_etudiant INT,
    coeff_module FLOAT(4,2),
    PRIMARY KEY(id_batch_module)
);

