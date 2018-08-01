CREATE DATABASE escola
  CHARACTER SET utf8
  COLLATE utf8_general_ci;
  
  use escola;

create table alunos(
	idaluno int not null auto_increment,
    nome varchar(20),
    matricula int,
    sexo enum('M','F'),
    nacionalidade varchar(20) default 'Brasil',
	primary key(idaluno)
)default  charset = utf8;

select * from alunos;

delete from alunos
where idaluno between 21 and 30;
 
create table professores(
	idprof int not null auto_increment,
    nome varchar(20),
    matricula int,
    disciplina varchar(20),
    primary key (idprof)
)default charset = utf8;


insert into professores values(default,'Otaviano','11512343','InterfaceHM'),
							 (default,'Valdete','11516028','Banco de Dados'),
							 (default,'Felipe Andrede','11534544','Inteli Artifi'),
							 (default,'Jose Cruvinal','76890978','Topicos Especiais'),
							 (default,'Ana Paula','12434565','Programação'),
							 (default,'Osvaldo','234556576','GAAL'),
							 (default,'Samara Leal','23434565','Coordenadora'),
							 (default,'Tiago Algusto','23540987','CVV'),
							 (default,'Gustavo','34657898','Compiladores'),
							 (default,'Caros Magnus','12345465','Administração');




alter table alunos 
add column professores int;

alter table alunos 
change  professores meu_professor int;

update alunos set professores = '11512343' where idaluno = 1;
update alunos set professores = '11516028' where idaluno = 2;
update alunos set professores = '76890978' where idaluno = 3;
update alunos set professores = '11512343' where idaluno = 4;
update alunos set professores = '12434565' where idaluno = 5;
update alunos set professores = '11512343' where idaluno = 6;
update alunos set professores = '23434565' where idaluno = 7;
update alunos set professores = '34657898' where idaluno = 8;
update alunos set professores = '11512343' where idaluno = 9;
update alunos set professores = '12345465' where idaluno = 10;





select nome, matricula from professores where idprof = '1';

select * from alunos where idaluno between 5 and 20;


select * from alunos;

select * from alunos inner join professores on alunos.meu_professor = professores.matricula group by alunos.meu_professor order by alunos.meu_professor;

select * from professores;





select nome, count(*) as numeros_de_alunos from alunos;














