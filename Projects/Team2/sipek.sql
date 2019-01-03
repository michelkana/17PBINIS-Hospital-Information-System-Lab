-- phpMyAdmin SQL Dump
-- version 2.6.2-Debian-3sarge6
-- http://www.phpmyadmin.net
-- 
-- Poèítaè: localhost
-- Vygenerováno: Pondìlí 15. prosince 2014, 22:29
-- Verze MySQL: 4.1.11
-- Verze PHP: 4.3.10-22
-- 
-- Databáze: `sipekvac`
-- 
CREATE DATABASE `sipekvac` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE sipekvac;

-- --------------------------------------------------------
-- 
-- Struktura tabulky `availability`
-- 

CREATE TABLE `availability` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `id_doctor` int(10) unsigned NOT NULL default '0',
  `year` int(5) NOT NULL default '0',
  `time_in` varchar(5) NOT NULL default '',
  `time_out` varchar(5) NOT NULL default '',
  `month` int(5) NOT NULL default '0',
  `day` int(5) NOT NULL default '0',
  `available` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

-- 
-- Vypisuji data pro tabulku `availability`
-- 

INSERT INTO `availability` VALUES (7, 2, 2014, '10:00', '10:15', 12, 12, 1);
INSERT INTO `availability` VALUES (6, 2, 2014, '10:16', '10:28', 12, 12, 0);
INSERT INTO `availability` VALUES (9, 2, 2014, '15:00', '15:15', 12, 11, 0);
INSERT INTO `availability` VALUES (10, 2, 2014, '12:10', '12:25', 12, 9, 1);
INSERT INTO `availability` VALUES (11, 2, 2014, '15:00', '15:11', 12, 8, 1);
INSERT INTO `availability` VALUES (12, 2, 2014, '13:15', '13:20', 12, 15, 1);
INSERT INTO `availability` VALUES (13, 2, 2014, '15:11', '15:13', 12, 16, 1);
INSERT INTO `availability` VALUES (16, 2, 2014, '15:30', '15:45', 12, 25, 0);
INSERT INTO `availability` VALUES (20, 19, 2014, '9:15', '9:30', 12, 24, 1);
INSERT INTO `availability` VALUES (21, 33, 2014, '8:15', '8:30', 12, 14, 1);
INSERT INTO `availability` VALUES (22, 19, 2014, '9:15', '9:30', 12, 14, 1);
INSERT INTO `availability` VALUES (23, 19, 2014, '9:15', '9:30', 12, 15, 0);
INSERT INTO `availability` VALUES (24, 19, 2014, '9:15', '9:30', 12, 16, 0);
INSERT INTO `availability` VALUES (25, 19, 2014, '9:15', '9:30', 12, 17, 1);
INSERT INTO `availability` VALUES (26, 19, 2014, '9:15', '9:30', 12, 18, 0);
INSERT INTO `availability` VALUES (27, 19, 2014, '9:15', '9:30', 12, 19, 0);
INSERT INTO `availability` VALUES (29, 19, 2014, '9:15', '9:30', 12, 21, 0);
INSERT INTO `availability` VALUES (30, 19, 2014, '7:00', '7:15', 12, 1, 0);
INSERT INTO `availability` VALUES (31, 19, 2014, '7:00', '7:15', 12, 2, 0);
INSERT INTO `availability` VALUES (32, 19, 2014, '7:00', '7:15', 12, 3, 0);
INSERT INTO `availability` VALUES (33, 19, 2014, '7:00', '7:15', 12, 4, 0);
INSERT INTO `availability` VALUES (34, 19, 2014, '7:00', '7:15', 12, 5, 0);
INSERT INTO `availability` VALUES (86, 19, 1, '15:00', '15:15', 12, 14, 0);
INSERT INTO `availability` VALUES (37, 19, 2014, '7:00', '7:15', 12, 8, 0);
INSERT INTO `availability` VALUES (38, 2, 2014, '7:23', '7:38', 12, 24, 0);
INSERT INTO `availability` VALUES (39, 2, 2014, '7:23', '7:38', 12, 25, 0);
INSERT INTO `availability` VALUES (40, 2, 2014, '7:23', '7:38', 12, 26, 0);
INSERT INTO `availability` VALUES (41, 2, 2015, '7:23', '7:38', 1, 2, 0);
INSERT INTO `availability` VALUES (42, 2, 2015, '7:23', '7:38', 1, 9, 0);
INSERT INTO `availability` VALUES (43, 2, 2015, '7:23', '7:38', 2, 9, 0);
INSERT INTO `availability` VALUES (44, 2, 2015, '7:23', '7:38', 3, 9, 0);
INSERT INTO `availability` VALUES (45, 33, 2014, '10:20', '10:35', 12, 22, 1);
INSERT INTO `availability` VALUES (46, 33, 2014, '10:20', '10:35', 12, 23, 0);
INSERT INTO `availability` VALUES (47, 33, 2014, '10:20', '10:35', 12, 24, 0);
INSERT INTO `availability` VALUES (48, 33, 2014, '10:20', '10:35', 12, 25, 0);
INSERT INTO `availability` VALUES (49, 33, 2015, '10:20', '10:35', 1, 1, 0);
INSERT INTO `availability` VALUES (50, 33, 2015, '10:20', '10:35', 1, 8, 0);
INSERT INTO `availability` VALUES (51, 33, 2015, '10:20', '10:35', 2, 8, 0);
INSERT INTO `availability` VALUES (52, 21, 2014, '11:22', '11:37', 12, 14, 0);
INSERT INTO `availability` VALUES (53, 21, 2014, '11:22', '11:37', 12, 15, 0);
INSERT INTO `availability` VALUES (54, 21, 2014, '11:22', '11:37', 12, 16, 0);
INSERT INTO `availability` VALUES (55, 21, 2014, '11:22', '11:37', 12, 17, 0);
INSERT INTO `availability` VALUES (56, 21, 2014, '11:22', '11:37', 12, 18, 0);
INSERT INTO `availability` VALUES (57, 21, 2014, '11:22', '11:37', 12, 19, 1);
INSERT INTO `availability` VALUES (58, 21, 2015, '11:22', '11:37', 1, 19, 0);
INSERT INTO `availability` VALUES (59, 3, 2014, '12:01', '12:16', 12, 10, 1);
INSERT INTO `availability` VALUES (60, 3, 2014, '12:01', '12:16', 12, 11, 0);
INSERT INTO `availability` VALUES (61, 3, 2014, '12:01', '12:16', 12, 12, 1);
INSERT INTO `availability` VALUES (62, 3, 2014, '12:01', '12:16', 12, 13, 0);
INSERT INTO `availability` VALUES (63, 3, 2014, '12:01', '12:16', 12, 14, 0);
INSERT INTO `availability` VALUES (64, 3, 2014, '12:01', '12:16', 12, 15, 0);
INSERT INTO `availability` VALUES (65, 3, 2014, '12:01', '12:16', 12, 16, 0);
INSERT INTO `availability` VALUES (66, 3, 2014, '12:01', '12:16', 12, 17, 0);
INSERT INTO `availability` VALUES (67, 3, 2015, '12:01', '12:16', 1, 17, 0);
INSERT INTO `availability` VALUES (68, 0, 2014, '12:00', '12:15', 12, 24, 0);
INSERT INTO `availability` VALUES (69, 0, 2014, '12:00', '12:15', 12, 25, 0);
INSERT INTO `availability` VALUES (70, 0, 2014, '12:00', '12:15', 12, 26, 0);
INSERT INTO `availability` VALUES (71, 0, 2014, '12:00', '12:15', 12, 27, 0);
INSERT INTO `availability` VALUES (72, 0, 2015, '12:00', '12:15', 1, 3, 0);
INSERT INTO `availability` VALUES (73, 0, 2015, '12:00', '12:15', 1, 10, 0);
INSERT INTO `availability` VALUES (74, 0, 2015, '12:00', '12:15', 2, 10, 0);
INSERT INTO `availability` VALUES (75, 0, 2015, '12:00', '12:15', 3, 10, 0);
INSERT INTO `availability` VALUES (76, 0, 2015, '12:00', '12:15', 4, 10, 0);
INSERT INTO `availability` VALUES (77, 0, 2014, '12:00', '12:15', 12, 24, 0);
INSERT INTO `availability` VALUES (78, 0, 2014, '12:00', '12:15', 12, 25, 0);
INSERT INTO `availability` VALUES (79, 0, 2014, '12:00', '12:15', 12, 26, 0);
INSERT INTO `availability` VALUES (80, 0, 2014, '12:00', '12:15', 12, 27, 0);
INSERT INTO `availability` VALUES (81, 0, 2015, '12:00', '12:15', 1, 3, 0);
INSERT INTO `availability` VALUES (82, 0, 2015, '12:00', '12:15', 1, 10, 0);
INSERT INTO `availability` VALUES (83, 0, 2015, '12:00', '12:15', 2, 10, 0);
INSERT INTO `availability` VALUES (84, 0, 2015, '12:00', '12:15', 3, 10, 0);
INSERT INTO `availability` VALUES (85, 0, 2015, '12:00', '12:15', 4, 10, 0);

