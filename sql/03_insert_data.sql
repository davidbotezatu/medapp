INSERT INTO `catalog` (`nume_interventie`, `cost_materiale`, `pret_manopera`, `pret_total`) VALUES 
('Igienizare profesionala completa', '150', '150', '300'),
('Plomba', '100', '200', '300'),
('Detartraj', '50', '100', '150'),
('Extractie dinte', '100', '150', '250'),
('Anestezie', '100', '100', '200'),
('Imagistica', '100', '200', '300'),
('Proteză mobilă elastică', '2000', '700', '2700'),
('Implant dentar', '2000', '800', '2800'),
('Sinus lifting lateral', '3000', '1000', '4000'),
('Aparat ortodontic', '2000', '700', '2700'),
('Albirea dintilor', '10', '30', '40'),
('Tratament parodontoza', '10', '90', '100');

INSERT INTO `medic` (`cnp`, `nume`, `prenume`, `adresa`, `salariu_initial`, `data_angajarii`) VALUES 
('2700105018518', 'Niță', 'Mara', 'BD. 1 DECEMBRIE 1918 nr. 39, MUREŞ, 540061', '4000', '2022-10-03'),
('2700121018219', 'Tomulescu', 'Teodora', 'Strada Nicolae Balcescu 242, 130167, Dambovita', '3500', '2019-04-10'),
('2750121015847', 'Diaconescu', 'Cosmin', 'STR. NEGOIU nr. 18 ap. 1, TIMIŞ', '3600', '2018-05-25'),
('2800821015274', 'Voinea', 'Cristi', 'STR. BUJORULUI nr. 7, DOLJ', '5500', '2017-02-13'),
('2810615018284', 'Vlăsceanu', 'Luminița', 'Strada Floare de Colt 1, Borsa', '3900', '2020-11-17'),
('2830130018642', 'Marin', 'Paul', 'Strada Muncii 16, 605300, Bacau', '4500', '2021-12-03'),
('2630314018807', 'Sonda', 'Teodora', 'STR. DORNA nr. 5, CONSTANŢA, 900155', '5500', '2019-07-05'),
('1670219019180', 'Teodorescu', 'Andrei', 'STR. BUCOVINA nr. 15 bl. 11 sc. D ap. 2, BOTOŞANI, 710214', '3500', '2018-08-12'),
('1781129018354', 'Pop', 'Valentin', 'STR. AVRAM IANCU nr. 158B, COM. FLOREŞTI', '3200', '2023-01-03'),
('1881027015647', 'Vlăsceanu', 'Roberta', 'Strada Constructorilor 11, Bihor', '6500', '2019-03-15');

INSERT INTO `pacient` (`nr_fisa`, `data_inregistrarii`, `nume`, `prenume`, `data_nasterii`, `adresa`, `numar_telefon`) VALUES 
('1', '2017-01-04', 'Birău', 'Ștefania', '1967-01-29', 'STR. REVOLUŢIEI nr. 37G, CURTICI', '0257-465 710'),
('2', '2021-06-21', 'Tămaș', 'Gabriel', '2000-03-20', 'PŢA TEATRULUI nr. 4 ap. 17, MUREŞ', '0744-398 957'),
('3', '2021-07-21', 'Ciobanu', 'Paul', '2000-03-20', 'Str. Brăduțului 7/7, Vicovu de Sus, Bistrița Năsăud, CP 355733', '0712963917'),
('4', '2020-06-20', 'Şonda', 'Sofia', '2001-04-21', 'B-dul. Louis Pasteur 7/1, Mun. Corabia, Brașov, CP 270642', '0344331045'),
('5', '2019-05-19', 'Stan', 'Florin', '1998-05-22', 'Calea Cireșilor 9/5, Mun. Pecica, Caraș-Severin, CP 342319', '0787270001'),
('6', '2021-04-18', 'Todică', 'Elena', '1970-06-23', 'Splaiul Traian nr. 16, bl. B, et. 00, ap. 98, Mun. Bușteni, Buzău, CP 918002', '0278360181'),
('7', '2019-03-17', 'Pîndaru', 'Luminița', '1988-07-24', 'Calea Castanilor nr. 5B, bl. B, ap. 90, Pitești, Caraș-Severin, CP 271915', '0798281031'),
('8', '2020-02-16', 'Teodorescu', 'Marius', '1989-08-25', 'B-dul. Păcurari 1, Călărași, Argeș, CP 713964', '0789207975'),
('9', '2021-01-15', 'Pop', 'Horia', '1999-09-26', 'P-ța Făget nr. 9B, bl. A, sc. A, et. 54, ap. 92, Călimănești, Brașov, CP 192254', '0314227907'),
('10', '2019-11-14', 'Chirilă', 'Clara', '1979-01-27', 'Splaiul Mihai Eminescu nr. 6, bl. A, sc. B, et. 4, ap. 45, Mun. Sighetu Marmației, Mureș, CP 869855', '0316402100');