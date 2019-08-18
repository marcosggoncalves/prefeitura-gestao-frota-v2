
CREATE database controle_sist;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `status_categoria` varchar(80) DEFAULT NULL,
  `nome_categoria` varchar(100) DEFAULT NULL
);

CREATE TABLE `controle_saida_entrada_produtos` (
  `id_controle_produtos` int(11) NOT NULL,
  `quantidade_retirada` int(11) DEFAULT NULL,
  `data_retirada_produto` datetime DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_veiculo` int(11) DEFAULT NULL
);

CREATE TABLE `controle_troca_oleo` (
  `id_controle_troca_oleo` int(11) NOT NULL,
  `km_troca` text,
  `data_troca` datetime DEFAULT NULL,
  `id_veiculo` int(11) DEFAULT NULL
);

CREATE TABLE `produtos` (
    `id_produto` int(11) NOT NULL,
    `nome_produto` varchar(100) DEFAULT NULL,
    `data_produto_recebido` datetime DEFAULT NULL,
    `quantidade_produto` int(11) DEFAULT NULL,
    `quantidade_restante` int(11) DEFAULT NULL
);


CREATE TABLE `saida_para_manuntencao` (
  `id_saida_manuntencao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `km_retorno_veiculo` text,
  `km_saida_veiculo` text,
  `data_retorno_veiculo` datetime DEFAULT NULL,
  `status` varchar(80) DEFAULT NULL,
  `data_saida_veiculo` datetime DEFAULT NULL,
  `veiculo_substituicao` varchar(60) DEFAULT NULL,
  `id_veiculo` int(11) DEFAULT NULL,
  `desc_manuntencao` text
);


CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `setor_usuario` varchar(60) DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `telefone_usuario` char(11) DEFAULT NULL,
  `senha_usuario` char(8) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `acesso` datetime DEFAULT NULL
);

CREATE TABLE `veiculos` (
  `placa_veiculo` char(8) DEFAULT NULL,
  `id_veiculo` int(11) NOT NULL,
  `descricao_veiculo` text,
  `status` varchar(60) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
);

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);


