create table ressources_humaines
\c io
create table personnel (
    id serial primary key,
    nom varchar(50)
);

create table disponibilite(
    id serial primary key,
    idpersonnel integer references personnel(id),
    debut time,
    fin time,
    dispo boolean
);

ressources_humaines=# insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (1,'lundi','8:00','9:30',true);
ressources_humaines=# insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (2,'lundi','10:00','11:30',true);
ressources_humaines=# insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (1,'lundi','14:00','15:30',true);
ressources_humaines=# insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (2,'lundi','16:00','17:30',true);
ressources_humaines=# insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (1,'mardi','8:00','10:30',true);
ressources_humaines=# insert into disponibilite(idpersonnel,jour,debut,fin,dispo) values (2,'mardi','11:00','12:30',true);