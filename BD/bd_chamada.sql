-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_chamada` DEFAULT CHARACTER SET utf8 ;
USE `bd_chamada` ;

-- -----------------------------------------------------
-- Table `mydb`.`Tb_TipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_TipoUsuario` (
  `Cod_TipoUsuario` INT NOT NULL AUTO_INCREMENT,
  `Tipo_Usuario` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`Cod_TipoUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tb_Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Usuario` (

`Cod_Usuario` INT NOT NULL AUTO_INCREMENT,
`Nome_Usuario` VARCHAR(255) NOT NULL,
`Senha` VARCHAR(10) NOT NULL,
`Sexo` CHAR(1) NOT NULL,
`Prontuario` CHAR(8) NOT NULL,
`Cod_TipoUsuario` INT NOT NULL,
PRIMARY KEY (`Cod_Usuario`),
INDEX `fk_Tb_Usuario_Tb_TipoUsuario1_idx` (`Cod_TipoUsuario` ASC),
CONSTRAINT `fk_Tb_Usuario_Tb_TipoUsuario1`
FOREIGN KEY (`Cod_TipoUsuario`)
REFERENCES `bd_chamada`.`Tb_TipoUsuario` (`Cod_TipoUsuario`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Tb_Genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Genero` (
`Cod_Genero` INT NOT NULL AUTO_INCREMENT,
`Genero` VARCHAR(10) NOT NULL,
`Nome_Social` VARCHAR(255) NOT NULL,
`Cod_Usuario` INT NOT NULL,
PRIMARY KEY (`Cod_Genero`),
INDEX `fk_Tb_Genero_Tb_Usuario_idx` (`Cod_Usuario` ASC),
CONSTRAINT `fk_Tb_Genero_Tb_Usuario`
FOREIGN KEY (`Cod_Usuario`)
REFERENCES `bd_chamada`.`Tb_Usuario` (`Cod_Usuario`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)

ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Tb_Curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Curso` (
  `Cod_Curso` INT NOT NULL AUTO_INCREMENT,
  `Nome_Curso` VARCHAR(50) NOT NULL,
  `Sigla` VARCHAR(5) NOT NULL,
  `Ano` INT NOT NULL,
  `Semestre` INT NOT NULL,
  PRIMARY KEY (`Cod_Curso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tb_Aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Aluno` (
`Cod_Aluno` INT NOT NULL AUTO_INCREMENT,
`Biometria` int,
`Cod_Usuario` INT NOT NULL,
`Cod_Curso` INT NOT NULL,
PRIMARY KEY (`Cod_Aluno`),
INDEX `fk_Tb_Aluno_Tb_Usuario1_idx` (`Cod_Usuario` ASC),
INDEX `fk_Tb_Aluno_Tb_Curso1_idx` (`Cod_Curso` ASC),
CONSTRAINT `fk_Tb_Aluno_Tb_Usuario1`
FOREIGN KEY (`Cod_Usuario`)
REFERENCES `bd_chamada`.`Tb_Usuario` (`Cod_Usuario`)
ON DELETE NO ACTION

ON UPDATE NO ACTION,
CONSTRAINT `fk_Tb_Aluno_Tb_Curso1`
FOREIGN KEY (`Cod_Curso`)
REFERENCES `bd_chamada`.`Tb_Curso` (`Cod_Curso`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Tb_Disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Disciplina` (
`Cod_Disciplina` INT NOT NULL AUTO_INCREMENT,
`Carga_Horaria` INT NOT NULL,
`Qtd_Aulas` INT NOT NULL,
`Nome_Disciplina` VARCHAR(50) NOT NULL,
`Cod_Curso` INT NOT NULL,
PRIMARY KEY (`Cod_Disciplina`),
INDEX `fk_Tb_Disciplina_Tb_Curso1_idx` (`Cod_Curso` ASC),
CONSTRAINT `fk_Tb_Disciplina_Tb_Curso1`
FOREIGN KEY (`Cod_Curso`)
REFERENCES `bd_chamada`.`Tb_Curso` (`Cod_Curso`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tb_Plano`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Plano` (
`Cod_Plano` INT NOT NULL AUTO_INCREMENT,
`Ano` INT NOT NULL,
`Cod_Disciplina` INT NOT NULL,
`Semestre` INT NOT NULL,
`Cod_Usuario` INT NOT NULL,
PRIMARY KEY (`Cod_Plano`),
INDEX `fk_Tb_Plano_Tb_Disciplina1_idx` (`Cod_Disciplina` ASC),
INDEX `fk_Tb_Plano_Tb_Usuario1_idx` (`Cod_Usuario` ASC),
CONSTRAINT `fk_Tb_Plano_Tb_Disciplina1`
FOREIGN KEY (`Cod_Disciplina`)
REFERENCES `bd_chamada`.`Tb_Disciplina` (`Cod_Disciplina`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Tb_Plano_Tb_Usuario1`
FOREIGN KEY (`Cod_Usuario`)
REFERENCES `bd_chamada`.`Tb_Usuario` (`Cod_Usuario`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `mydb`.`Tb_Aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Aula` (
`Cod_Aula` INT NOT NULL AUTO_INCREMENT,
`Conteudo` VARCHAR(45) NOT NULL,
`Data` DATE NOT NULL,
`Num_Semana` INT NOT NULL,
`Cod_Plano` INT NOT NULL,
  PRIMARY KEY (`Cod_Aula`),
  INDEX `fk_Tb_Aula_Tb_Plano1_idx` (`Cod_Plano` ASC),
  CONSTRAINT `fk_Tb_Aula_Tb_Plano1`
    FOREIGN KEY (`Cod_Plano`)
    REFERENCES `bd_chamada`.`Tb_Plano` (`Cod_Plano`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Tb_Frequencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Frequencia` (
  `Cod_Aluno` INT NOT NULL,
  `Cod_Disciplina` INT NOT NULL,
  `Cod_Frequencia` INT NOT NULL AUTO_INCREMENT,
  `Faltas` INT NOT NULL,
  INDEX `fk_Tb_Frequencia_Tb_Aluno1_idx` (`Cod_Aluno` ASC),
  INDEX `fk_Tb_Frequencia_Tb_Disciplina1_idx` (`Cod_Disciplina` ASC),
  PRIMARY KEY (`Cod_Frequencia`),
  CONSTRAINT `fk_Tb_Frequencia_Tb_Aluno1`
    FOREIGN KEY (`Cod_Aluno`)
    REFERENCES `bd_chamada`.`Tb_Aluno` (`Cod_Aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tb_Frequencia_Tb_Disciplina1`
    FOREIGN KEY (`Cod_Disciplina`)
    REFERENCES `bd_chamada`.`Tb_Disciplina` (`Cod_Disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tb_Inscricao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_chamada`.`Tb_Inscricao` (
  `Cod_Inscricao` INT NOT NULL AUTO_INCREMENT,
  `Cod_Aluno` INT NOT NULL,
  `Cod_Disciplina` INT NOT NULL,
  `Ano` INT NOT NULL,
  `Semestre` INT NOT NULL,
  PRIMARY KEY (`Cod_Inscricao`),
  INDEX `fk_Tb_Inscricao_Tb_Aluno1_idx` (`Cod_Aluno` ASC),
  INDEX `fk_Tb_Inscricao_Tb_Disciplina1_idx` (`Cod_Disciplina` ASC),
  CONSTRAINT `fk_Tb_Inscricao_Tb_Aluno1`
    FOREIGN KEY (`Cod_Aluno`)
    REFERENCES `bd_chamada`.`Tb_Aluno` (`Cod_Aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tb_Inscricao_Tb_Disciplina1`
    FOREIGN KEY (`Cod_Disciplina`)
    REFERENCES `bd_chamada`.`Tb_Disciplina` (`Cod_Disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Inserts
-- -----------------------------------------------------

/*
oncascade****
*/

INSERT INTO Tb_TipoUsuario (Tipo_Usuario)  VALUES ('Administrador');
INSERT INTO Tb_TipoUsuario (Tipo_Usuario) VALUES ('Professor');
INSERT INTO Tb_TipoUsuario (Tipo_Usuario) VALUES ('Aluno');
  
insert into Tb_Curso values (null,'Tecnico em Desenvolvimento de Sistemas','TDS','2018','2');
insert into Tb_Curso values (null,'Tecnologo em Analise e Desenvolvimento de Sistemas','TADS','2018','1');
insert into Tb_Curso values (null,'Tecnologo e Eletronica industrial','TEI','2018','2');

insert into Tb_Usuario values (null,'Nilton', '1704095','M','1704095','1');
insert into Tb_Usuario values (null,'Caio', '1704359','M','1704359','2');
insert into Tb_Usuario values (null,'Matheus', '1704148','M','1704148','3');
insert into Tb_Usuario values (null,'Naomi', '1704743','F','1704743','3');
insert into Tb_Usuario values (null,'Bruna', '1705689','F','1705689','3');

INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Progamacao Avancada 1', 1);
INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Matematica', 1);
INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Introducao a Banco de Dados', 1);

INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Algoritmos e Logica de Programacao', 2);
INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Redes', 2);
INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Programacao Orientada a Objetos', 2);

INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Matematica', 3);
INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Mecanica de Automacao', 3);
INSERT INTO Tb_Disciplina VALUES (null, 60, 20, 'Ingles Instrumental', 3);

INSERT INTO Tb_Plano VALUES (null, 2018, 1, 2, 2);
INSERT INTO Tb_Plano VALUES (null, 2018, 2, 2, 2);
INSERT INTO Tb_Plano VALUES (null, 2018, 3, 2, 2);

INSERT INTO Tb_Plano VALUES (null, 2018, 4, 2, 2);
INSERT INTO Tb_Plano VALUES (null, 2018, 5, 2, 2);
INSERT INTO Tb_Plano VALUES (null, 2018, 6, 2, 2);

INSERT INTO Tb_Plano VALUES (null, 2018, 7, 2, 2);
INSERT INTO Tb_Plano VALUES (null, 2018, 8, 2, 2);
INSERT INTO Tb_Plano VALUES (null, 2018, 9, 2, 2);

INSERT INTO Tb_Aluno VALUES (null, 1, 3, 1);
INSERT INTO Tb_Aluno VALUES (null, 2, 4, 2);
INSERT INTO Tb_Aluno VALUES (null, 3, 5, 3);

INSERT INTO Tb_Aula VALUES (null, 'Introducao a Web Service','2018-04-13',1, 1);
INSERT INTO Tb_Aula VALUES (null, 'Como construir Web Service','2018-04-20',2, 1);
INSERT INTO Tb_Aula VALUES (null, 'Comunicar Servlet com Banco de Dados','2018-04-27',3, 1);

INSERT INTO Tb_Aula VALUES (null, 'Conjunto','2018-04-13',1, 2);
INSERT INTO Tb_Aula VALUES (null, 'Funcao','2018-04-20',2, 2);
INSERT INTO Tb_Aula VALUES (null, 'Matriz','2018-04-27',3, 2);

INSERT INTO Tb_Aula VALUES (null, 'Introducao a Banco de Dados','2018-04-14',1, 3);
INSERT INTO Tb_Aula VALUES (null, 'Contrucao do Banco de Dados','2018-04-21',2, 3);
INSERT INTO Tb_Aula VALUES (null, 'Consulta ao Banco de Dados','2018-04-28',3, 3);

INSERT INTO Tb_Aula VALUES (null, 'Introducao a programacao','2018-04-15',1, 4);
INSERT INTO Tb_Aula VALUES (null, 'Utilizando a ferramenta portugol','2018-04-22',2, 4);
INSERT INTO Tb_Aula VALUES (null, 'Exercicios em portugol','2018-04-29',3, 4);

INSERT INTO Tb_Aula VALUES (null, 'Introducao a Redes','2018-04-16',1, 5);
INSERT INTO Tb_Aula VALUES (null, 'Como funcionam os sistemas de redes','2018-04-23',2, 5);
INSERT INTO Tb_Aula VALUES (null, 'Distribuicao do sistema de redes','2018-04-30',3, 5);

INSERT INTO Tb_Aula VALUES (null, 'Introducao a Orientacao a Objetos','2018-04-17',1, 6);
INSERT INTO Tb_Aula VALUES (null, 'Programacao em Java','2018-04-24',2, 6);
INSERT INTO Tb_Aula VALUES (null, 'Exercicios de Java','2018-05-01',3, 6);

INSERT INTO Tb_Aula VALUES (null, 'Conjunto','2018-04-13',1, 7);
INSERT INTO Tb_Aula VALUES (null, 'Funcao','2018-04-20',2, 7);
INSERT INTO Tb_Aula VALUES (null, 'Matriz','2018-04-27',3, 7);

INSERT INTO Tb_Aula VALUES (null, 'Introducao a Web Service','2018-04-14',1, 8);
INSERT INTO Tb_Aula VALUES (null, 'Como construir Web Service','2018-04-21',2, 8);
INSERT INTO Tb_Aula VALUES (null, 'Comunicar Servlet com Banco de Dados','2018-04-28',3, 8);

INSERT INTO Tb_Aula VALUES (null, 'Introducao a Ingles Instrumental','2018-04-15',1, 9);
INSERT INTO Tb_Aula VALUES (null, 'Traducao de textos','2018-04-22',2, 9);
INSERT INTO Tb_Aula VALUES (null, 'Exercicios em Ingles','2018-04-29',3, 9);

INSERT INTO Tb_Inscricao VALUES (null, 1, 1, 2018, 2);
INSERT INTO Tb_Inscricao VALUES (null, 1, 2, 2018, 2);
INSERT INTO Tb_Inscricao VALUES (null, 1, 3, 2018, 2);

INSERT INTO Tb_Inscricao VALUES (null, 2, 4, 2018, 2);
INSERT INTO Tb_Inscricao VALUES (null, 2, 5, 2018, 2);
INSERT INTO Tb_Inscricao VALUES (null, 2, 6, 2018, 2);

INSERT INTO Tb_Inscricao VALUES (null, 3, 7, 2018, 2);
INSERT INTO Tb_Inscricao VALUES (null, 3, 8, 2018, 2);
INSERT INTO Tb_Inscricao VALUES (null, 3, 9, 2018, 2);


INSERT INTO tb_frequencia VALUES (1, 3, null, 60);

INSERT INTO tb_frequencia VALUES (2, 4, null, 4);
INSERT INTO tb_frequencia VALUES (2, 5, null, 16);
INSERT INTO tb_frequencia VALUES (2, 6, null, 0);

INSERT INTO tb_frequencia VALUES (3, 7, null, 4);
INSERT INTO tb_frequencia VALUES (3, 8, null, 4);
INSERT INTO tb_frequencia VALUES (3, 9, null, 4);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;