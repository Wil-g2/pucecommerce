
create database sistema; 
use sistema;

create table users
(
	id int auto_increment primary key, 
	login varchar(20) not null, 
	senha varchar(100) not null, 
	data_inc timestamp default current_timestamp
); 
alter table users add senha_conf varchar(100) not null;
alter table users add tipo varchar(20) not null;

alter table users add email varchar(60);
insert into users (login,senha,email,senha_conf,tipo) values ('admin','7C4A8D09CA3762AF61E59520943DC26494F8941B','wil-g2@hotmail.com','7C4A8D09CA3762AF61E59520943DC26494F8941B','administrador');

create table categorias 
(
	id int auto_increment primary key, 
	categoria varchar(30) not null,
	data_inc timestamp default current_timestamp 
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
  alter table produtos add foto varchar(255);
  alter table produtos add valor_cmp decimal(10,2) default 0; 

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


create table acompanhamento(
  id int auto_increment primary key, 
  idpedido int not null, 
  data timestamp default current_timestamp, 
  evento varchar(100) not null,
  foreign key (idpedido) references pedido(idpedido)
);

create table sac(

	id_sac int auto_increment primary key, 
    tipo varchar(50) not null, 
    descricao varchar(255) not null, 
    status varchar(20) not null default "aberto", 
    resposta varchar(255), 
    data timestamp default current_timestamp,
	id_user int not null, 
    constraint foreign key fk_user_sac (id_user) references users(id)
); 

create table avaliacao(
	id_avaliacao int auto_increment primary key, 
    data timestamp default current_timestamp,    
    avalicao varchar(50) not null, 
    comentario varchar(255) not null, 	
	id_user int not null, 
    constraint foreign key fk_user_avaliacao (id_user) references users(id)
); 

create table fornecedor(
id_forn int auto_increment primary key, 
razao varchar(100) not null,
contato varchar(50) not null, 
fantasia varchar(50), 
cnpj varchar(18) not null,
rua varchar(100) not null, 
numero varchar(10) not null, 
bairro varchar(50) not null, 
estado varchar(20) not null, 
telefone varchar(18) not null, 
celular varchar(18),
email varchar(60) not null
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


