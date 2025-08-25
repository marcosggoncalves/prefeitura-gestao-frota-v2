
CREATE DATABASE controle_sist;
ALTER DATABASE controle_sist CHARSET = UTF8 COLLATE = utf8_general_ci;
USE controle_sist;

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
	ativo INTEGER default 1,
	acesso datetime
);

CREATE TABLE controle_troca_oleo (
	id_controle_troca_oleo INTEGER PRIMARY KEY auto_increment,
	km_troca INTEGER,
	data_troca DATETIME,
	proxima_troca INTEGER,
	id_veiculo INTEGER
);

CREATE TABLE produtos (
	id_produto INTEGER PRIMARY KEY auto_increment,
	nome_produto VARCHAR(100),
	data_produto_recebido DATETIME,
	quantidade_produto INTEGER
);

CREATE TABLE produtos_movimentos(
	id_produto_movimento INTEGER PRIMARY KEY auto_increment,
	data_movimento datetime default now(),
	quantidade_movimento INTEGER,
	tipo_movimentacao INTEGER default 0,
	id_usuario INTEGER,
	id_produto INTEGER,
	id_veiculo INTEGER
);

CREATE TABLE saida_para_manuntencao (
	id_saida_manuntencao INTEGER PRIMARY KEY auto_increment,
	km_retorno_veiculo INTEGER,
	km_saida_veiculo INTEGER,
	data_retorno_veiculo DATETIME,
	status VARCHAR(80),
	data_saida_veiculo DATETIME,
	veiculo_substituicao VARCHAR(255),
	id_veiculo INTEGER,
	desc_manuntencao text
);

CREATE TABLE veiculos (
	id_veiculo INTEGER PRIMARY KEY auto_increment,
	placa_veiculo CHAR(8),
	descricao_veiculo text,
	lugares INTEGER default 0,
	status VARCHAR(60) default 'Disponivel',
	id_categoria INTEGER
);

CREATE TABLE parametros(
	id_parametro INTEGER PRIMARY KEY auto_increment,
	km_troca_oleo INTEGER,
	titulo_sistema VARCHAR(100),
	subtitulo_sistema VARCHAR(100)
);

ALTER TABLE produtos_movimentos ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario) ON DELETE  CASCADE;
ALTER TABLE produtos_movimentos ADD FOREIGN KEY(id_produto) REFERENCES produtos (id_produto) ON DELETE  CASCADE;
ALTER TABLE veiculos ADD FOREIGN KEY(id_categoria) REFERENCES categoria (id_categoria) ON DELETE  CASCADE;
ALTER TABLE controle_troca_oleo ADD FOREIGN KEY(id_veiculo) REFERENCES veiculos (id_veiculo) ON DELETE  CASCADE;
ALTER TABLE saida_para_manuntencao ADD FOREIGN KEY(id_veiculo) REFERENCES veiculos (id_veiculo) ON DELETE CASCADE;

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `setor_usuario`, `email_usuario`, `telefone_usuario`, `senha_usuario`, `acesso`) VALUES
(1, 'Marcos Gonçalves', 'T.I', 'marcoslopesg7@gmail.com', '41988170812', '81dc9bdb52d04dc20036dbd8313ed055', '2025-04-13 19:44:53');

INSERT INTO parametros (km_troca_oleo, titulo_sistema, subtitulo_sistema) VALUES (20000, 'Transporte Escolar', 'Controle de manutenção preventiva');
