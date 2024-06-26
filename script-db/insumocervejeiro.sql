create database if not exists insumocervejaria character set utf8 collate utf8_general_ci;

use insumocervejaria;

create table tipo (
	id INTEGER auto_increment primary key,
	nome VARCHAR(25)
) engine=InnoDB; 

create table insumo (
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
	insumo_id INTEGER,
	constraint FOREIGN key (insumo_id) references insumo (id)
) engine=InnoDB;