ALTER TABLE `controle_saida_entrada_produtos`
  ADD PRIMARY KEY (`id_controle_produtos`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_veiculo` (`id_veiculo`);


ALTER TABLE `controle_troca_oleo`
  ADD PRIMARY KEY (`id_controle_troca_oleo`),
  ADD KEY `id_veiculo` (`id_veiculo`);


ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);


ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD KEY `id_categoria` (`id_categoria`);


ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `controle_saida_entrada_produtos`
  MODIFY `id_controle_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `controle_troca_oleo`
  MODIFY `id_controle_troca_oleo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `veiculos`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;


ALTER TABLE `controle_saida_entrada_produtos`
  ADD CONSTRAINT `controle_saida_entrada_produtos_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE,
  ADD CONSTRAINT `controle_saida_entrada_produtos_ibfk_2` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE CASCADE;


ALTER TABLE `controle_troca_oleo`
  ADD CONSTRAINT `controle_troca_oleo_ibfk_1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE CASCADE;

ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

INSERT INTO `categoria` (`id_categoria`, `status_categoria`, `nome_categoria`) VALUES
(1, 'Reserva', 'Ã”nibus'),
(2, 'Reserva', 'Micro-Ã´nibus'),
(3, 'ServiÃ§o', 'Ã”nibus'),
(4, 'ServiÃ§o', 'Micro-Ã´nibus');


INSERT INTO `veiculos` (`placa_veiculo`, `id_veiculo`, `descricao_veiculo`, `status`, `id_categoria`) VALUES
('NRZ 3771', 9, 'Ã”NIBUS ESCOLAR', 'Disponivel', 3),
('NRZ 3772', 10, 'Ã”NIBUS ESCOLAR', 'Disponivel', 3),
('NRZ 3773', 11, 'Ã”NIBUS ESCOLAR', 'Disponivel', 3),
('NRZ-3774', 12, 'TRANSPORTE ESCOLAR', 'Disponivel', 3),
('NRZ-3775', 13, 'TRANSPORTE ESCOLAR', 'Disponivel', 3),
('NRZ-3483', 14, 'TRANSPORTE ESCOLAR', 'Disponivel', 4),
('NRZ-3482', 15, 'TRANSPORTE ESCOLAR', 'Disponivel', 4),
('QAB-4432', 16, 'TRANSPORTE ESCOLAR', 'Indisponivel', 3),
('NRL-9970', 17, 'TRANSPORTE ESCOLAR', 'Disponivel', 1),
('OOM-6915', 18, 'TRANSPORTE ESCOLAR', 'Disponivel', 3),
('NRZ-3651', 19, 'TRANSPORTE ESCOLAR', 'Disponivel', 3),
('NRZ-3486', 20, 'TRANSPORTE ESCOLAR', 'Indisponivel', 4),
('NRZ-3650', 21, 'TRANSPORTE ESCOLAR', 'Disponivel', 3),
('NRZ-3484', 22, 'TRANSPORTE ESCOLAR', 'Disponivel', 2),
('NRZ-3485', 23, 'TRANSPORTE ESCOLAR', 'Disponivel', 4),
('HQH 9639', 25, 'Ã”NIBUS PARTICULAR', 'Indisponivel', 2),
('NRZ 3484', 26, 'Ã”NIBUS ESCOLAR', 'Disponivel', 3),
('NRZ 3485', 27, 'TRANSPORTE ESCOLAR  ', 'Indisponivel', 4),
('NRZ 3485', 28, 'TRANSPORTE ESCOLAR  ', 'Disponivel', 4);



INSERT INTO `saida_para_manuntencao` (`id_saida_manuntencao`, `km_retorno_veiculo`, `km_saida_veiculo`, `data_retorno_veiculo`, `status`, `data_saida_veiculo`, `veiculo_substituicao`, `id_veiculo`, `desc_manuntencao`) VALUES
(0, '123.674', '123.674', '2019-02-20 09:35:33', 'Fechado', '2019-01-18 11:55:58', 'NRZ-3484', 9, 'Ã´nibus'),
(0, '142.553', '142.551', '2019-02-20 09:34:53', 'Fechado', '2019-02-04 13:33:13', 'Veiculo', 23, 'Ã´nibus escolar'),
(0, '126.419', '126.413', '2019-02-20 09:34:24', 'Fechado', '2019-02-04 13:39:35', 'Veiculo', 15, 'Ã´nibus escolar'),
(0, '0', '133', '0000-00-00 00:00:00', 'Aberto', '2019-02-04 13:41:55', 'Veiculo', 25, 'Ã”NIBUS PARTICULAR'),
(0, '0', '61', '0000-00-00 00:00:00', 'Aberto', '2019-02-05 14:27:03', 'Veiculo', 16, 'Ã´nibus escolar'),
(0, '163.716', '163.712', '2019-02-20 09:33:39', 'Fechado', '2019-02-05 14:28:01', 'Veiculo', 11, 'Ã´nibus escolar'),
(0, '103.986', '103.982', '2019-02-20 09:32:48', 'Fechado', '2019-02-05 14:29:36', 'Veiculo', 18, 'Ã´nibus escolar'),
(0, '160.743', '160.738', '2019-02-20 09:32:22', 'Fechado', '2019-02-05 14:30:19', 'Veiculo', 12, 'Ã´nibus escolar'),
(0, '107.948', '107.936', '2019-02-20 09:31:35', 'Fechado', '2019-02-05 14:31:03', 'Veiculo', 21, 'Ã´nibus escolar'),
(0, '107.457', '107.450', '2019-02-20 09:30:59', 'Fechado', '2019-02-05 14:32:02', 'Veiculo', 10, 'Ã´nibus escolar'),
(0, '210.916', '210.914', '2019-02-20 09:30:07', 'Fechado', '2019-02-05 14:33:16', 'Veiculo', 13, 'Ã´nibus escolar'),
(0, '84.206', '84.194', '2019-02-14 14:08:55', 'Fechado', '2019-02-05 14:38:31', 'Veiculo', 19, 'Ã´nibus escolar'),
(0, '167.506', '167.502', '2019-02-20 09:26:24', 'Fechado', '2019-02-05 14:40:11', 'Veiculo', 26, 'Ã”NIBUS ESCOLAR'),
(0, '116.502', '116.489', '2019-02-27 13:12:59', 'Fechado', '2019-02-27 13:11:58', 'Veiculo', 14, 'REVISÃƒO GERAL'),
(0, '0', '61', '0000-00-00 00:00:00', 'Aberto', '2019-02-05 14:27:03', 'Veiculo', 16, 'Ã´nibus escolar');

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `data_produto_recebido`, `quantidade_produto`, `quantidade_restante`) VALUES
(2, 'PNEUS 7.50 R 16 TRASEIRO', '2019-02-04 14:00:29', 3, 3),
(3, 'PNEUS 7.50 R 16 DIANTEIRO', '2019-02-04 14:01:03', 4, 4),
(4, 'lÃ¢mpada 24 v 5w', '2019-02-07 09:52:25', 6, 6),
(5, 'lÃ¢mpada 24 v 4w', '2019-02-07 09:52:57', 8, 8),
(6, 'lÃ¢mpada h 1 24 v', '2019-02-07 09:53:39', 3, 3),
(7, 'lÃ¢mpada filamento p 21/sw 24 v', '2019-02-07 09:54:49', 3, 3),
(8, 'extensor de bico', '2019-02-07 09:55:29', 3, 4),
(9, 'prizilia enforca gato', '2019-02-07 09:56:09', 7, 7),
(10, 'bucha estabilizadora tras/diant barra', '2019-02-07 09:57:13', 4, 4),
(11, 'cÃ¢mara de ar', '2019-02-07 10:22:11', 1, 1),
(14, 'pneu 195-70 22,5', '2019-02-25 11:35:30', 5, 1);


INSERT INTO `controle_saida_entrada_produtos` (`id_controle_produtos`, `quantidade_retirada`, `data_retirada_produto`, `id_produto`, `id_veiculo`) VALUES
(5, 4, '2019-02-25 11:35:53', 14, 10);




INSERT INTO `controle_troca_oleo` (`id_controle_troca_oleo`, `km_troca`, `data_troca`, `id_veiculo`) VALUES
(1, '113.000', '2019-02-04 08:25:00', 17),
(2, '116.000', '2019-02-04 08:55:00', 14),
(4, '167.506', '2019-02-22 09:37:00', 17),
(5, '123.674', '2019-02-14 08:15:00', 9),
(6, '167.506', '2019-02-14 09:10:00', 26),
(7, '210.916', '2019-02-14 10:00:00', 13),
(8, '107.957', '2019-02-14 07:15:00', 10),
(9, '160.743', '2019-02-14 09:50:00', 12),
(10, '103.986', '2019-02-14 08:45:00', 18),
(11, '163.716', '2019-02-14 08:15:00', 11),
(12, '115.106', '2019-02-14 09:20:00', 17),
(13, '126.419', '2019-02-14 10:25:00', 15),
(14, '142.553', '2019-02-14 11:00:00', 23),
(15, '116.502', '2019-02-14 10:05:00', 14),
(16, '123.674', '2019-02-14 10:00:00', 9);



INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `setor_usuario`, `email_usuario`, `telefone_usuario`, `senha_usuario`, `status`, `acesso`) VALUES
(1, 'Marcos Lopes', 'T.I', 'marcoslopesg7@gmail,com', ' 6798343255', '99510796', 'Ativo', '2019-03-08 07:03:46'),
(2, 'EDINALDO', 'Adm', '67 999266640', 'transporte.', '197719', 'Ativo', '2019-03-01 09:05:08');

