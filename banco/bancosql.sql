CREATE TABLE IF NOT EXISTS tbusuarios (
 usucodigo serial NOT NULL,
 usunome varchar(50) NOT NULL,
 usucpfcnpj bigint NOT NULL,
 ususenha text NOT NULL,
 usutipo integer NOT NULL,
 CONSTRAINT pk_usuario PRIMARY KEY (usucodigo)
);

CREATE TABLE IF NOT EXISTS tbcliente (
 clicodigo serial NOT NULL,	
 usucodigo integer NOT NULL,
 CONSTRAINT pk_cliente PRIMARY KEY (clicodigo),
 CONSTRAINT fk_usuario FOREIGN KEY (usucodigo) REFERENCES tbusuarios (usucodigo)
);
