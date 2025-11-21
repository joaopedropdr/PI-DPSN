CREATE DATABASE IF NOT EXISTS pi_dpsn CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pi_dpsn;

-- Dropando todas as tabelas do banco
DROP TABLE IF EXISTS administradores;
DROP TABLE IF EXISTS estaleiros;
DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS administradores_clientes;
DROP TABLE IF EXISTS clientes_estaleiros;
DROP TABLE IF EXISTS embarcacoes;
DROP TABLE IF EXISTS documentos;
DROP TABLE IF EXISTS pdf_documentos;
DROP TABLE IF EXISTS pdfs_assinados;
DROP TABLE IF EXISTS solicitacoes_pdfs_antigos;

-- Criando as tabelas do banco
CREATE TABLE administradores(
	id_administrador BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    email  VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    -- lOG
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    alterado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL
);
CREATE TABLE estaleiros(
	id_estaleiro BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome_empresa VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    cnpj VARCHAR(18) UNIQUE NOT NULL,
    telefone VARCHAR(50) NOT NULL,
    cep VARCHAR(9) UNIQUE NOT NULL,
    logradouro VARCHAR(255) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    complementos TEXT NULL,
    bairro VARCHAR(255) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    email  VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    -- lOG
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    alterado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL
);
CREATE TABLE clientes(
	id_cliente BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome VARCHAR(255) NOT NULL,
    cpf_cnpj VARCHAR(18) UNIQUE NOT NULL,
	ano_construcao_emb YEAR,
    chassi_emb VARCHAR(100),
    cep VARCHAR(9) UNIQUE NOT NULL,
    logradouro VARCHAR(255) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    bairro VARCHAR(255) NOT NULL,
    complementos TEXT NULL,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    -- lOG
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    alterado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL
);
CREATE TABLE administradores_clientes(
	id_administrador_cliente BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    administrador_id BIGINT UNSIGNED NOT NULL, 
    cliente_id BIGINT UNSIGNED NOT NULL, 
    -- lOG
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    alterado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
	-- Chaves estrangeiras
    FOREIGN KEY (administrador_id) REFERENCES administradores(id_administrador),
    FOREIGN KEY (cliente_id) REFERENCES clientes(id_cliente)
);
CREATE TABLE clientes_estaleiros(
	id_cliente_estaleiro BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    estaleiro_id BIGINT UNSIGNED NOT NULL, 
    cliente_id BIGINT UNSIGNED NOT NULL, 
    -- lOG
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    alterado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    -- Chaves estrangeiras
    FOREIGN KEY (cliente_id) REFERENCES clientes(id_cliente),
    FOREIGN KEY (estaleiro_id) REFERENCES estaleiros(id_estaleiro)
);
CREATE TABLE embarcacoes(
	id_embarcacao BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    estaleiro_id BIGINT UNSIGNED,
    nome VARCHAR(255) NULL,
    comprimento_total DECIMAL(8,2) NOT NULL,
    boca_moldada DECIMAL(8,2) NOT NULL,
    pontal_moldado DECIMAL(8,2) NOT NULL,
    calado_maximo DECIMAL(8,2) NOT NULL,
    calado_leve DECIMAL(8,2) NOT NULL,
    arqueacao_bruta DECIMAL(8,2) NOT NULL,
    arqueacao_liquida DECIMAL(8,2) NOT NULL,
    tpb DECIMAL(8,2) NOT NULL,
    contorno DECIMAL(8,2) NOT NULL,
    lastro DECIMAL(8,2) NULL,
    area_navegacao_tipo_servico VARCHAR(255) NOT NULL,
    tipo_embarcacao VARCHAR(255) NOT NULL,
    material_casco VARCHAR(255) NOT NULL,
    motorizacao_max INT NOT NULL,
    motorizacao_min INT NOT NULL,
    -- lOG
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    alterado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    -- Chave estrangeira
    FOREIGN KEY (estaleiro_id) REFERENCES estaleiros(id_estaleiro)
);
-- Mudanças na tabela
SHOW CREATE TABLE embarcacoes;
ALTER TABLE embarcacoes
ADD CONSTRAINT fk_estaleiro
FOREIGN KEY (estaleiro_id)
REFERENCES estaleiros (id_estaleiro)
ON DELETE CASCADE;
ALTER TABLE embarcacoes
	DROP FOREIGN KEY embarcacoes_ibfk_1;
ALTER TABLE embarcacoes
	MODIFY COLUMN estaleiro_id BIGINT UNSIGNED NOT NULL;
ALTER TABLE embarcacoes
	MODIFY COLUMN nome VARCHAR(255) NOT NULL;
ALTER TABLE embarcacoes
	MODIFY COLUMN motorizacao_min INT NULL;
ALTER TABLE embarcacoes
	ADD COLUMN num_tripulantes INT NOT NULL AFTER motorizacao_min;
ALTER TABLE embarcacoes
	ADD COLUMN num_passageiros INT NOT NULL AFTER num_tripulantes;
ALTER TABLE embarcacoes
	ADD COLUMN num_inscricao VARCHAR(255) NOT NULL AFTER num_passageiros;
ALTER TABLE embarcacoes
	MODIFY COLUMN num_inscricao VARCHAR(255) NULL;
DESCRIBE embarcacoes; 
CREATE TABLE documentos(
	id_documento BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    embarcacao_id BIGINT UNSIGNED NOT NULL,
    cliente_id BIGINT UNSIGNED NOT NULL,
    -- lOG
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    alterado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    -- Chave estrangeira
    FOREIGN KEY (embarcacao_id) REFERENCES embarcacoes(id_embarcacao),
	FOREIGN KEY (cliente_id) REFERENCES clientes(id_cliente)
);
CREATE TABLE pdf_documentos(
	id_pdf_documento BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,	
    documento_id BIGINT UNSIGNED NOT NULL,
    pdf BLOB NOT NULL,
    assinado BOOLEAN NULL,
    -- lOG
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    alterado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    -- Chave estrangeira
	FOREIGN KEY (documento_id) REFERENCES documentos(id_documento)
);

CREATE TABLE solicitacoes_pdfs_antigos();


