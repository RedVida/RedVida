/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     16-10-2014 23:19:45                          */
/*==============================================================*/


drop table if exists banco_sangre;

drop table if exists donacion_medula;

drop table if exists donacion_organo;

drop table if exists donacion_sangre;

/*==============================================================*/
/* Table: banco_sangre                                          */
/*==============================================================*/
create table banco_sangre
(
   id                   int not null auto_increment,
   tipo                 varchar(3),
   cantidad             int,
   primary key (id)
);

/*==============================================================*/
/* Table: donacion_medula                                       */
/*==============================================================*/
create table donacion_medula
(
   id                   int not null auto_increment,
   rut_donante          varchar(12),
   tipo_medula          varchar(128),
   created              datetime,
   modified             datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: donacion_organo                                       */
/*==============================================================*/
create table donacion_organo
(
   id                   int not null auto_increment,
   rut_donante          varchar(12),
   nombre               varchar(128),
   estado               bool,
   created              datetime,
   modified             datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: donacion_sangre                                       */
/*==============================================================*/
create table donacion_sangre
(
   id                   int not null auto_increment,
   rut_donante          varchar(12),
   tipo_sangre          varchar(3),
   cantidad             int,
   created              datetime,
   modified             datetime,
   primary key (id)
);



INSERT INTO `banco_sangre` (`id`, `tipo`, `cantidad`) VALUES
(1, 'O-', 0),
(2, 'O+', 0),
(3, 'A-', 0),
(4, 'A+', 0),
(5, 'B-', 0),
(6, 'B+', 0),
(7, 'AB-',0),
(8, 'AB+', 0);