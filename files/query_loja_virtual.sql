create database loja_virtual_pw2;

use loja_virtual_pw2;

alter database loja_virtual_pw2 charset = utf8mb4 collate = utf8mb4_bin;

create table tb_usuarios(
  id int auto_increment primary key,
  nome varchar(60) not null,
  email varchar(100) not null unique,
  senha varchar(32) not null
);

create table tb_categorias(
  id int auto_increment primary key,
  nome varchar(50) not null
);

create table tb_subcategorias(
  id int auto_increment primary key,
  id_categoria int not null,
  nome varchar(50) not null
);

create table tb_produtos(
  id int auto_increment primary key,
  id_subcategoria int not null,
  nome varchar(200) not null,
  descricao text,
  estoque integer default 0,
  valor decimal(10,2),
  ativo boolean default true
);

create table tb_produtos_fotos(
id int auto_increment primary key,
id_produto int,
foto varchar(200),
capa boolean default false
);

create table tb_clientes(
  id int auto_increment primary key,
  nome varchar(60),
  cpf_cnpj varchar(20),
  telefone_contato varchar(15),
  email varchar(100) not null UNIQUE,
  senha varchar(32) not null,
  endereco varchar(80) not null,
  numero varchar(10) not null,
  bairro varchar(30) not null,
  cep varchar(10) not null,
  estado varchar(2) not null,
  cidade varchar(70) not null
);

create table tb_status(
  id int auto_increment primary key,
  nome varchar(50)
);

insert into tb_status values 
(0,'Aguardando pagamento'),
(0,'Pagamento confirmado'),
(0,'Produto em separação'),
(0,'Produto Postado'),
(0,'Produto Entregue');


create table tb_pedidos(
  id int auto_increment primary key,
  data date not null,
  id_cliente int not null,
  total decimal(10,2),
  status int default 1
);

create table tb_pedidos_itens(
  id int auto_increment primary key,
  id_pedido int not null,
  id_produto int not null,
  valor_un decimal(10,2) not null,
  qtd int not null,
  valor_total decimal (10,2) not null
);
use loja_virtual_pw2;
select * from tb_usuarios;
drop table tb_usuarios;