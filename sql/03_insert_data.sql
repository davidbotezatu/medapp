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

INSERT INTO `consultatie` (`id`, `pacient`, `medic`, `data_programarii`, `observatii`) VALUES 
(NULL, '1', '1670219019180', '2022-11-01 18:54:46', 'Alergie la penicilina'),
(NULL, '1', '1781129018354', '2022-12-13 18:59:52', 'Alergie la penicilina'), 
(NULL, '1', '1881027015647', '2023-01-04 18:59:52', 'Alergie la penicilina'),
(NULL, '10', '2700105018518', '2022-10-17 19:04:10', 'Foarte multe carii'), 
(NULL, '10', '2830130018642', '2022-07-12 19:04:10', 'Foarte multe carii'), 
(NULL, '3', '1670219019180', '2023-01-01 19:04:10', 'A nu se mai bea cafea'), 
(NULL, '3', '2630314018807', '2022-11-01 19:04:10', NULL), (NULL, '3', '2750121015847', '2023-01-22 19:04:10', NULL),
(NULL, '9', '2700121018219', '2022-11-24 19:07:45', NULL), (NULL, '9', '2830130018642', '2023-01-01 19:07:45', NULL), 
(NULL, '7', '1781129018354', '2023-01-19 19:07:45', NULL), (NULL, '7', '2700121018219', '2023-01-08 19:07:45', NULL), 
(NULL, '5', '2830130018642', '2022-11-15 19:07:45', NULL), (NULL, '5', '2750121015847', '2023-01-08 19:07:45', NULL), 
(NULL, '8', '1881027015647', '2023-01-15 19:07:45', NULL), (NULL, '5', '2810615018284', '2023-01-08 19:07:45', NULL), 
(NULL, '8', '2750121015847', '2023-01-03 19:07:45', NULL), (NULL, '8', '2700105018518', '2023-01-01 19:07:45', NULL),
(NULL, '6', '2800821015274', '2022-09-13 19:10:29', NULL), (NULL, '6', '2800821015274', '2022-12-06 19:10:29', NULL), 
(NULL, '2', '2700121018219', '2023-01-08 19:10:29', NULL), (NULL, '2', '2800821015274', '2023-01-01 19:10:29', NULL),
(NULL, '4', '2800821015274', '2022-11-13 19:10:29', NULL), (NULL, '4', '2830130018642', '2023-01-10 19:10:29', NULL),
(NULL, '3', '2630314018807', '2022-11-01 19:04:10', NULL), (NULL, '4', '2630314018807', '2022-11-04 19:04:10', NULL), 
(NULL, '5', '2630314018807', '2022-11-05 19:04:10', NULL), (NULL, '6', '2630314018807', '2022-11-12 19:04:10', NULL), 
(NULL, '7', '2630314018807', '2022-11-15 19:04:10', NULL), (NULL, '8', '2630314018807', '2022-12-17 19:04:10', NULL), 
(NULL, '9', '2630314018807', '2022-12-01 19:04:10', NULL), (NULL, '2', '2630314018807', '2022-12-01 19:04:10', NULL), 
(NULL, '3', '2630314018807', '2022-12-01 19:04:10', NULL), (NULL, '1', '2630314018807', '2022-12-01 19:04:10', NULL), 
(NULL, '3', '2750121015847', '2022-09-01 19:04:10', NULL), (NULL, '4', '2750121015847', '2022-09-04 19:04:10', NULL), 
(NULL, '5', '2750121015847', '2022-09-05 19:04:10', NULL), (NULL, '6', '2750121015847', '2022-09-12 19:04:10', NULL), 
(NULL, '7', '2750121015847', '2022-09-15 19:04:10', NULL), (NULL, '8', '2750121015847', '2022-10-17 19:04:10', NULL), 
(NULL, '9', '2750121015847', '2022-10-01 19:04:10', NULL), (NULL, '2', '2750121015847', '2022-10-01 19:04:10', NULL), 
(NULL, '3', '2750121015847', '2022-10-01 19:04:10', NULL), (NULL, '1', '2750121015847', '2022-10-01 19:04:10', NULL),
(NULL, '3', '1881027015647', '2022-02-01 19:04:10', NULL), (NULL, '4', '1881027015647', '2022-02-01 19:04:10', NULL),
(NULL, '1', '1881027015647', '2022-02-01 19:04:10', NULL), (NULL, '2', '2700105018518', '2022-02-01 19:04:10', NULL),
(NULL, '5', '2700105018518', '2022-02-01 19:04:10', NULL), (NULL, '6', '2700105018518', '2022-02-01 19:04:10', NULL),
(NULL, '7', '2700105018518', '2022-02-01 19:04:10', NULL), (NULL, '8', '2750121015847', '2022-02-01 19:04:10', NULL),
(NULL, '10', '2750121015847', '2022-02-01 19:04:10', NULL), (NULL, '9', '2810615018284', '2022-02-01 19:04:10', NULL),
(NULL, '3', '2800821015274', '2022-03-01 19:04:10', NULL), (NULL, '4', '2800821015274', '2022-03-01 19:04:10', NULL),
(NULL, '1', '2830130018642', '2022-03-01 19:04:10', NULL), (NULL, '2', '2830130018642', '2022-03-01 19:04:10', NULL),
(NULL, '5', '2830130018642', '2022-03-01 19:04:10', NULL), (NULL, '6', '2700105018518', '2022-03-01 19:04:10', NULL),
(NULL, '7', '2700105018518', '2022-03-01 19:04:10', NULL), (NULL, '8', '1881027015647', '2022-03-01 19:04:10', NULL),
(NULL, '10', '1881027015647', '2022-03-01 19:04:10', NULL), (NULL, '9', '1781129018354', '2022-03-01 19:04:10', NULL),
(NULL, '3', '1881027015647', '2022-04-05 19:04:10', NULL), (NULL, '4', '1881027015647', '2022-04-06 19:04:10', NULL),
(NULL, '1', '1881027015647', '2022-04-02 19:04:10', NULL), (NULL, '2', '1670219019180', '2022-04-07 19:04:10', NULL),
(NULL, '5', '1670219019180', '2022-04-08 19:04:10', NULL), (NULL, '6', '2700105018518', '2022-04-17 19:04:10', NULL),
(NULL, '7', '2700105018518', '2022-04-18 19:04:10', NULL), (NULL, '8', '2800821015274', '2022-04-03 19:04:10', NULL),
(NULL, '10', '2800821015274', '2022-04-04 19:04:10', NULL), (NULL, '9', '2800821015274', '2022-04-21 19:04:10', NULL),
(NULL, '3', '1781129018354', '2022-05-05 19:04:10', NULL), (NULL, '4', '2700105018518', '2022-05-06 19:04:10', NULL),
(NULL, '1', '1781129018354', '2022-05-02 19:04:10', NULL), (NULL, '2', '2700105018518', '2022-05-07 19:04:10', NULL),
(NULL, '5', '1781129018354', '2022-05-08 19:04:10', NULL), (NULL, '6', '2750121015847', '2022-05-17 19:04:10', NULL),
(NULL, '7', '1781129018354', '2022-05-18 19:04:10', NULL), (NULL, '8', '2800821015274', '2022-05-03 19:04:10', NULL),
(NULL, '10', '1781129018354', '2022-05-04 19:04:10', NULL), (NULL, '9', '2810615018284', '2022-05-21 19:04:10', NULL),
(NULL, '3', '2800821015274', '2022-06-05 19:04:10', NULL), (NULL, '4', '1781129018354', '2022-06-06 19:04:10', NULL),
(NULL, '1', '2800821015274', '2022-06-02 19:04:10', NULL), (NULL, '2', '2630314018807', '2022-06-07 19:04:10', NULL),
(NULL, '5', '2800821015274', '2022-06-08 19:04:10', NULL), (NULL, '6', '2630314018807', '2022-06-17 19:04:10', NULL),
(NULL, '7', '2700121018219', '2022-06-18 19:04:10', NULL), (NULL, '8', '2750121015847', '2022-06-03 19:04:10', NULL),
(NULL, '10', '2700121018219', '2022-06-04 19:04:10', NULL), (NULL, '9', '2750121015847', '2022-06-21 19:04:10', NULL),
(NULL, '3', '2830130018642', '2022-07-05 19:04:10', NULL), (NULL, '4', '2700105018518', '2022-07-06 19:04:10', NULL),
(NULL, '1', '2830130018642', '2022-07-02 19:04:10', NULL), (NULL, '2', '2700105018518', '2022-07-07 19:04:10', NULL),
(NULL, '5', '2830130018642', '2022-07-08 19:04:10', NULL), (NULL, '6', '1881027015647', '2022-07-17 19:04:10', NULL),
(NULL, '7', '2830130018642', '2022-07-18 19:04:10', NULL), (NULL, '8', '1881027015647', '2022-07-03 19:04:10', NULL),
(NULL, '10', '2700105018518', '2022-07-04 19:04:10', NULL), (NULL, '9', '2800821015274', '2022-07-21 19:04:10', NULL),
(NULL, '3', '2800821015274', '2022-08-05 19:04:10', NULL), (NULL, '4', '2800821015274', '2022-08-06 19:04:10', NULL),
(NULL, '1', '2750121015847', '2022-08-02 19:04:10', NULL), (NULL, '2', '1670219019180', '2022-08-07 19:04:10', NULL),
(NULL, '5', '2750121015847', '2022-08-08 19:04:10', NULL), (NULL, '6', '2700105018518', '2022-08-17 19:04:10', NULL),
(NULL, '7', '2800821015274', '2022-08-18 19:04:10', NULL), (NULL, '8', '2800821015274', '2022-08-03 19:04:10', NULL),
(NULL, '10', '2800821015274', '2022-08-04 19:04:10', NULL), (NULL, '9', '2800821015274', '2022-08-21 19:04:10', NULL);

