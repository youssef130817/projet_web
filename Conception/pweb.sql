/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  29/05/2023 15:45:54                      */
/*==============================================================*/


drop table if exists ABSENCE;

drop table if exists BULLETINPAIE;

drop table if exists CONGES;

drop table if exists DESIGNATION;

drop table if exists DISPOSER;

drop table if exists EMPLOYE;

drop table if exists ENTREPRISE;

drop table if exists GROUPE;

drop table if exists HEURES_SUPP;

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
   DATE_DEBUT_ABSENCE   date,
   DATE_FIN_ABSENCE     date,
   NBR_HEURES           int,
   primary key (ID_ABSENCE)
);

/*==============================================================*/
/* Table : BULLETINPAIE                                         */
/*==============================================================*/
create table BULLETINPAIE
(
   ID_BP                int not null,
   ID_EMP               int not null,
   DATE_PAIE            date,
   SALAIRE_NET          double,
   primary key (ID_BP)
);

/*==============================================================*/
/* Table : CONGES                                               */
/*==============================================================*/
create table CONGES
(
   ID_CONGES            int not null,
   ID_EMP               int not null,
   STATUT_CONGES        varchar(26),
   DATE_DEBUT_CONGE     date,
   DATE_FIN_CONGE       date,
   primary key (ID_CONGES)
);

/*==============================================================*/
/* Table : DESIGNATION                                          */
/*==============================================================*/
create table DESIGNATION
(
   ID_DES               int not null,
   ID_BP                int not null,
   NOM_DES              varchar(50),
   MONTANT_DES          int,
   primary key (ID_DES)
);

/*==============================================================*/
/* Table : DISPOSER                                             */
/*==============================================================*/
create table DISPOSER
(
   ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__ int not null,
   ID_RUBRIQUE          int not null,
   REGLE_D_CALCUL       varchar(200),
   primary key (ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__, ID_RUBRIQUE)
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
   SALAIRE_BASE_EMP     double,
   DATE_NAISSANCE_EMP   date,
   MODE_PAIEMENT_EMP    varchar(50),
   DATE_EMBACHE_EMP     date,
   POSTE_EMP            varchar(50),
   LOGIN_EMP            varchar(100),
   MDP_EMP              varchar(100),
   primary key (ID_EMP)
);

/*==============================================================*/
/* Table : ENTREPRISE                                           */
/*==============================================================*/
create table ENTREPRISE
(
   ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__ int not null,
   ID_GROUPE            int,
   NOM_ENT              varchar(26),
   ADRESSE_ENT          varchar(200),
   NUM_CNSS_ENT         varchar(15),
   primary key (ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__)
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
/* Table : RECLAMATION                                          */
/*==============================================================*/
create table RECLAMATION
(
   ID_EMP               int not null,
   ID_REC               int,
   SUJET                varchar(500),
   TYPE_REC             varchar(50),
   RESPO_DESTINE        char(1)
);

/*==============================================================*/
/* Table : RESPONSABLE_RH                                       */
/*==============================================================*/
create table RESPONSABLE_RH
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
   SALAIRE_BASE_EMP     double,
   DATE_NAISSANCE_EMP   date,
   MODE_PAIEMENT_EMP    varchar(50),
   DATE_EMBACHE_EMP     date,
   POSTE_EMP            varchar(50),
   LOGIN_EMP            varchar(100),
   MDP_EMP              varchar(100),
   primary key (ID_EMP)
);

/*==============================================================*/
/* Table : RESPONSABLE_RP                                       */
/*==============================================================*/
create table RESPONSABLE_RP
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
   SALAIRE_BASE_EMP     double,
   DATE_NAISSANCE_EMP   date,
   MODE_PAIEMENT_EMP    varchar(50),
   DATE_EMBACHE_EMP     date,
   POSTE_EMP            varchar(50),
   LOGIN_EMP            varchar(100),
   MDP_EMP              varchar(100),
   primary key (ID_EMP)
);

/*==============================================================*/
/* Table : RUBRIQUE                                             */
/*==============================================================*/
create table RUBRIQUE
(
   ID_RUBRIQUE          int not null,
   LIBELLE_RUBRIQUE     varchar(50),
   primary key (ID_RUBRIQUE)
);

/*==============================================================*/
/* Table : TRAVAILLER                                           */
/*==============================================================*/
create table TRAVAILLER
(
   ID_EMP               int not null,
   ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__ int not null,
   DATE_AFFECTATION     date,
   primary key (ID_EMP, ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__)
);

alter table ABSENCE add constraint FK_SAISIR foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table BULLETINPAIE add constraint FK_POSSEDER foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table CONGES add constraint FK_AJOUTER foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table DESIGNATION add constraint FK_COMPOSER foreign key (ID_BP)
      references BULLETINPAIE (ID_BP) on delete restrict on update restrict;

alter table DISPOSER add constraint FK_DISPOSER foreign key (ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__)
      references ENTREPRISE (ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__) on delete restrict on update restrict;

alter table DISPOSER add constraint FK_DISPOSER2 foreign key (ID_RUBRIQUE)
      references RUBRIQUE (ID_RUBRIQUE) on delete restrict on update restrict;

alter table ENTREPRISE add constraint FK_APPARTENIR foreign key (ID_GROUPE)
      references GROUPE (ID_GROUPE) on delete restrict on update restrict;

alter table HEURES_SUPP add constraint FK_AVOIR foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table RECLAMATION add constraint FK_FAIRE foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table RESPONSABLE_RH add constraint FK_HERITAGE_2 foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table RESPONSABLE_RP add constraint FK_HERITAGE_1 foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table TRAVAILLER add constraint FK_TRAVAILLER foreign key (ID_EMP)
      references EMPLOYE (ID_EMP) on delete restrict on update restrict;

alter table TRAVAILLER add constraint FK_TRAVAILLER2 foreign key (ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__)
      references ENTREPRISE (ASSOCIATION_BIJECTIVE_ENTRE_DEUX_ENTITES__) on delete restrict on update restrict;

