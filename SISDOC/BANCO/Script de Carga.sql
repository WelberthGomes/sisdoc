/*Selecionando Banco*/

USE DB_SISDOC;

/*Carregando tabela usuario*/

INSERT INTO usuario (NM_USU, TX_EML_USU, TX_LGN_USU, TX_SNH_USU, VL_NVL_USU, VL_STT_USU) VALUES ('Anchieta','anchieta@hotmail.com','anchieta','anchieta',2,'A');

/*Carregando tabela tipo_documento*/

INSERT INTO tipo_documento (NM_TIP_DOC) VALUES ('Autorização'),('Declaração'),('Notificação');