INSERT INTO `interventii` (`id_consultatie`, `id_catalog`) VALUES 
('1', '1'), ('1', '2'), ('1', '8'), ('2', '8'), ('2', '7'),
('3', '1'), ('3', '7'), ('4', '2'), ('4', '3'), ('4', '5'),
('5', '3'), ('5', '4'), ('6', '9'), ('6', '1'), ('6', '7'),
('7', '1'), ('7', '7'), ('8', '2'), ('8', '3'), ('8', '5'),
('9', '1'), ('9', '2'), ('10', '4'), ('10', '5'), ('10', '6'),
('11', '7'), ('11', '8'), ('12', '1'), ('12', '3'), ('12', '9'),
('13', '1'), ('13', '7'), ('14', '2'), ('14', '3'), ('14', '5'),
('15', '3'), ('15', '4'), ('16', '9'), ('16', '1'), ('16', '7'),
('17', '1'), ('17', '7'), ('18', '2'), ('18', '3'), ('18', '5'),
('19', '1'), ('19', '2'), ('20', '4'), ('20', '5'), ('20', '6'), 
('21', '7'), ('21', '8'), ('22', '1'), ('22', '3'), ('22', '9'),
('23', '2'), ('23', '8'), ('24', '7'), ('24', '5'), ('24', '9'),
('25', '2'), ('25', '8'), ('26', '7'), ('26', '5'), ('27', '9'),
('28', '2'), ('28', '8'), ('29', '7'), ('29', '5'), ('30', '9'),
('31', '2'), ('31', '8'), ('32', '7'), ('33', '5'), ('32', '9'),
('33', '2'), ('34', '8'), ('35', '7'), ('36', '5'), ('37', '9'),
('38', '2'), ('38', '8'), ('39', '7'), ('40', '5'), ('40', '9'),
('41', '2'), ('42', '8'), ('42', '7'), ('43', '5'), ('44', '9');

