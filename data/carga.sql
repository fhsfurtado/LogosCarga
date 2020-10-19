CREATE TABLE IF NOT EXISTS tb_uf(
    id_uf int(4) AUTO_INCREMENT,
    sigla varchar(2) NOT NULL,
    nome_uf VARCHAR(25) NOT NULL,
    PRIMARY KEY(id_uf)
);

INSERT INTO `tb_uf`(`sigla`, `nome_uf`)
VALUES
('AC','Acre'),
('AL','Alagoas'),
('AP','Amapá'),
('AM','Amazonas'),
('BA','Bahia'),
('CE','Ceará'),
('DF','Distrito Federal'),
('ES','Espírito Santo'),
('GO','Goiás'),
('MA','Maranhã'),
('MT','Mato Grosso'),
('MS','Mato Grosso do Sul'),
('MG','Minas Gerais'),
('PA','Pará'),
('PB','Paraíba'),
('PR','Paraná'),
('PE','Pernambuco'),
('PI','Piauí'),
('RJ','Rio de Janeiro'),
('RN','Rio Grande do Norte'),
('RS','Rio Grande do Sul'),
('RO','Rondônia'),
('RR','Roraima'),
('SC','Santa Catarina'),
('SP','São Paulo'),
('SE','Sergipe'),
('TO','Tocantins');

CREATE TABLE IF NOT EXISTS tb_city(
    id_city int(4) AUTO_INCREMENT,
    nome_cidade varchar(25) NOT NULL,
    uf_cidade int(4) NOT NULL,
    PRIMARY KEY(id_city),
    FOREIGN KEY(uf_cidade) REFERENCES tb_uf(id_uf)
);

CREATE TABLE IF NOT EXISTS tb_lotacao(
    id_lotacao int(4) AUTO_INCREMENT,
    nome_lotacao varchar(25) NOT NULL,
    uf_lotacao varchar(2) NOT NULL,
    city_lotacao varchar(25) NOT NULL,
    ativo boolean NOT NULL DEFAULT true,
    PRIMARY KEY(id_lotacao)
);

CREATE TABLE IF NOT EXISTS tb_users(
    id_user int(4) AUTO_INCREMENT,
    matr_user int(6) NOT NULL,
    nome_user varchar(40) NOT NULL,
    senha varchar(40) NOT NULL,
    lotacao int(4) NOT NULL,
    nivel varchar(3) NOT NULL, /*OPE , SUP, COR, ADM, MTR*/
    ativo boolean NOT NULL DEFAULT true,
    data_criacao date NOT NULL,
    resp_criar int(4) NOT NULL,
    data_inativacao date,
    resp_inativ int(4),
    PRIMARY KEY (id_user),
    FOREIGN KEY(lotacao) REFERENCES tb_lotacao(id_lotacao)
);

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