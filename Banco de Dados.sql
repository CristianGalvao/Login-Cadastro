create database login;
use login;

create table usuario(

id int not null primary key auto_increment,
nome varchar(150),
senha varchar (40),
email varchar(150),
telefone varchar(15),
endereco varchar(200),
sexo char

);

insert into usuario (nome, senha, email, telefone, endereco, sexo) values("Cristian Galvão da Silva","Cristi@n1", "cristian2018galvao@outlook.com", "11 998927895", "Manoel Alves Garcia", "M");

select * from usuario;

drop table usuario;




