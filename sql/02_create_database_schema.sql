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

CREATE TABLE catalog (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nume_interventie VARCHAR(100),
    cost_materiale INT,
    pret_manopera INT,
    pret_total INT
);

CREATE TABLE programare (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pacient INT,
    medic CHAR(13),
    data_programarii DATETIME,
    FOREIGN KEY (pacient) REFERENCES pacient(nr_fisa),
    FOREIGN KEY (medic) REFERENCES medic(cnp)
);

CREATE TABLE consultatie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    programare INT,
    observatii VARCHAR(100),
    pret INT,
    rest_plata INT,
    FOREIGN KEY (programare) REFERENCES programare(id),
    FOREIGN KEY (pret) REFERENCES catalog(id)
);

CREATE TABLE plati (
    id INT,
    suma INT,
    FOREIGN KEY (id) REFERENCES consultatie(id)
);