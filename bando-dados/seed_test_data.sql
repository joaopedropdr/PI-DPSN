USE pi_dpsn;

-- Dados de teste: estaleiro, cliente, embarcação e documento
-- Rodar este script para popular dados de exemplo para testes de emissão de PDF

-- Inserir estaleiro de teste (se ainda não existir)
INSERT INTO estaleiros (nome_empresa, nome, cnpj, telefone, cep, logradouro, numero, bairro, cidade, estado, email, senha)
SELECT 'Estaleiro Teste LTDA', 'Estaleiro Teste', '00.000.000/0001-99', '(11) 99999-0000', '01000-000', 'Rua Teste', '123', 'Centro', 'Cidade Teste', 'SP', 'teste@estaleiro.com', 'senha123'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM estaleiros WHERE cnpj = '00.000.000/0001-99');

-- Pegar id do estaleiro (novo ou existente)
SET @estaleiro_id = (SELECT id_estaleiro FROM estaleiros WHERE cnpj = '00.000.000/0001-99' LIMIT 1);

-- Inserir cliente de teste (se ainda não existir)
INSERT INTO clientes (nome, cpf_cnpj, cep, logradouro, numero, bairro, cidade, estado)
SELECT 'João Teste', '000.000.000-00', '02000-000', 'Av. Cliente', '45', 'Centro', 'Cidade Cliente', 'SP'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM clientes WHERE cpf_cnpj = '000.000.000-00');

-- Pegar id do cliente
SET @cliente_id = (SELECT id_cliente FROM clientes WHERE cpf_cnpj = '000.000.000-00' LIMIT 1);

-- Inserir embarcação de teste vinculada ao estaleiro
INSERT INTO embarcacoes (estaleiro_id, nome, comprimento_total, boca_moldada, pontal_moldado, calado_maximo, calado_leve, arqueacao_bruta, arqueacao_liquida, tpb, contorno, lastro, area_navegacao_tipo_servico, tipo_embarcacao, material_casco, motorizacao_max, motorizacao_min, num_tripulantes, num_passageiros, num_inscricao)
SELECT @estaleiro_id, 'Barco Teste', 12.50, 3.40, 2.10, 1.20, 0.90, 10.00, 8.00, 5.00, 4.00, NULL, 'Costeira', 'Veleiro', 'Fibra', 200, NULL, 4, 6, NULL
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM embarcacoes WHERE nome = 'Barco Teste' AND estaleiro_id = @estaleiro_id);

-- Pegar id da embarcação
SET @embarcacao_id = (SELECT id_embarcacao FROM embarcacoes WHERE nome = 'Barco Teste' AND estaleiro_id = @estaleiro_id LIMIT 1);

-- Inserir documento de teste ligado à embarcação e cliente
INSERT INTO documentos (embarcacao_id, cliente_id)
SELECT @embarcacao_id, @cliente_id
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM documentos WHERE embarcacao_id = @embarcacao_id AND cliente_id = @cliente_id LIMIT 1);

-- Pegar id do documento inserido/recente
SET @documento_id = (SELECT id_documento FROM documentos WHERE embarcacao_id = @embarcacao_id AND cliente_id = @cliente_id ORDER BY criado_em DESC LIMIT 1);

-- Opcional: inserir um registro em pdf_documentos (vazio) -- comentar se não quiser
-- INSERT INTO pdf_documentos (documento_id, pdf, assinado) VALUES (@documento_id, NULL, NULL);

-- Fim do script de dados de teste
