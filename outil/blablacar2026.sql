-- ==========================================================================
-- BLACLACAR, projet 2026
-- ==========================================================================

DROP TABLE IF EXISTS `reservation`;
DROP TABLE IF EXISTS `trajet`;
DROP TABLE IF EXISTS `ville`;
DROP TABLE IF EXISTS `vehicule`;
DROP TABLE IF EXISTS `utilisateur`;

-- ==========================================================================
-- Table pour les utilisateurs
-- ==========================================================================

create table if not exists utilisateur (
 id int not null,
 nom varchar(40) not null,
 prenom varchar(40) not null,
 role enum('administrateur', 'conducteur', 'passager'), 
 login varchar(20) not null,
 password varchar(20) not null,
 solde decimal(8,2), 
 primary key (id) 
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


insert into utilisateur values (0, 'Le', 'Boss', 'administrateur', 'boss', 'secret', 0.0);

insert into utilisateur values (101, 'Tris', 'Prior', 'conducteur', 'trisprior', 'secret', 100.0);
insert into utilisateur values (102, 'Four', 'Eaton', 'conducteur', 'foureaton', 'secret', 100.0);
insert into utilisateur values (103, 'Jeanine', 'Matthews', 'conducteur', 'jeaninematthews', 'secret', 100.0);
insert into utilisateur values (104, 'Marc', 'Lem', 'conducteur', 'marclem', 'secret', 1000.0);


insert into utilisateur values (201, 'Caleb', 'Prior', 'passager', 'calebprior', 'secret', 100.0);
insert into utilisateur values (202, 'Christina', 'Nobody', 'passager', 'christinanobody', 'secret', 100.0);
insert into utilisateur values (203, 'Peter', 'Hayes', 'passager', 'peterhayes', 'secret', 100.0);
insert into utilisateur values (204, 'Eric', 'Coulter', 'passager', 'ericcoulter', 'secret', 100.0);
insert into utilisateur values (205, 'Tori', 'Wu', 'passager', 'toriwu', 'secret', 100.0);
insert into utilisateur values (206, 'Marcus', 'Eaton', 'passager', 'marcuseaton', 'secret', 100.0);
insert into utilisateur values (207, 'Kang', 'Jack', 'passager', 'jackkang', 'secret', 100.0);


insert into utilisateur values (301,  'GAILLARD', 'Paul', 'passager', 'paulgaillard', 'secret', 1000.0);
insert into utilisateur values (302,  'LERMINIAUX', 'Christian', 'passager', 'christianlerminiaux', 'secret', 1000.0);
insert into utilisateur values (303,  'KOCH', 'Pierre', 'passager', 'pierrekoch', 'secret', 1000.0);
insert into utilisateur values (304,  'COLLET', 'Christophe', 'passager', 'christophecollet', 'secret', 1000.0);

insert into utilisateur values (401, 'VENTURA', 'Lino', 'passager', 'ventura', 'secret', 1500.0);
insert into utilisateur values (402, 'DELON', 'Alain', 'passager', 'delon', 'secret', 1500.0);
insert into utilisateur values (403, 'GABIN', 'Jean', 'passager', 'gabin', 'secret', 1500.0);
insert into utilisateur values (404, 'HUPPERT', 'Isabelle', 'passager', 'huppert', 'secret', 1500.0);
insert into utilisateur values (405, 'COTILLARD', 'Marion', 'passager', 'cotillard', 'secret', 1500.0);
insert into utilisateur values (406, 'DEPP', 'Lily Rose', 'passager', 'depp', 'secret', 1500.0);

-- ==========================================================================
-- Table pour les véhicules
-- ==========================================================================

create table if not exists vehicule (
    id int primary key,
    marque varchar(255) not null,
    modele varchar(255) not null,
    annee int not null,
    immatriculation varchar(20) not null,
    proprietaire_id integer not null,
    foreign key (proprietaire_id) references utilisateur(id)
);

insert into vehicule values (1, 'peugeot', 'p3008', 2020, 'ab-123-cd', 101); 
insert into vehicule values (2, 'renault', 'clio', 2019, 'cd-456-ef', 101); 
insert into vehicule values (3, 'citroën', 'c4', 2018, 'ef-789-gh', 101); 
insert into vehicule values (4, 'toyota', 'yaris', 2017, 'gh-123-ij', 102); 
insert into vehicule values (5, 'volkswagen', 'golf', 2016, 'ij-456-kl', 102); 
insert into vehicule values (6, 'bmw', 'série 3', 2015, 'kl-789-mn', 102); 
insert into vehicule values (7, 'mercedes', 'classe c', 2014, 'mn-123-op', 103); 
insert into vehicule values (8, 'audi', 'a4', 2013, 'op-456-qr', 103); 
insert into vehicule values (9, 'ford', 'focus', 2012, 'qr-789-st', 103); 
insert into vehicule values(10, 'opel', 'astra', 2011, 'st-123-uv', 103);


-- ==========================================================================
-- Table pour les villes
-- ==========================================================================

create table if not exists ville (
    id int primary key,
    nom varchar(255) not null unique
);

insert into ville values (1, "paris");
insert into ville values (2, "marseille");
insert into ville values (3, "lyon");
insert into ville values (4, "toulouse");
insert into ville values (5, "nice");
insert into ville values (6, "nantes");
insert into ville values (7, "montpellier");
insert into ville values (8, "strasbourg");
insert into ville values (9, "bordeaux");
insert into ville values (10, "lille");
insert into ville values (11, "rennes");
insert into ville values (12, "reims");
insert into ville values (13, "le havre");
insert into ville values (14, "saint-étienne");
insert into ville values (15, "toulon");
insert into ville values (16, "grenoble");
insert into ville values (17, "dijon");
insert into ville values (18, "angers");
insert into ville values (19, "villeurbanne");
insert into ville values (20, "saint-denis");
insert into ville values (21, "le mans");
insert into ville values (22, "aix-en-provence");
insert into ville values (23, "clermont-ferrand");
insert into ville values (24, "brest");
insert into ville values (25, "limoges");
insert into ville values (26, "tours");
insert into ville values (27, "amiens");
insert into ville values (28, "perpignan");
insert into ville values (29, "metz");
insert into ville values (30, "besançon");
insert into ville values (31, "boulogne-billancourt");
insert into ville values (32, "orléans");
insert into ville values (33, "mulhouse");
insert into ville values (34, "rouen");
insert into ville values (35, "caen");
insert into ville values (36, "argenteuil");
insert into ville values (37, "montreuil");
insert into ville values (38, "nancy");
insert into ville values (39, "roubaix");
insert into ville values (40, "tourcoing");
insert into ville values (41, "nanterre");
insert into ville values (42, "avignon");
insert into ville values (43, "vitry-sur-seine");
insert into ville values (44, "créteil");
insert into ville values (45, "dunkerque");
insert into ville values (46, "poitiers");
insert into ville values (47, "asnières-sur-seine");
insert into ville values (48, "courbevoie");
insert into ville values (49, "fort-de-france");
insert into ville values (50, "colombes");


-- ==========================================================================
-- table pour 
-- ==========================================================================

create table if not exists trajet (
    id int primary key,
    ville_depart int not null,
    ville_arrivee int not null,
    conducteur_id int not null,
    vehicule_id int not null,
    prix decimal(10, 2) not null,
    date_depart date not null,
    heure_depart time not null,
    statut enum('actif', 'passif') not null,
    foreign key (ville_depart) references ville(id),
    foreign key (ville_arrivee) references ville(id),
    foreign key (conducteur_id) references utilisateur(id),
    foreign key (vehicule_id) references vehicule(id)
);

INSERT INTO trajet  VALUES (1, 28, 36, 103, 1, 10.6, '2026-05-10', '13:00:00', 'passif');
INSERT INTO trajet  VALUES (2, 44, 39, 102, 8,  7.5, '2026-04-30', '08:00:00', 'actif');
INSERT INTO trajet  VALUES (3, 39, 40, 103, 1,  4.8, '2026-04-16', '11:00:00', 'passif');
INSERT INTO trajet  VALUES (4, 30, 15, 101, 5,  6.5, '2026-05-09', '13:00:00', 'actif');
INSERT INTO trajet  VALUES (5, 31, 22, 103, 5, 19.0, '2026-04-29', '17:00:00', 'actif');
INSERT INTO trajet  VALUES (6, 28, 26, 101, 3, 28.2, '2026-04-26', '06:00:00', 'passif');
INSERT INTO trajet  VALUES (7, 36, 41, 103, 9, 47.1, '2026-05-12', '15:00:00', 'actif');
INSERT INTO trajet  VALUES (8, 10,  4, 101, 4, 13.5, '2026-04-28', '07:00:00', 'passif');
INSERT INTO trajet  VALUES (9, 38, 23, 101, 8,  9.7, '2026-04-30', '06:00:00', 'passif');
INSERT INTO trajet  VALUES (10, 25, 1, 103, 1, 19.8, '2026-05-01', '10:00:00', 'actif');

INSERT INTO trajet  VALUES (11, 12, 35, 101,  4, 15.2, '2026-05-18', '09:00:00', 'actif');
INSERT INTO trajet  VALUES (12, 20, 10, 103,  6, 10.0, '2026-05-20', '15:00:00', 'passif');
INSERT INTO trajet  VALUES (13, 33, 19, 102,  2, 20.6, '2026-05-22', '11:00:00', 'actif');
INSERT INTO trajet  VALUES (14, 16, 25, 101, 10, 10.3, '2026-05-24', '16:00:00', 'passif');
INSERT INTO trajet  VALUES (15,  3, 30, 103,  7, 20.0, '2026-05-26', '08:00:00', 'actif');
INSERT INTO trajet  VALUES (16, 27, 14, 102,  5, 15.5, '2026-05-28', '14:00:00', 'passif');
INSERT INTO trajet  VALUES (17, 18, 2,  101,  3, 25.0, '2026-05-30', '10:00:00', 'actif');
INSERT INTO trajet  VALUES (18, 29, 37, 103,  9, 15.0, '2026-06-01', '13:00:00', 'passif');
INSERT INTO trajet  VALUES (19, 32, 40, 102,  8, 13.0, '2026-06-03', '17:00:00', 'actif');
INSERT INTO trajet  VALUES (20, 45, 11, 101,  1, 12.0, '2026-06-05', '09:00:00', 'passif');


-- ==========================================================================
-- table pour 
-- ==========================================================================

create table if not exists reservation (
    id int primary key,
    trajet_id int not null,
    passager_id int  not null,
    foreign key (trajet_id) references trajet(id),
    foreign key (passager_id) references utilisateur(id)
);


INSERT INTO reservation VALUES (1,  19, 201);
INSERT INTO reservation VALUES (2,   4, 202);
INSERT INTO reservation VALUES (3,  18, 203);
INSERT INTO reservation VALUES (4,  10, 204);
INSERT INTO reservation VALUES (5,  16, 205);
INSERT INTO reservation VALUES (6,  11, 206);
INSERT INTO reservation VALUES (7,  14, 201);
INSERT INTO reservation VALUES (8,  17, 202);
INSERT INTO reservation VALUES (9,   8, 203);
INSERT INTO reservation VALUES (10,  1, 204);
INSERT INTO reservation VALUES (11,  9, 205);
INSERT INTO reservation VALUES (12,  1, 206);
INSERT INTO reservation VALUES (13, 18, 201);
INSERT INTO reservation VALUES (14,  3, 202);
INSERT INTO reservation VALUES (15,  9, 203);
INSERT INTO reservation VALUES (16, 11, 204);
INSERT INTO reservation VALUES (17,  4, 205);
INSERT INTO reservation VALUES (18,  7, 206);
INSERT INTO reservation VALUES (19, 17, 201);
INSERT INTO reservation VALUES (20, 19, 201);