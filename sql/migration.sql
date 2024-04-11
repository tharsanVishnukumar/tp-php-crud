create table if not exists Classe(
    id int auto_increment,
    libelle varchar(50) unique,
    primary key (id)
);

create table if not exists Diplome(
    id int auto_increment,
    libelle varchar(50) unique,
    primary key (id)
);

create table if not exists Eleve(
    id int auto_increment,
    nom varchar(100) not null,
    prenom varchar(100) not null,
    email varchar(255) not null unique,
    date_de_naissance Date,
    date_de_creation Date default now(),
    classe_Id int,
    constraint FK_Classe_Id foreign key (classe_Id) references Classe(id) on delete set null,
    primary key (id)
);


create table if not exists Diplome_Posseder(
    eleve_id int,
    diplome_id int,
    constraint FK_Eleve_id foreign key(eleve_id) references Eleve(id) on delete cascade,
    constraint FK_Diplome_id foreign key(diplome_id) references Diplome(id) on delete cascade,
    constraint primary key (eleve_id, diplome_id)
);

alter table Eleve add COLUMN sexe char(1) -- m ou f