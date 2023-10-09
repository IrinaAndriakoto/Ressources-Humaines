create table ressources_humaines
\c io

CREATE TABLE CandidatRecuTest(
    idCandidatRecuTest SERIAL PRIMARY KEY,
    nomCandidat VARCHAR(50),
    contact VARCHAR(50),
    email VARCHAR(50)
);

CREATE TABLE Personnel(
    idPersonnel SERIAL PRIMARY KEY,
    nomPersonnel VARCHAR(50),
    contact VARCHAR(50),
    email VARCHAR(50)

);

CREATE TABLE Disponibilite(
    idDisponibilite SERIAL PRIMARY KEY,
    jour VARCHAR(50),
    dateHeure DATETIME,
    idPersonnel INTEGER,
    FOREIGN KEY (idPersonnel) REFERENCES Personnel (idPersonnel)
);


 CREATE TABLE programme (
    candidat_id INT,
    disponibilite_id INT,
    personnel_id INT,
    FOREIGN KEY (candidat_id) REFERENCES candidat(id),
    FOREIGN KEY (disponibilite_id) REFERENCES disponibilite(id),
    FOREIGN KEY (personnel_id) REFERENCES personnel(id)
);

 create view getprogramme as
 select d.jour,d.debut,c.nomcandidat,p.nom
 from programme as pr
 inner join CandidatRecuTest as c on pr.id_candidat = c.idcandidatrecutest
 inner join disponibilite as d on pr.id_dispo = d.id
 inner join personnel as p on pr.id_personnel = p.id;

 insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (1,'lundi','8:00','9:30',true);
 insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (2,'lundi','10:00','11:30',true);
 insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (1,'lundi','14:00','15:30',true);
 insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (2,'lundi','16:00','17:30',true);
 insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (1,'mardi','8:00','10:30',true);
 insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (2,'mardi','11:00','12:30',true);