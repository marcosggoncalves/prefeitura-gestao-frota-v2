
create database controle_sist;
ALTER DATABASE controle_sist CHARSET = UTF8 COLLATE = utf8_general_ci;

CREATE TABLE controle_saida_entrada_produtos (
	id_controle_produtos INTEGER PRIMARY KEY auto_increment,
	quantidade_retirada INTEGER,
	data_retirada_produto DATETIME,
	id_produto INTEGER,
	id_veiculo INTEGER
);

CREATE TABLE categoria (
	id_categoria INTEGER PRIMARY KEY auto_increment,
	status_categoria VARCHAR(80),
	nome_categoria VARCHAR(100)
);

CREATE TABLE usuario (
	id_usuario INTEGER PRIMARY KEY auto_increment,
	nome_usuario VARCHAR(100),
	setor_usuario VARCHAR(60),
	email_usuario VARCHAR(45),
	telefone_usuario CHAR(11),
	senha_usuario VARCHAR(255),
	status VARCHAR(100),
	acesso datetime
);

CREATE TABLE controle_troca_oleo (
	id_controle_troca_oleo INTEGER PRIMARY KEY auto_increment,
	km_troca INTEGER,
	data_troca DATETIME,
	id_veiculo INTEGER
);

CREATE TABLE produtos (
	id_produto INTEGER PRIMARY KEY auto_increment,
	nome_produto VARCHAR(100),
	data_produto_recebido DATETIME,
	quantidade_produto INTEGER,
	quantidade_restante INTEGER
);

CREATE TABLE saida_para_manuntencao (
	id_saida_manuntencao INTEGER PRIMARY KEY auto_increment,
	km_retorno_veiculo INTEGER,
	km_saida_veiculo INTEGER,
	data_retorno_veiculo DATETIME,
	status VARCHAR(80),
	data_saida_veiculo DATETIME,
	veiculo_substituicao CHAR(8),
	id_veiculo INTEGER,
	desc_manuntencao text
);

CREATE TABLE veiculos (
	placa_veiculo CHAR(8),
	id_veiculo INTEGER PRIMARY KEY auto_increment,
	descricao_veiculo text,
	status VARCHAR(60),
	id_categoria INTEGER,
	FOREIGN KEY(id_categoria) REFERENCES categoria (id_categoria)
);

ALTER TABLE controle_saida_entrada_produtos ADD FOREIGN KEY(id_produto) REFERENCES produtos (id_produto) ON DELETE CASCADE;
ALTER TABLE controle_saida_entrada_produtos ADD FOREIGN KEY(id_veiculo) REFERENCES veiculos (id_veiculo) ON DELETE  CASCADE;
ALTER TABLE controle_troca_oleo ADD FOREIGN KEY(id_veiculo) REFERENCES veiculos (id_veiculo) ON DELETE  CASCADE;
ALTER TABLE saida_para_manuntencao ADD FOREIGN KEY(id_veiculo) REFERENCES veiculos (id_veiculo) ON DELETE CASCADE;

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `setor_usuario`, `email_usuario`, `telefone_usuario`, `senha_usuario`, `status`, `acesso`) VALUES
(1, 'Marcos Gonçalves', 'T.I', 'marcoslopesg7@gmail.com', '41988170812', '81dc9bdb52d04dc20036dbd8313ed055', 'Ativo', '2025-04-13 19:44:53');
