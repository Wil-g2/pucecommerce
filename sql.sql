
create database sistema; 
use sistema;

create table users
(
	id int auto_increment primary key, 
	login varchar(20) not null, 
	senha varchar(100) not null, 
	data_inc timestamp default current_timestamp
); 

alter table users add email varchar(60);

create table cursos
(
	id int auto_increment primary key, 
	curso varchar(20) not null, 
	descricao varchar(255) not null, 
	duracao varchar(3)	
); 

create table alunos
(
	id int auto_increment primary key, 
	nome varchar(150) not null, 
	cep varchar(8) not null, 
	rua varchar(100), 
	numero varchar(10),
	bairro varchar(30),
	cidade varchar(30),
	uf varchar(10),	
	data_nascimento timestamp not null,
	cpf varchar(18) not null,
	data_pagamento timestamp default current_timestamp 	 
); 
alter table alunos add identidade varchar(20); 
alter table alunos add responsavel varchar(20); 
alter table alunos add email varchar(50); 
alter table alunos add telefone varchar(20); 
alter table alunos add celular varchar(20); 

alter table users add senha_conf varchar(100) not null;


create table categorias 
(
	id int auto_increment primary key, 
	categoria varchar(30) not null,
	data_inc timestamp default current_timestamp 
);

create table pagamento
(
	id int auto_increment primary key,
	curso int not null, 
	aluno int not null, 
	data_pagamento timestamp default current_timestamp,
	data_vencimento timestamp default current_timestamp,
	valor decimal(10,2) not null, 			
	FOREIGN KEY (curso) REFERENCES cursos(id),
	FOREIGN KEY (aluno) REFERENCES alunos(id)	
);


create table produtos
(
  id int auto_increment primary key,
  nome varchar(50) not null,
  descricao varchar(255) not null,
  peso decimal(10,2) not null,
  altura decimal (10,2) default 0,
  comprimento decimal (10,2) default 0,
  largura decimal (10,2) default 0,
  valor decimal (10,2) default 0 not null,
  ativo char(1) not null,
  fabricante varchar(30),
  categoria int not null,
  data_inc timestamp default current_timestamp,
  foreign key(categoria) references categorias(id)
);


 alter table users add tipo varchar(20) not null;

update users set tipo='administrador';

create table pessoa
(
  idpessoa int auto_increment primary key not null,
  nome varchar(50) not null,
  sobrenome varchar(50) not null,
  rg varchar(18),
  cpf varchar(18) not null,
  nascimetno timestamp not null,
  email varchar(60) not null,
  telefone varchar(18),
  celular varchar(18) not null,
  status varchar(1) not null default 'A',
  data_inc timestamp default current_timestamp,
  user int not null,
  foreign key(user) references users(id)
);

create table enderecos
(
  idendereco int auto_increment primary key,
  rua varchar(50) not null,
  numero varchar(12) not null,
  cep varchar(8) not null,
  cidade varchar(50) not null,
  bairro varchar(30) not null,
  complemento varchar(30),
  user_enderecos int not null,
  foreign key (user_enderecos) references users(id)
);
alter table enderecos add estado varchar(3) not null;
alter table enderecos add identificacao varchar(30);

create table pedido
(
  idpedido int auto_increment primary key,
  data timestamp not null default current_timestamp,
  total decimal(10,2)not null,
  user_pedido int not null,
  foreign key (user_pedido) references users(id)
);

create table itenspedido
(
  iditesnpedido int auto_increment primary key,
  produto int not null,
  pedido int not null,
  quantidade int not null,
  valor decimal(10,2) not null,
  total decimal(10,2) not null,
  foreign key (produto) references produtos(id),
  foreign key (pedido) references pedido(idpedido)
);


insert into pessoa(nome,sobrenome,cpf,nascimetno,email,celular,user) value ('Willian','Gaudencio','21212121',current_timestamp,'wil@teste.com','35 999999',5);

idpessoa int auto_increment primary key not null,
  nome varchar(50) not null,
  sobrenome varchar(50) not null,
  rg varchar(18),
  cpf varchar(18) not null,
  nascimetno timestamp not null,
  email varchar(60) not null,
  telefone varchar(18),
  celular varchar(18) not null,
  status varchar(1) not null default 'A',
  data_inc timestamp default current_timestamp,
  user int not null,
  foreign key(user) references users(id)
  );


create table acompanhamento(
  id int auto_increment primary key, 
  idpedido int not null, 
  data timestamp default current_timestamp, 
  evento varchar(100) not null,
  foreign key (idpedido) references pedido(idpedido)
);