-- --------------------------------------------------------

-- 
-- Struktura tabulky `department`
-- 

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL auto_increment,
  `department_name` varchar(60) default NULL,
  PRIMARY KEY  (`department_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- 
-- Vypisuji data pro tabulku `department`
-- 

INSERT INTO `department` VALUES (1, 'admin');
INSERT INTO `department` VALUES (2, 'pediatr');
INSERT INTO `department` VALUES (12, 'Chirurgie');
INSERT INTO `department` VALUES (11, 'ORL');
INSERT INTO `department` VALUES (3, 'patient');

-- --------------------------------------------------------

-- 
-- Struktura tabulky `hospitalitation_record`
-- 

CREATE TABLE `hospitalitation_record` (
  `id` int(3) NOT NULL auto_increment,
  `patient_id` bigint(10) NOT NULL default '0',
  `date_in` date default '0000-00-00',
  `date_out` date default '0000-00-00',
  `department_id` int(3) NOT NULL default '0',
  `doctor_id` int(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- 
-- Vypisuji data pro tabulku `hospitalitation_record`
-- 

INSERT INTO `hospitalitation_record` VALUES (9, 6903150100, '2013-12-01', '2013-12-05', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (8, 6903150100, '2013-11-01', '2013-11-10', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (7, 9511050010, '2013-12-01', '2013-12-05', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (6, 9511050010, '2013-11-18', '2013-11-22', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (10, 9001027464, '2013-02-02', '2013-03-02', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (11, 9001027464, '2013-12-01', '2013-12-10', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (12, 9101026506, '2013-08-15', '2013-08-20', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (13, 9101026506, '2013-07-15', '2013-07-20', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (14, 9405127050, '2013-08-07', '2013-08-10', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (15, 9405127050, '2013-05-12', '2013-05-20', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (16, 9505127434, '2013-01-15', '2013-01-25', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (17, 9505127434, '2013-03-18', '2013-04-01', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (18, 1205120102, '2013-04-10', '2013-04-20', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (19, 1205120102, '2013-09-15', '2013-09-22', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (20, 8905212514, '2013-07-16', '2013-07-26', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (21, 8905212514, '2013-04-04', '2013-04-10', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (22, 8101013151, '2013-11-06', '2013-11-10', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (23, 8101013151, '2013-12-10', '2013-12-15', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (24, 9812011000, '2013-10-20', '2013-10-27', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (25, 9812011000, '2013-12-14', '2013-12-15', 12, 21);
INSERT INTO `hospitalitation_record` VALUES (26, 9511050010, '2013-06-20', '2013-06-25', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (27, 6903150100, '2013-01-03', '2013-01-15', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (28, 9001027464, '2013-05-11', '2013-05-19', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (29, 9101026506, '2013-03-01', '2013-03-10', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (30, 9405127050, '2013-02-06', '2013-02-10', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (31, 9505127434, '2013-06-11', '2013-06-15', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (32, 9405127050, '2013-10-15', '2013-10-20', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (33, 1205120102, '2012-12-15', '2012-12-25', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (34, 8905212514, '2013-12-01', '2013-12-04', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (35, 8101013151, '2013-12-15', '2014-12-06', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (36, 9812011000, '2013-09-15', '2013-09-24', 2, 2);
INSERT INTO `hospitalitation_record` VALUES (37, 9812011000, '2013-12-15', NULL, 2, 2);
INSERT INTO `hospitalitation_record` VALUES (38, 123456789, '2014-12-13', '2014-12-13', 2, 19);

-- --------------------------------------------------------

-- 
-- Struktura tabulky `patient`
-- 

CREATE TABLE `patient` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(60) collate utf8_czech_ci NOT NULL default '',
  `age` int(3) NOT NULL default '0',
  `personal_id` bigint(10) NOT NULL default '0',
  `email` varchar(50) collate utf8_czech_ci NOT NULL default '',
  `phone` varchar(13) collate utf8_czech_ci NOT NULL default '',
  `insurance` varchar(20) collate utf8_czech_ci NOT NULL default '',
  `minutes` int(2) unsigned NOT NULL default '0',
  `daily` int(1) unsigned NOT NULL default '0',
  `weekly` int(1) unsigned NOT NULL default '0',
  `monthly` int(1) unsigned NOT NULL default '0',
  `authorized` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=45 ;

-- 
-- Vypisuji data pro tabulku `patient`
-- 

INSERT INTO `patient` VALUES (18, 'Vít Beneš', 8, 9511050010, '', '', 'VZP', 0, 0, 0, 0, 1);
INSERT INTO `patient` VALUES (17, 'Jan Novák', 44, 6903150100, '', '', 'obe', 2, 2, 2, 2, 1);
INSERT INTO `patient` VALUES (36, 'Prave Se Narodil', 0, 0, 'novorozenec@neovorozenec.cz', '000000000', 'VZP', 0, 0, 0, 0, 0);
INSERT INTO `patient` VALUES (35, 'Alexandr Veliky', 2450, 123456789, 'lexa.velky@makedonie.mk', '987654321', 'VZP', 0, 0, 0, 0, 0);
INSERT INTO `patient` VALUES (23, 'Filip Mouka', 32, 8101013151, '', '', 'ZPMV', 10, 10, 10, 10, 1);
INSERT INTO `patient` VALUES (24, 'Milan Suk', 15, 9812011000, '', '', 'obe', 5, 5, 5, 5, 1);
INSERT INTO `patient` VALUES (33, 'Ondrej Bina', 20, 9401052419, 'binao@seznam.cz', '722676949', 'obe', 20, 20, 20, 20, 1);
INSERT INTO `patient` VALUES (27, 'Pepa Prášil', 52, 123456789, 'pacient@pacient.cz', '123456789', 'VZP', 60, 2, 6, 24, 1);
INSERT INTO `patient` VALUES (30, 'Bob Bobek', 23, 123456789, 'bob@bobek.com', '123456789', 'VZP', 20, 1, 2, 3, 1);
INSERT INTO `patient` VALUES (44, 'Mat?j Žába', 17, 987654321, 'zab@kap.cz', '852147963', 'VZP', 30, 6, 2, 3, 1);
INSERT INTO `patient` VALUES (38, 'Haf Daff', 63, 123456789, 'kapitan@nemo.com', '741258963', 'ZPMV', 30, 2, 4, 6, 1);
INSERT INTO `patient` VALUES (39, 'Jakub Dušek', 31, 123456789, 'bob@bob.com', '963258741', 'ZPMV', 0, 0, 0, 0, 0);
INSERT INTO `patient` VALUES (40, 'KLOP Bew', 31, 123456789, 'bew@sz.cz', '123458796', 'VZP', 0, 0, 0, 0, 0);
INSERT INTO `patient` VALUES (42, 'snowman ice', 65, 987654321, 'ice@winter.coming', '147852369', 'obe', 30, 4, 4, 4, 1);

-- --------------------------------------------------------

-- 
-- Struktura tabulky `record`
-- 

CREATE TABLE `record` (
  `record_id` int(3) NOT NULL auto_increment,
  `patient_id` bigint(10) NOT NULL default '0',
  `date` date NOT NULL default '0000-00-00',
  `text` varchar(100) collate utf8_czech_ci NOT NULL default '',
  PRIMARY KEY  (`record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=92 ;

-- 
-- Vypisuji data pro tabulku `record`
-- 

INSERT INTO `record` VALUES (37, 9511050010, '2013-12-05', 'Tifus');
INSERT INTO `record` VALUES (36, 6903150100, '2013-11-01', 'Sifilis');
INSERT INTO `record` VALUES (35, 6903150100, '2013-12-04', 'Svrab');
INSERT INTO `record` VALUES (34, 6903150100, '2013-12-01', 'Pulmonie');
INSERT INTO `record` VALUES (33, 9511050010, '2013-11-20', 'Slabost');
INSERT INTO `record` VALUES (32, 9511050010, '2013-11-19', 'Zlomeni holení kosti');
INSERT INTO `record` VALUES (31, 9511050010, '2013-12-04', 'Zán?t tlustého st?eva');
INSERT INTO `record` VALUES (30, 9511050010, '2013-06-22', 'Zlomená klí?ní kost');
INSERT INTO `record` VALUES (29, 9511050010, '2013-06-20', 'Bolest Hlavy');
INSERT INTO `record` VALUES (38, 9405127050, '2013-10-18', 'Bolest v podbrisku');
INSERT INTO `record` VALUES (39, 9101026506, '2013-03-01', 'AIDS');
INSERT INTO `record` VALUES (40, 9101026506, '2013-03-08', 'Zlomenina lebky');
INSERT INTO `record` VALUES (41, 9101026506, '2013-07-15', 'Chripka');
INSERT INTO `record` VALUES (42, 9101026506, '2013-07-18', 'Angina');
INSERT INTO `record` VALUES (43, 9405127050, '2013-05-15', 'chripka');
INSERT INTO `record` VALUES (44, 9405127050, '2013-08-07', 'Zlomenina ruky');
INSERT INTO `record` VALUES (45, 9405127050, '2013-10-15', 'HIV');
INSERT INTO `record` VALUES (46, 9405127050, '2013-08-09', 'Angina');
INSERT INTO `record` VALUES (47, 9405127050, '2013-02-08', 'Mor');
INSERT INTO `record` VALUES (48, 9405127050, '2013-05-12', 'Cholera');
INSERT INTO `record` VALUES (49, 9405127050, '2013-02-06', 'zanet slepeho streva');
INSERT INTO `record` VALUES (50, 9001027464, '2013-12-04', 'HIV');
INSERT INTO `record` VALUES (51, 9001027464, '2013-03-01', 'MOR');
INSERT INTO `record` VALUES (52, 9001027464, '2013-05-16', 'Svrab');
INSERT INTO `record` VALUES (53, 9001027464, '2013-12-01', 'Chripka');
INSERT INTO `record` VALUES (54, 9001027464, '2013-05-11', 'HIV');
INSERT INTO `record` VALUES (55, 6903150100, '2013-11-03', 'Sifilis');
INSERT INTO `record` VALUES (56, 9505127434, '2013-01-20', 'chripka');
INSERT INTO `record` VALUES (57, 9505127434, '2013-01-15', 'MOR');
INSERT INTO `record` VALUES (58, 9101026506, '2013-08-17', 'sifilis');
INSERT INTO `record` VALUES (59, 9101026506, '2013-08-16', 'Kapavka');
INSERT INTO `record` VALUES (60, 9505127434, '2013-06-13', 'ztrata pameti');
INSERT INTO `record` VALUES (61, 9505127434, '2013-03-20', 'AIDS');
INSERT INTO `record` VALUES (62, 9505127434, '2013-06-11', 'Zlomenina');
INSERT INTO `record` VALUES (63, 9505127434, '2013-03-18', 'AIDS');
INSERT INTO `record` VALUES (64, 1205120102, '2013-09-18', 'Liposukce');
INSERT INTO `record` VALUES (65, 1205120102, '2013-09-15', 'Tifus');
INSERT INTO `record` VALUES (66, 1205120102, '2013-04-20', 'Zlomenina dolni koncetiny');
INSERT INTO `record` VALUES (67, 6903150100, '2013-01-08', 'Spavá nemoc');
INSERT INTO `record` VALUES (68, 9001027464, '2013-02-15', 'Angina');
INSERT INTO `record` VALUES (69, 6903150100, '2013-01-05', 'Chripka');
INSERT INTO `record` VALUES (70, 1205120102, '2012-12-15', 'Zlomenina steheni kosti.');
INSERT INTO `record` VALUES (71, 1205120102, '2013-04-10', 'Deprese');
INSERT INTO `record` VALUES (72, 1205120102, '2012-12-15', 'Halucinace.');
INSERT INTO `record` VALUES (73, 8905212514, '2013-04-04', 'Neustale zvraceni.');
INSERT INTO `record` VALUES (74, 8905212514, '2013-04-10', 'Deprese');
INSERT INTO `record` VALUES (75, 8905212514, '2013-07-16', 'Zlomenina ruky');
INSERT INTO `record` VALUES (76, 8905212514, '2013-07-20', 'Zlomenina predlokti');
INSERT INTO `record` VALUES (77, 8905212514, '2013-12-01', 'Halucinace.');
INSERT INTO `record` VALUES (78, 8905212514, '2013-12-02', 'AIDS');
INSERT INTO `record` VALUES (79, 8101013151, '2013-11-06', 'Chripka');
INSERT INTO `record` VALUES (80, 8101013151, '2013-11-08', 'Angina');
INSERT INTO `record` VALUES (81, 8101013151, '2013-12-10', 'Zlomenina 10. obratle');
INSERT INTO `record` VALUES (82, 8101013151, '2013-12-14', 'Zlomenina praveho malicku.');
INSERT INTO `record` VALUES (83, 8101013151, '2013-12-15', 'Spalnicky');
INSERT INTO `record` VALUES (84, 8101013151, '2013-12-16', 'Infarkt');
INSERT INTO `record` VALUES (85, 9812011000, '2013-10-25', 'Diabetes');
INSERT INTO `record` VALUES (86, 9812011000, '2013-09-15', 'Infarkt');
INSERT INTO `record` VALUES (87, 9812011000, '2013-10-20', 'Pneumonie');
INSERT INTO `record` VALUES (88, 9812011000, '2013-09-20', 'Zapal plic.');
INSERT INTO `record` VALUES (89, 9812011000, '2013-12-14', 'Iktus.');
INSERT INTO `record` VALUES (90, 9812011000, '2013-12-15', 'Fraktura lebky');
INSERT INTO `record` VALUES (91, 9511050010, '2014-12-02', 'Um?el stá?ím jak mladý');

-- --------------------------------------------------------

-- 
-- Struktura tabulky `reservation`
-- 

CREATE TABLE `reservation` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `id_patient` int(10) unsigned NOT NULL default '0',
  `id_doctor` int(10) unsigned NOT NULL default '0',
  `year` varchar(25) NOT NULL default '',
  `month` int(3) NOT NULL default '0',
  `day` int(3) NOT NULL default '0',
  `time_in` varchar(5) NOT NULL default '',
  `time_out` varchar(5) NOT NULL default '',
  `availability_id` int(10) unsigned NOT NULL default '0',
  `week` int(3) unsigned NOT NULL default '0',
  `state` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

-- 
-- Vypisuji data pro tabulku `reservation`
-- 

INSERT INTO `reservation` VALUES (57, 28, 19, '2014', 12, 18, '15:25', '15:40', 17, 51, 0);
INSERT INTO `reservation` VALUES (53, 28, 2, '2014', 12, 15, '13:15', '13:20', 12, 51, 0);
INSERT INTO `reservation` VALUES (55, 31, 2, '2014', 12, 12, '10:00', '10:15', 7, 50, 0);
INSERT INTO `reservation` VALUES (60, 32, 19, '2014', 12, 24, '9:15', '9:30', 20, 52, 0);
INSERT INTO `reservation` VALUES (59, 32, 2, '2014', 12, 16, '15:11', '15:13', 13, 51, 0);
INSERT INTO `reservation` VALUES (61, 32, 33, '2014', 12, 14, '8:15', '8:30', 21, 50, 0);
INSERT INTO `reservation` VALUES (62, 28, 19, '2014', 12, 14, '9:15', '9:30', 22, 50, 0);
INSERT INTO `reservation` VALUES (63, 34, 3, '2014', 12, 12, '12:01', '12:16', 61, 50, 0);
INSERT INTO `reservation` VALUES (64, 34, 2, '2014', 12, 9, '12:10', '12:25', 10, 50, 0);
INSERT INTO `reservation` VALUES (65, 34, 21, '2014', 12, 19, '11:22', '11:37', 57, 51, 0);
INSERT INTO `reservation` VALUES (66, 34, 3, '2014', 12, 10, '12:01', '12:16', 59, 50, 0);
INSERT INTO `reservation` VALUES (67, 35, 33, '2014', 12, 22, '10:20', '10:35', 45, 52, 0);
INSERT INTO `reservation` VALUES (68, 35, 2, '2014', 12, 8, '15:00', '15:11', 11, 50, 0);
INSERT INTO `reservation` VALUES (69, 35, 19, '2014', 12, 17, '9:15', '9:30', 25, 51, 0);

-- --------------------------------------------------------

-- 
-- Struktura tabulky `user`
-- 

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(60) default NULL,
  `user_login` varchar(60) default NULL,
  `user_password` varchar(60) default NULL,
  `user_department_id` int(11) default NULL,
  `patient_id` int(10) unsigned default NULL,
  `email` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- 
-- Vypisuji data pro tabulku `user`
-- 

INSERT INTO `user` VALUES (1, 'administrator', 'admin', 'admin', 1, NULL, '');
INSERT INTO `user` VALUES (2, 'MUDr. Pavel Janda', 'janda', 'janda', 2, NULL, 'nis.system.admin@email.cz');
INSERT INTO `user` VALUES (3, 'MUDr. Jana Novakova', 'novakova', 'novakova', 2, NULL, '');
INSERT INTO `user` VALUES (21, 'MUDr. Jana Veselá', 'jana', 'jana', 12, NULL, '');
INSERT INTO `user` VALUES (20, 'MUDr. Jan Novák', 'jan', 'jan', 1, NULL, '');
INSERT INTO `user` VALUES (19, 'Mudr. Anna Malá', 'anna', 'anna', 2, NULL, '');
INSERT INTO `user` VALUES (26, 'Pepa Prášil', 'pacient@pacient.cz', '123456789', 3, 27, 'pacient@pacient.cz');
INSERT INTO `user` VALUES (30, 'Ondrej Bina', 'binao@seznam.cz', '9401052419', 3, 33, 'binao@seznam.cz');
INSERT INTO `user` VALUES (28, 'Bob Bobek', 'bob@bobek.com', '123456789', 3, 30, 'bob@bobek.com');
INSERT INTO `user` VALUES (32, 'Haf Daff', 'kapitan@nemo.com', '123456789', 3, 38, 'kapitan@nemo.com');
INSERT INTO `user` VALUES (33, 'MUDr. Ji?í Šípek', 'jirka', 'jirka', 12, NULL, '');
INSERT INTO `user` VALUES (34, 'snowman ice', 'ice@winter.coming', '987654321', 3, 42, 'ice@winter.coming');
INSERT INTO `user` VALUES (35, 'Mat?j Žába', 'zab@kap.cz', '987654321', 3, 44, 'zab@kap.cz');
        