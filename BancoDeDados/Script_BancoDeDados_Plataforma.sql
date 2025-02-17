CREATE DATABASE PMD;

USE PMD;

CREATE TABLE ANUNCIANTE(
	IdAnunciante INT PRIMARY KEY AUTO_INCREMENT,
	RazaoSocial VARCHAR(255) NOT NULL,
	Cnpj VARCHAR(30) NOT NULL,
	Telefone VARCHAR(30) NOT NULL,
	Email VARCHAR(255) NOT NULL,
	Senha VARCHAR(255) NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE PONTOSPUBLICIDADE(
	IdPontoPublicidade INT PRIMARY KEY AUTO_INCREMENT,
	Endereco VARCHAR(255) NOT NULL,
	Latitude VARCHAR(100) NOT NULL,
	Longitude VARCHAR(100) NOT NULL,
	Id_Anunc INT NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;


CREATE TABLE DESENVOLVEDOR(
	IdDesenvolvedor INT PRIMARY KEY AUTO_INCREMENT,
	DescricaoNome VARCHAR(255) NOT NULL,
	Documento ENUM('CPF','CNPJ') NOT NULL,
	Numero VARCHAR(30) NOT NULL,
	Email VARCHAR(255) NOT NULL,
	Senha VARCHAR(255) NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE ADMINISTRADOR(
	IdAdmin INT PRIMARY KEY AUTO_INCREMENT,
	Nome VARCHAR(255) NOT NULL,
	Email VARCHAR(255) NOT NULL,
	Senha VARCHAR(255) NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE PACOTES(
	IdPacote INT PRIMARY KEY AUTO_INCREMENT,
	NomePacote VARCHAR(255) NOT NULL,
	ValorPacote INT NOT NULL,
	QtdPontos INT NOT NULL,
	DataContratacao DATE NOT NULL,
	Id_Anunc INT NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;


CREATE TABLE BONUS(
	IdBonus INT PRIMARY KEY AUTO_INCREMENT,
	StatusBonus VARCHAR(255) NOT NULL,
	QtdVisualizacoes INT NOT NULL,
	Id_Anunc INT NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE TERMO_DESENVOLVEDOR(
	IdTermo INT PRIMARY KEY AUTO_INCREMENT,
	StatusTermo VARCHAR(255) NOT NULL,
	DataTermo DATE NOT NULL,
	Id_Desen INT NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE ANUNCIO(
	IdAnuncio INT PRIMARY KEY AUTO_INCREMENT,
	NomeAnuncio VARCHAR(255) NOT NULL,
	ModeloAnuncio VARCHAR(255) NOT NULL,
	TipoArquivo VARCHAR(255) NOT NULL,
	DirecAnuncio VARCHAR(255) NOT NULL,
	CaminhoAnuncio VARCHAR(255) NOT NULL,
	Anuncio MEDIUMBLOB NOT NULL,
	Id_Anunc INT NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE APLICATIVO(
	IdApp INT PRIMARY KEY AUTO_INCREMENT,
	NomeApp VARCHAR(255) NOT NULL,
	CategoriaApp VARCHAR(255) NOT NULL,
	IdentificadorApp VARCHAR(255) NOT NULL,
	Id_Desen INT NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE VISUALIZACOES(
	IdVisualizacoes INT PRIMARY KEY AUTO_INCREMENT,
	Quantidade VARCHAR(255) NOT NULL,
	Id_Ponto INT NOT NULL,
	Id_Anunc INT NOT NULL
)ENGINE = INNODB DEFAULT CHARSET = utf8;

INSERT INTO ANUNCIANTE(RazaoSocial,Cnpj,Telefone,Email,Senha) 
VALUES ("Thigoline Bolsas","00.000.232/00-00","(88) 9-9993-3323","th@gmail","202cb962ac59075b964b07152d234b70");

INSERT INTO DESENVOLVEDOR(DescricaoNome,Documento,Numero,Email,Senha) 
VALUES ("Caio Lima","CPF","072.285.83-70","caio@gmail","202cb962ac59075b964b07152d234b70");

INSERT INTO ADMINISTRADOR(Nome,Email,Senha) VALUES ("Admin","admin","202cb962ac59075b964b07152d234b70");

/*INSERT INTO BONUS(StatusBonus,QtdVisualizacoes,Id_Anunc) VALUES ('Ativo',20,1);

INSERT INTO TERMO_DESENVOLVEDOR(StatusTermo,DataTermo,Id_Desenvolvedor) VALUES ('Contratado','2019-04-11',1);*/

ALTER TABLE BONUS ADD CONSTRAINT FK_ID_ANUNC_BONUS FOREIGN KEY(Id_Anunc) REFERENCES ANUNCIANTE(IdAnunciante) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE PACOTES ADD CONSTRAINT FK_ID_ANUNC_PACOTES FOREIGN KEY(Id_Anunc) REFERENCES ANUNCIANTE(IdAnunciante) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE PONTOSPUBLICIDADE ADD CONSTRAINT FK_ID_ANUNC_PONTOS FOREIGN KEY(Id_Anunc) REFERENCES ANUNCIANTE(IdAnunciante) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE TERMO_DESENVOLVEDOR ADD CONSTRAINT FK_ID_DESEN_TERMO FOREIGN KEY(Id_Desen) REFERENCES DESENVOLVEDOR(IdDesenvolvedor) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE ANUNCIO ADD CONSTRAINT FK_ID_ANUNC_ANUNCIO FOREIGN KEY(Id_Anunc) REFERENCES ANUNCIANTE(IdAnunciante) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE APLICATIVO ADD CONSTRAINT FK_ID_DESEN_APP FOREIGN KEY(Id_Desen) REFERENCES DESENVOLVEDOR(IdDesenvolvedor) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE VISUALIZACOES ADD CONSTRAINT FK_ID_VISU_PONTO FOREIGN KEY(Id_Ponto) REFERENCES PONTOSPUBLICIDADE(IdPontoPublicidade) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE VISUALIZACOES ADD CONSTRAINT FK_ID_VISU_ANUNC FOREIGN KEY(Id_Anunc) REFERENCES ANUNCIANTE(IdAnunciante) ON DELETE CASCADE ON UPDATE CASCADE;