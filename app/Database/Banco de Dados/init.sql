-- Criação do Banco de Dados
CREATE DATABASE IF NOT EXISTS pi_db;
USE pi_db;

-- Tabela Usuário
CREATE TABLE IF NOT EXISTS Usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabela Conta
CREATE TABLE IF NOT EXISTS Conta (
    id_conta INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    saldo_inicial DECIMAL(10, 2) NOT NULL,
    saldo_atual DECIMAL(10, 2) NOT NULL,
    tipo_conta VARCHAR(50) NOT NULL,
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);

-- Tabela Categoria
CREATE TABLE IF NOT EXISTS Categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    tipo ENUM('Despesa', 'Receita') NOT NULL
);

-- Tabela Despesa
CREATE TABLE IF NOT EXISTS Despesa (
    id_despesa INT AUTO_INCREMENT PRIMARY KEY,
    id_conta INT NOT NULL,
    id_categoria INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data DATETIME NOT NULL,
    descricao VARCHAR(255),
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_conta) REFERENCES Conta(id_conta),
    FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

-- Tabela Receita
CREATE TABLE IF NOT EXISTS Receita (
    id_receita INT AUTO_INCREMENT PRIMARY KEY,
    id_conta INT NOT NULL,
    id_categoria INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data DATETIME NOT NULL,
    descricao VARCHAR(255),
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_conta) REFERENCES Conta(id_conta),
    FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

