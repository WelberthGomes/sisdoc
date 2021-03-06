/*
*Criando banco de dados DB_SISDOC
*/

CREATE DATABASE DB_SISDOC;

/*
*Selecionando banco de dados SISDOC
*/

USE DB_SISDOC;

/*
*Criando tabela USUARIO
*/

CREATE TABLE USUARIO(
CD_USU INT NOT NULL AUTO_INCREMENT ,
NM_USU CHAR(100) NOT NULL,
TX_LGN_USU CHAR(30) NOT NULL,
TX_SNH_USU CHAR(15) NOT NULL,
VL_NVL_USU INT(1) NOT NULL,
TX_EML_USU CHAR(100) NULL ,
VL_STT_USU CHAR(1) NOT NULL,
PRIMARY KEY (CD_USU),
UNIQUE KEY (TX_LGN_USU)
)ENGINE = innodb;

/*
*Criando tabela TIPO_DOCUMENTO
*/

CREATE TABLE TIPO_DOCUMENTO(
CD_TIP_DOC INT NOT NULL AUTO_INCREMENT,
NM_TIP_DOC CHAR(100) NOT NULL,
PRIMARY KEY (CD_TIP_DOC)
)ENGINE = innodb;


/*
*Criando tabela DOCUMENTO
*/

CREATE TABLE DOCUMENTO(
CD_DOC INT NOT NULL AUTO_INCREMENT ,
CD_USU INT NOT NULL ,
CD_TIP_DOC INT NOT NULL,
NR_DOC INT NOT NULL,
TX_DESC_DOC TEXT NULL,
TX_DST_DOC CHAR(100) NOT NULL,
DT_DOC DATE NOT NULL,
CD_MAT_DOC INT NOT NULL,
PRIMARY KEY (CD_DOC),
FOREIGN KEY (CD_USU) REFERENCES USUARIO(CD_USU),
FOREIGN KEY (CD_TIP_DOC) REFERENCES TIPO_DOCUMENTO(CD_TIP_DOC)
)ENGINE = innodb;


