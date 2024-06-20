create database if not exists insumocervejeirodb character set utf8 collate utf8_general_ci;

use insumocervejeirodb;

create table tipo (
	id INTEGER auto_increment primary key,
	nome VARCHAR(25)
) engine=InnoDB; 

create table cafe (
	id INTEGER auto_increment primary key,
	nome VARCHAR(25),
	descricao VARCHAR(125),
	tipo_id INTEGER,
	constraint FOREIGN key (tipo_id) references tipo (id)
) engine=InnoDB;

create table consumo (
	id INTEGER auto_increment primary key,
	data DATE,
	hora TIME,
	qtd INTEGER,
	dia_semana VARCHAR (7),
	preco DECIMAL (5,2),
	cafe_id INTEGER,
	constraint FOREIGN key (cafe_id) references cafe (id)
) engine=InnoDB;