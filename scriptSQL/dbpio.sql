/***************************************************************
*	Database: dbpio
*	Objetivo: Utilizar esse datababase para o PROJETO DO PIO
*****************************************************************/

#Apaga o database caso já exista
drop database if exists dbpio;

#Cria um database no banco de dados
create database dbpio;

#Ativa a utilização do database
use dbpio;

#Cria a tabela de usuário no database
create table tblusuario (
	idusuario int not null auto_increment primary key,
    nome varchar (25) not null,
    sobrenome varchar (25) not null,
    senha varchar (50) not null,
    email varchar (50) not null
);

create table tblnoticia (
	idnoticia int not null auto_increment primary key,
    noticia varchar (1000) not null,
    tipoNoticia varchar (25) not null,
    nomeEditor varchar (50) not null
);

#Insere o primeiro usuário padrão (root) na tabela
insert into tblnoticia (noticia, tipoNoticia, nomeEditor)
	 values ('PS5 Reduz valor', 'GAMES', 'John');
     

#Insere o primeiro usuário padrão (root) na tabela
insert into tblusuario (nome, sobrenome, senha, email)
	 values ('root', 'root toot', '123', 'root@root');
   
alter table tblnoticia
	add column foto varchar(50);
    
    select * from tblnoticia;