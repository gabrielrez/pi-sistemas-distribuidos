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