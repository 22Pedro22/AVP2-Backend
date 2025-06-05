-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS transacoes_db;

-- Usar o banco de dados
USE transacoes_db;

-- Criar tabela de transações
CREATE TABLE IF NOT EXISTS transacoes (
    id VARCHAR(36) PRIMARY KEY,
    valor DECIMAL(15,2) NOT NULL CHECK (valor >= 0),
    dataHora DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar índice para otimizar consultas por data/hora
CREATE INDEX idx_dataHora ON transacoes(dataHora);
