create database portaria;
use portaria;

drop table visitante;
create table visitante (
	id int not null auto_increment,
    nome varchar(25) not null,
    sobrenome varchar(25) not null,
    indentidade varchar(10) not null unique,
    empresa varchar(30),
    primary key(id)
);
select * from visitante;

drop table visita;
create table visita(
	id int not null auto_increment,
	id_visitante int not null,
    id_apartamento int not null,
    entrada datetime not null,
    saida datetime,
    
    primary key(id),
    foreign key(id_visitante) references visitante(id),
    foreign key(id_apartamento) references apartamento(id)
);
desc visita;

drop table apartamento;
create table apartamento(
	id int not null auto_increment,
	apartamento int not null unique,
	primary key(id)
);
insert into apartamento (apartamento) value
(100),
(201),(202),(301),(302),
(401),(402),(501),(502),
(601),(602),(701),(702),
(801),(802),(901),(902),
(1001),(1002),(1101),(1102),
(1201),(1202),(1301),(1302),
(1401),(1402),(1501),(1502),
(1601),(1602),(1701),(1702),(1801),(1802);
select * from apartamento;