INSERT INTO `plati` (`id_consultatie`, `suma`, `data_platii`, `rest_plata`) VALUES
('1', '1400', '2022-11-01', '2000'), ('1', '1000', '2022-11-07', '1000'),
('1', '500', '2022-11-25', '500'), ('1', '500', '2022-12-05', '0'),
('2', '2500', '2022-12-13', '3000'), ('2', '3000', '2022-12-24', '0'),
('3', '500', '2023-01-04', '2500'), ('3', '500', '2023-01-09', '2000'),
('3', '500', '2023-01-18', '1500'), ('3', '500', '2023-01-19', '1000'),
('3', '500', '2023-02-04', '500'), ('3', '500', '2023-02-05', '0'),
('4', '650', '2022-10-17', '0'),
('5', '400', '2022-07-12', '0'),
('6', '3500', '2023-01-01', '3500'),
('7', '1000', '2022-11-01', '2000'), ('7', '1000', '2022-12-01', '1000'),
('8', '600', '2023-01-22', '50'),
('9', '600', '2022-11-24', '0'),
('9', '600', '2022-11-24', '0'),
('11', '2000', '2023-01-19', '2500'), ('11', '2500', '2023-02-14', '0'),
('12', '1450', '2023-01-08', '3000'),
('13', '1000', '2022-11-15', '2000'),
('14', '650', '2023-01-08', '0'),
('15', '400', '2023-01-15', '0'),
('16', '2000', '2023-01-08', '5000'),
('17', '1500', '2023-01-03', '1500'),
('18', '650', '2023-01-01', '0'),
('19', '300', '2022-09-13', '300'),
('20', '750', '2022-12-06', '0'),
('21', '5500', '2023-01-08', '0'),
('22', '1450', '2023-01-01', '3000'), ('22', '2000', '2023-03-01', '1000'),
('23', '3000', '2022-11-13', '100'),
('24', '900', '2023-01-10', '6000');