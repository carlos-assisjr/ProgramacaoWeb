use aluguetoo;
DROP TABLE users;

-- ==============================
-- TABELA: categorias
-- ==============================
CREATE TABLE categorias (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- ==============================
-- TABELA: users
-- ==============================
CREATE TABLE clientes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- ==============================
-- TABELA: lojas
-- ==============================
CREATE TABLE lojas (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    cep VARCHAR(20) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- ==============================
-- TABELA: ferramentas
-- ==============================
CREATE TABLE ferramentas (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    marca VARCHAR(255) NOT NULL,
    numero_serie VARCHAR(50) UNIQUE,
    descricao TEXT NULL,
    categoria_id BIGINT UNSIGNED NOT NULL,
    loja_id BIGINT UNSIGNED NOT NULL,
    valor_diaria DECIMAL(10,2) NOT NULL,
    status ENUM('DISPONIVEL', 'INDISPONIVEL', 'MANUTENCAO') NOT NULL DEFAULT 'DISPONIVEL',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,

    CONSTRAINT fk_ferramentas_categoria
        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
	CONSTRAINT fk_ferramentas_loja
		FOREIGN KEY (loja_id) REFERENCES lojas(id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- ==============================
-- TABELA: alugueis
-- ==============================
CREATE TABLE alugueis (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cliente_id BIGINT UNSIGNED NOT NULL,
    status ENUM('RESERVADO', 'RETIRADO', 'DEVOLVIDO', 'ATRASADO') NOT NULL DEFAULT 'RESERVADO',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,

    CONSTRAINT fk_alugueis_clientes
        FOREIGN KEY (cliente_id) REFERENCES clientes(id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- ==============================
-- TABELA: itens_aluguel
-- ==============================
CREATE TABLE itens_aluguel (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    aluguel_id BIGINT UNSIGNED NOT NULL,
    ferramenta_id BIGINT UNSIGNED NOT NULL,
    loja_retirada_id BIGINT UNSIGNED NOT NULL,
    loja_devolucao_id BIGINT UNSIGNED,
    data_inicio DATETIME NOT NULL,
    data_devolucao DATETIME NULL,
	data_fim_prevista DATETIME NULL,
    valor_diaria_contratada DECIMAL(10,2),
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,

    CONSTRAINT fk_itens_aluguel_aluguel
        FOREIGN KEY (aluguel_id) REFERENCES alugueis(id)
        ON UPDATE NO ACTION
        ON DELETE CASCADE,

    CONSTRAINT fk_itens_aluguel_ferramenta
        FOREIGN KEY (ferramenta_id) REFERENCES ferramentas(id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,

    CONSTRAINT fk_itens_aluguel_loja_retirada
        FOREIGN KEY (loja_retirada_id) REFERENCES lojas(id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,

    CONSTRAINT fk_itens_aluguel_loja_devolucao
        FOREIGN KEY (loja_devolucao_id) REFERENCES lojas(id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);