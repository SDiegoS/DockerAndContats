CREATE TABLE IF NOT EXISTS tbusuarios (
 usucodigo serial NOT NULL,
 usunome varchar(50) NOT NULL,
 usucpfcnpj bigint NOT NULL,
 ususenha text NOT NULL,
 usutipo integer NOT NULL,
 CONSTRAINT pk_usuario PRIMARY KEY (usucodigo)
);

CREATE TABLE IF NOT EXISTS tbcontato (
 concodigo serial NOT NULL,
 conemail varchar(50),
 contelefone varchar(50),
 contipo integer not null,
 usucodigo integer NOT NULL,
 CONSTRAINT pk_contato PRIMARY KEY (concodigo),
 CONSTRAINT fk_usuario FOREIGN KEY (usucodigo) REFERENCES tbusuarios (usucodigo)
);
