-- Active: 1706778247599@@127.0.0.1@3306@GamingSymfonyT
insert into menu(parent_id,rang,libelle,url,icon,role) VALUES 
(NULL,001,'JEUX','app_home','','ROLE_USER'),
(NULL,002,'CONSOLE','app_home','','ROLE_USER'),
(NULL,003,'ACCESSOIRES','app_home','','ROLE_USER'),
(NULL,004,'MOBILIER GAMING','app_home','','ROLE_USER'),
(NULL,005,'ESPACE GEEK','app_home','','ROLE_USER'),
(NULL,006,'MON COMPTE','app_home','','ROLE_USER'),
(1,007,'JEUX PLAYSTATION','app_home','','ROLE_USER'),
(1,008,'JEUX XBOX','app_home','','ROLE_USER'),
(1,009,'JEUX NINTENDO','app_home','','ROLE_USER'),
(1,010,'JEUX PC','app_home','','ROLE_USER'),
(2,012,'PACK PLAYSTATION','app_home','','ROLE_USER'),
(2,013,'PACK XBOX','app_home','','ROLE_USER'),
(2,014,'PACK NINTENDO','app_home','','ROLE_USER'),
(3,017,' PLAYSTATION','app_home','','ROLE_USER'),
(3,018,' XBOX','app_home','','ROLE_USER'),
(3,019,' NINTENDO','app_home','','ROLE_USER'),
(4,022,'CHAISE GAMING','app_home','','ROLE_USER'),
(4,023,'TABLE GAMING','app_home','','ROLE_USER'),
(4,024,'MOUSSE ACCOUSTIQUE','app_home','','ROLE_USER'),
(5,027,'GOODIES JEUX VIDEO','app_home','','ROLE_USER'),
(5,028,'GOODIES MANGA','app_home','','ROLE_USER'),
(6,032,'CHANGER MDP','app_home','','ROLE_USER'),
(6,033,'LOGOUT','app_logout','','ROLE_USER'),
(6,034,'USER','app_user_index','','ROLE_USER'),
(6,035,'ROLE','app_role_index','','ROLE_USER'),
(6,036,'MENU','app_menu','','ROLE_USER');