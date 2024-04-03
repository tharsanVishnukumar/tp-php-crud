create table if not exists Classe(
    id int auto_increment,
    libelle varchar(50) unique,
    primary key (id)
);

create table if not exists Diplome(
    id int auto_increment,
    libelle varchar(50),
    primary key (id)
);

create table if not exists Eleve(
    id int auto_increment,
    nom varchar(100) not null,
    prenom varchar(100) not null,
    email varchar(255) not null unique,
    date_de_naissance Date,
    dateDeCreation Date default now(),
    classe_Id int,
    constraint FK_Classe_Id foreign key (classe_Id) references Classe(id),
    primary key (id)
);

create table if not exists Diplome_Posseder(
    eleve_id int,
    diplome_id int,
    constraint foreign key(eleve_id) references Eleve(id),
    constraint foreign key(diplome_id) references Diplome(id),
    constraint primary key (eleve_id, diplome_id)
);