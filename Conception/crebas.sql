/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  26/05/2023 22:19:52                      */
/*==============================================================*/


drop table if exists ABSENCE;

drop table if exists CONGES;

drop table if exists EMPLOYE;

drop table if exists ENTREPRISE;

drop table if exists GROUPE;

drop table if exists HEURES_SUPP;

drop table if exists POSSEDER;

drop table if exists RECLAMATION;

drop table if exists RESPONSABLE_RH;

drop table if exists RESPONSABLE_RP;

drop table if exists RUBRIQUE;

drop table if exists TRAVAILLER;

/*==============================================================*/
/* Table : ABSENCE                                              */
/*==============================================================*/
create table ABSENCE
(
   ID_ABSENCE           int not null,
   ID_EMP               int not null,
   NBR_HEURES           int,
   DATE_DEB_ABS         date,
   DATE_F_ABS           date,
   primary key (ID_ABSENCE)
);

/*==============================================================*/
/* Table : CONGES                                               */
/*==============================================================*/
create table CONGES
(
   ID_CONGES            int not null,
   ID_EMP               int not null,
   DATE_DEBUT_C         date,
   DATE_FIN_C           date,
   STATUT_CONGES        varchar(26),
   primary key (ID_CONGES)
);

/*==============================================================*/
/* Table : EMPLOYE                                              */
/*==============================================================*/
create table EMPLOYE
(
   ID_EMP               int not null,
   NOM_EMP              varchar(26),
   PRENOM_EMP           varchar(26),
   ADRESSE_EMP          varchar(200),
   CNI_EMP              varchar(10),
   NUM_CNSS_EMP         varchar(15),
   NUM_CIMR_EMP         varchar(15),
   EMAIL_EMP            varchar(50),
   SITUATIONFAM_EMP     char(1),
   NBRENFANTS_EMP       char(1),
   SALAIRE_BASE_EMP     bigint,
   DATE_NAISSANCE_EMP   date,
   MODE_PAIEMENT_EMP    varchar(50),
   DATE_EMBACHE_EMP     date,
   POSTE_EMP            varchar(50),
   primary key (ID_EMP)
);

/*==============================================================*/
/* Table : ENTREPRISE                                           */
/*==============================================================*/
create table ENTREPRISE
(
   ID_ENT               int not null,
   ID_GROUPE            int,
   NOM_ENT              varchar(26),
   ADRESSE_ENT          varchar(200),
   NUM_CNSS_ENT         varchar(15),
   ESTMERE              bool,
   primary key (ID_ENT)
);

/*==============================================================*/
/* Table : GROUPE                                               */
/*==============================================================*/
create table GROUPE
(
   ID_GROUPE            int not null,
   NOM_GROUPE           varchar(50),
   primary key (ID_GROUPE)
);

/*==============================================================*/
/* Table : HEURES_SUPP                                          */
/*==============================================================*/
create table HEURES_SUPP
(
   ID_HS                int not null,
   ID_EMP               int not null,
   DATE_HSUPP           date,
   TYPE_JOUR            char(1),
   NBR_HSUPP            int,
   STATUT_HSUPP         varchar(26),
   primary key (ID_HS)
);

/*==============================================================*/
/* Table : POSSEDER                                             */
/*==============================================================*/
create table POSSEDER
(
   ID_ENT               int not null,
   ID_RUBRIQUE          int not null,
   primary key (ID_ENT, ID_RUBRIQUE)
);

/*==============================================================*/
/* Table : RECLAMATION                                          */
/*==============================================================*/
create table RECLAMATION
(
   ID_REC               int not null,
   ID_EMP               int not null,
   SUJET_REC            text,
   TYPE_REC             varchar(50),
   DESTINATION          char(1),
   ETAT                 varchar(50),
   primary key (ID_REC)
);

/*==============================================================*/
/* Table : RESPONSABLE_RH                                       */
/*==============================================================*/
create table RESPONSABLE_RH
(
   ID_EMP               int not null,
   IDRH                 int not null,
   NOM_EMP              varchar(26),
   PRENOM_EMP           varchar(26),
   ADRESSE_EMP          varchar(200),
   CNI_EMP              varchar(10),
   NUM_CNSS_EMP         varchar(15),
   NUM_CIMR_EMP         varchar(15),
   EMAIL_EMP            varchar(50),
   SITUATIONFAM_EMP     char(1),
   NBRENFANTS_EMP       char(1),
   SALAIRE_BASE_EMP     bigint,
   DATE_NAISSANCE_EMP   date,
   MODE_PAIEMENT_EMP    varchar(50),
   DATE_EMBACHE_EMP     date,
   POSTE_EMP            varchar(50),
   primary key (ID_EMP, IDRH)
);

/*==============================================================*/
/* Table : RESPONSABLE_RP                                       */
/*==============================================================*/
create table RESPONSABLE_RP
(
   ID_EMP               int not null,
   IDRP                 int not null,
   NOM_EMP              varchar(26),
   PRENOM_EMP           varchar(26),
   ADRESSE_EMP          varchar(200),
   CNI_EMP              varchar(10),
   NUM_CNSS_EMP         varchar(15),
   NUM_CIMR_EMP         varchar(15),
   EMAIL_EMP            varchar(50),
   SITUATIONFAM_EMP     char(1),
   NBRENFANTS_EMP       char(1),
   SALAIRE_BASE_EMP     bigint,
   DATE_NAISSANCE_EMP   date,
   MODE_PAIEMENT_EMP    varchar(50),
   DATE_EMBACHE_EMP     date,
   POSTE_EMP            varchar(50),
   primary key (ID_EMP, IDRP)
);

/*==============================================================*/
/* Table : RUBRIQUE                                             */
/*==============================================================*/
create table RUBRIQUE
(
   ID_RUBRIQUE          int not null,
   LIBELLE_RUBRIQUE     varchar(50),
   REGLE_CALCUL         text,
   primary key (ID_RUBRIQUE)
);

/*==============================================================*/
/* Table : TRAVAILLER                                           */
/*==============================================================*/
create table TRAVAILLER
(
   ID_EMP               int not null,
   ID_ENT               int not null,
   DATE_AFFECTATION     date,
   primary key (ID_EMP, ID_ENT)
);

alter table ABSENCE add constraint FK_SAISIR foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table CONGES add constraint FK_DEMANDER foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table ENTREPRISE add constraint FK_APPARTENIR foreign key (ID_GROUPE)
      references GROUPE (ID_GROUPE) on delete restrict on update restrict;

alter table HEURES_SUPP add constraint FK_AVOIR foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table POSSEDER add constraint FK_POSSEDER foreign key (ID_ENT)
      references ENTREPRISE (ID_ENT) on delete restrict on update restrict;

alter table POSSEDER add constraint FK_POSSEDER2 foreign key (ID_RUBRIQUE)
      references RUBRIQUE (ID_RUBRIQUE) on delete restrict on update restrict;

alter table RECLAMATION add constraint FK_ASSOCIATION_14 foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table RESPONSABLE_RH add constraint FK_HERITAGE_3 foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table RESPONSABLE_RP add constraint FK_HERITAGE_2 foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table TRAVAILLER add constraint FK_TRAVAILLER foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table TRAVAILLER add constraint FK_TRAVAILLER2 foreign key (ID_ENT)
      references ENTREPRISE (ID_ENT) on delete restrict on update restrict;

