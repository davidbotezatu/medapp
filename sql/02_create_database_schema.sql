USE medapp;

CREATE TABLE medic (
    cnp CHAR(13) PRIMARY KEY,
    nume VARCHAR(50),
    prenume VARCHAR (50),
    adresa VARCHAR (100),
    salariu_initial INT,
    data_angajarii DATE
);

CREATE TABLE pacient (
    nr_fisa INT PRIMARY KEY,
    data_inregistrarii DATE,
    nume VARCHAR(50),
    prenume VARCHAR (50),
    data_nasterii DATE,
    adresa VARCHAR(100),
    numar_telefon VARCHAR(13)
);

CREATE TABLE consultatie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pacient INT,
    medic CHAR(13),
    data_programarii DATETIME,
    observatii VARCHAR(100),
    FOREIGN KEY (pacient) REFERENCES pacient(nr_fisa),
    FOREIGN KEY (medic) REFERENCES medic(cnp)
);

CREATE TABLE catalog (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nume_interventie VARCHAR(100),
    cost_materiale INT,
    pret_manopera INT,
    pret_total INT
);

CREATE TABLE interventii (
    id_consultatie INT,
    id_catalog INT,
    FOREIGN KEY (id_consultatie) REFERENCES consultatie(id),
    FOREIGN KEY (id_catalog) REFERENCES catalog(id)
);

CREATE TABLE plati (
    id_consultatie INT,
    suma INT,
    data_platii DATE,
    rest_plata INT,
    FOREIGN KEY (id_consultatie) REFERENCES consultatie(id)
);

CREATE TABLE utilizatori (
    userid INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100),
    email VARCHAR(100),
    parola VARCHAR (100)
);