-- Tabela Orçamento
CREATE TABLE IF NOT EXISTS Orcamento (
    id_orcamento INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_categoria INT NOT NULL,
    valor_planejado DECIMAL(10, 2) NOT NULL,
    data_inicio DATETIME NOT NULL,
    data_fim DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
    FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

-- Tabela Meta Financeira
CREATE TABLE IF NOT EXISTS MetaFinanceira (
    id_meta INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    descricao VARCHAR(255),
    valor_alvo DECIMAL(10, 2) NOT NULL,
    data_meta DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);

-- Tabela Relatório
CREATE TABLE IF NOT EXISTS Relatorio (
    id_relatorio INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    tipo_relatorio ENUM('Despesas', 'Receitas', 'Orçamento', 'Geral') NOT NULL,
    data_inicio DATETIME NOT NULL,
    data_fim DATETIME NOT NULL,
    conteudo TEXT,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);

-- Tabela Configurações do Usuário
CREATE TABLE IF NOT EXISTS ConfiguracoesUsuario (
    id_configuracao INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    preferencias JSON,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);

-- Tabela Exportação de Dados
CREATE TABLE IF NOT EXISTS ExportacaoDados (
    id_exportacao INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    formato ENUM('CSV', 'PDF') NOT NULL,
    data_exportacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    conteudo TEXT,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
);

-- Inserir 10 usuários na tabela Usuario
INSERT INTO Usuario (nome, email, senha) VALUES
('João Silva', 'joao.silva@email.com', 'senha123'),
('Maria Souza', 'maria.souza@email.com', 'senha456'),
('Carlos Oliveira', 'carlos.oliveira@email.com', 'senha789'),
('Ana Paula', 'ana.paula@email.com', 'senha101'),
('Pedro Santos', 'pedro.santos@email.com', 'senha202'),
('Julia Lima', 'julia.lima@email.com', 'senha303'),
('Lucas Costa', 'lucas.costa@email.com', 'senha404'),
('Fernanda Alves', 'fernanda.alves@email.com', 'senha505'),
('Ricardo Pereira', 'ricardo.pereira@email.com', 'senha606'),
('Sofia Ribeiro', 'sofia.ribeiro@email.com', 'senha707');

-- Inserir 10 contas associadas aos usuários
INSERT INTO Conta (id_usuario, saldo_inicial, saldo_atual, tipo_conta) VALUES
(1, 5000.00, 4500.00, 'Corrente'),
(2, 3000.00, 2800.00, 'Poupança'),
(3, 7000.00, 6200.00, 'Corrente'),
(4, 2500.00, 2400.00, 'Poupança'),
(5, 4500.00, 4300.00, 'Corrente'),
(6, 1200.00, 1100.00, 'Poupança'),
(7, 3500.00, 3400.00, 'Corrente'),
(8, 2900.00, 2700.00, 'Poupança'),
(9, 6000.00, 5800.00, 'Corrente'),
(10, 4000.00, 3800.00, 'Poupança');

-- Inserir 10 categorias (despesas e receitas)
INSERT INTO Categoria (nome, tipo) VALUES
('Alimentação', 'Despesa'),
('Transporte', 'Despesa'),
('Educação', 'Despesa'),
('Lazer', 'Despesa'),
('Saúde', 'Despesa'),
('Salário', 'Receita'),
('Freelance', 'Receita'),
('Investimentos', 'Receita'),
('Reembolso', 'Receita'),
('Aluguel', 'Receita');

-- Inserir 10 despesas associadas às contas e categorias
INSERT INTO Despesa (id_conta, id_categoria, valor, data, descricao) VALUES
(1, 1, 250.00, '2024-10-01', 'Supermercado'),
(2, 2, 100.00, '2024-10-02', 'Combustível'),
(3, 3, 500.00, '2024-10-03', 'Material Escolar'),
(4, 4, 200.00, '2024-10-04', 'Cinema'),
(5, 5, 150.00, '2024-10-05', 'Consulta Médica'),
(6, 1, 300.00, '2024-10-06', 'Restaurante'),
(7, 2, 80.00, '2024-10-07', 'Táxi'),
(8, 3, 450.00, '2024-10-08', 'Curso Online'),
(9, 4, 120.00, '2024-10-09', 'Show de Música'),
(10, 5, 100.00, '2024-10-10', 'Farmácia');

-- Inserir 10 receitas associadas às contas e categorias
INSERT INTO Receita (id_conta, id_categoria, valor, data, descricao) VALUES
(1, 6, 5000.00, '2024-10-01', 'Salário Mensal'),
(2, 7, 1500.00, '2024-10-02', 'Projeto Freelance'),
(3, 8, 200.00, '2024-10-03', 'Rendimentos de Investimento'),
(4, 9, 100.00, '2024-10-04', 'Reembolso de Viagem'),
(5, 10, 400.00, '2024-10-05', 'Aluguel de Imóvel'),
(6, 6, 4500.00, '2024-10-06', 'Salário Mensal'),
(7, 7, 1300.00, '2024-10-07', 'Trabalho Freelance'),
(8, 8, 220.00, '2024-10-08', 'Investimento'),
(9, 9, 90.00, '2024-10-09', 'Reembolso Empresarial'),
(10, 10, 600.00, '2024-10-10', 'Aluguel de Apartamento');

-- Inserir 10 orçamentos
INSERT INTO Orcamento (id_usuario, id_categoria, valor_planejado, data_inicio, data_fim) VALUES
(1, 1, 2000.00, '2024-10-01', '2024-12-31'),
(2, 2, 1000.00, '2024-10-01', '2024-12-31'),
(3, 3, 1500.00, '2024-10-01', '2024-12-31'),
(4, 4, 500.00, '2024-10-01', '2024-12-31'),
(5, 5, 1200.00, '2024-10-01', '2024-12-31'),
(6, 1, 2500.00, '2024-10-01', '2024-12-31'),
(7, 2, 800.00, '2024-10-01', '2024-12-31'),
(8, 3, 1300.00, '2024-10-01', '2024-12-31'),
(9, 4, 700.00, '2024-10-01', '2024-12-31'),
(10, 5, 1000.00, '2024-10-01', '2024-12-31');

-- Inserir 10 metas financeiras
INSERT INTO MetaFinanceira (id_usuario, descricao, valor_alvo, data_meta) VALUES
(1, 'Comprar um carro', 40000.00, '2025-12-31'),
(2, 'Fazer uma viagem', 10000.00, '2025-06-30'),
(3, 'Economizar para aposentadoria', 100000.00, '2030-12-31'),
(4, 'Comprar uma casa', 200000.00, '2027-12-31'),
(5, 'Criar um fundo de emergência', 50000.00, '2025-12-31'),
(6, 'Fazer um intercâmbio', 15000.00, '2024-12-31'),
(7, 'Investir em ações', 20000.00, '2025-12-31'),
(8, 'Pagar dívida do cartão', 5000.00, '2024-11-30'),
(9, 'Montar um negócio', 30000.00, '2026-12-31'),
(10, 'Casamento', 20000.00, '2025-12-31');

-- Inserir 10 relatórios financeiros
INSERT INTO Relatorio (id_usuario, tipo_relatorio, data_inicio, data_fim, conteudo) VALUES
(1, 'Despesas', '2024-10-01', '2024-10-31', 'Relatório de despesas do mês de outubro.'),
(2, 'Receitas', '2024-10-01', '2024-10-31', 'Relatório de receitas do mês de outubro.'),
(3, 'Orçamento', '2024-10-01', '2024-12-31', 'Relatório de orçamento trimestral.'),
(4, 'Geral', '2024-10-01', '2024-10-31', 'Relatório geral de finanças do mês.'),
(5, 'Despesas', '2024-09-01', '2024-09-30', 'Relatório de despesas do mês de setembro.'),
(6, 'Receitas', '2024-09-01', '2024-09-30', 'Relatório de receitas do mês de setembro.'),
(7, 'Orçamento', '2024-07-01', '2024-09-30', 'Relatório de orçamento trimestral.'),
(8, 'Geral', '2024-09-01', '2024-09-30', 'Relatório geral de finanças do mês.'),
(9, 'Despesas', '2024-08-01', '2024-08-31', 'Relatório de despesas do mês de agosto.'),
(10, 'Receitas', '2024-08-01', '2024-08-31', 'Relatório de receitas do mês de agosto.');

-- Inserir 10 configurações para os usuários
INSERT INTO ConfiguracoesUsuario (id_usuario, preferencias) VALUES
(1, '{"tema":"claro", "notificacoes": true}'),
(2, '{"tema":"escuro", "notificacoes": false}'),
(3, '{"tema":"claro", "notificacoes": true}'),
(4, '{"tema":"escuro", "notificacoes": true}'),
(5, '{"tema":"claro", "notificacoes": false}'),
(6, '{"tema":"escuro", "notificacoes": true}'),
(7, '{"tema":"claro", "notificacoes": true}'),
(8, '{"tema":"escuro", "notificacoes": false}'),
(9, '{"tema":"claro", "notificacoes": true}'),
(10, '{"tema":"escuro", "notificacoes": true}');

-- Inserir 10 exportações de dados
INSERT INTO ExportacaoDados (id_usuario, formato, conteudo) VALUES
(1, 'CSV', 'Conteúdo da exportação em CSV para usuário 1'),
(2, 'PDF', 'Conteúdo da exportação em PDF para usuário 2'),
(3, 'CSV', 'Conteúdo da exportação em CSV para usuário 3'),
(4, 'PDF', 'Conteúdo da exportação em PDF para usuário 4'),
(5, 'CSV', 'Conteúdo da exportação em CSV para usuário 5'),
(6, 'PDF', 'Conteúdo da exportação em PDF para usuário 6'),
(7, 'CSV', 'Conteúdo da exportação em CSV para usuário 7'),
(8, 'PDF', 'Conteúdo da exportação em PDF para usuário 8'),
(9, 'CSV', 'Conteúdo da exportação em CSV para usuário 9'),
(10, 'PDF', 'Conteúdo da exportação em PDF para usuário 10');