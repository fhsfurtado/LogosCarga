CREATE TABLE IF NOT EXISTS tb_clientes (
	id_cliente int(8) AUTO_INCREMENT,
    nome_cliente varchar(50) NOT NULL,
    cpfcnpj varchar(18) NOT NULL,
    endereco varchar(120) NOT NULL,
    numero varchar(7),
    complemento varchar(50) NOT NULL,
    bairro varchar(50) NOT NULL,
    municipio varchar(100) NOT NULL,
    cep varchar(10) NOT NULL,
    email varchar(30),
    telefone varchar(15),
    celular varchar(15) NOT NULL,
    receberInfo varchar(3) NOT NULL,
    tipo_ligacao varchar(10) NOT NULL,
    protocolo varchar(18) NOT NULL,
    assinatura text NOT NULL,
    atendido varchar(3) NOT NULL,
    id_atendente int(4),
    PRIMARY KEY(id_cliente)
);

CREATE TABLE IF NOT EXISTS tb_solicitacao (
    id_solicitacao int(4) AUTO_INCREMENT,
    prot_solicitacao varchar(18) NOT NULL,
    nome_equip varchar(25) NOT NULL,
    qtde_equip varchar(50) NOT NULL,
    potencia_equip varchar(50) NOT NULL,
    PRIMARY KEY(id_solicitacao)
);

ALTER TABLE tb_solicitacao ADD CONSTRAINT fk_prot_solicitacao FOREIGN KEY (prot_solicitacao) REFERENCES tb_clientes(protocolo) ;