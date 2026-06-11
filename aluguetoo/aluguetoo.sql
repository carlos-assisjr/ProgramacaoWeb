USE aluguetoo;

DROP TABLE IF EXISTS users;
-- ==============================
-- TABELA: users
-- ==============================
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NULL UNIQUE,
    telefone VARCHAR(20) NULL,
    endereco VARCHAR(255) NULL,
    role ENUM('ADM', 'CLI') NOT NULL DEFAULT 'CLI',
    email_verified_at TIMESTAMP NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ==============================
-- TABELA: categorias
-- ==============================
CREATE TABLE categorias (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
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
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ==============================
-- TABELA: equipamentos
-- ==============================
CREATE TABLE equipamentos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    marca VARCHAR(255) NULL,
    numero_serie VARCHAR(50) NULL UNIQUE,
    descricao TEXT NULL,
    categoria_id BIGINT UNSIGNED NOT NULL,
    loja_id BIGINT UNSIGNED NOT NULL,
    valor_diaria DECIMAL(10,2) NOT NULL,
    foto VARCHAR(255) NULL,

    status ENUM('DISPONIVEL', 'INDISPONIVEL', 'MANUTENCAO') 
        NOT NULL DEFAULT 'DISPONIVEL',

    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    CONSTRAINT fk_equipamentos_categoria
        FOREIGN KEY (categoria_id) REFERENCES categorias(id),

    CONSTRAINT fk_equipamentos_loja
        FOREIGN KEY (loja_id) REFERENCES lojas(id)
);

-- ==============================
-- TABELA: alugueis
-- ==============================
CREATE TABLE alugueis (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    user_id BIGINT UNSIGNED NOT NULL,

    status ENUM('RESERVADO', 'RETIRADO', 'DEVOLVIDO', 'ATRASADO') 
        NOT NULL DEFAULT 'RESERVADO',

    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    CONSTRAINT fk_alugueis_users
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
);

-- ==============================
-- TABELA: itens_aluguel
-- ==============================
CREATE TABLE itens_aluguel (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    aluguel_id BIGINT UNSIGNED NOT NULL,
    equipamento_id BIGINT UNSIGNED NOT NULL,
    loja_retirada_id BIGINT UNSIGNED NOT NULL,
    loja_devolucao_id BIGINT UNSIGNED NULL,

    data_inicio DATETIME NOT NULL,
    data_fim_prevista DATETIME NULL,
    data_devolucao DATETIME NULL,

    valor_diaria_contratada DECIMAL(10,2) NOT NULL,

    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    CONSTRAINT fk_itens_aluguel_aluguel
        FOREIGN KEY (aluguel_id) REFERENCES alugueis(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_itens_aluguel_equipamento
        FOREIGN KEY (equipamento_id) REFERENCES equipamentos(id),

    CONSTRAINT fk_itens_aluguel_loja_retirada
        FOREIGN KEY (loja_retirada_id) REFERENCES lojas(id),

    CONSTRAINT fk_itens_aluguel_loja_devolucao
        FOREIGN KEY (loja_devolucao_id) REFERENCES lojas(id)
);
-- ==============================
-- CATEGORIAS
-- ==============================
INSERT INTO categorias (nome, descricao, created_at, updated_at) VALUES
('Ferramentas Elétricas', 'Equipamentos elétricos para obras e reformas', NOW(), NOW()),
('Jardinagem', 'Equipamentos para manutenção de jardins', NOW(), NOW()),
('Construção', 'Equipamentos usados em construção civil', NOW(), NOW()),
('Limpeza', 'Equipamentos para limpeza pesada', NOW(), NOW());

-- ==============================
-- LOJAS
-- ==============================
INSERT INTO lojas (nome, endereco, cidade, estado, cep, created_at, updated_at) VALUES
('AlugueToo Centro', 'Rua Principal, 100', 'Presidente Prudente', 'SP', '19000-000', NOW(), NOW()),
('AlugueToo Zona Norte', 'Avenida Brasil, 500', 'Presidente Prudente', 'SP', '19010-000', NOW(), NOW());

-- ==============================
-- EQUIPAMENTOS
-- ==============================
INSERT INTO equipamentos 
(nome, marca, numero_serie, descricao, categoria_id, loja_id, valor_diaria, foto, status, created_at, updated_at)
VALUES
(
    'Furadeira de Impacto',
    'Bosch',
    'FD-001',
    'Furadeira de impacto ideal para paredes, madeira e metal.',
    1,
    1,
    35.00,
    NULL,
    'DISPONIVEL',
    NOW(),
    NOW()
),
(
    'Parafusadeira Elétrica',
    'Makita',
    'PF-002',
    'Parafusadeira prática para montagem de móveis e serviços rápidos.',
    1,
    1,
    30.00,
    NULL,
    'DISPONIVEL',
    NOW(),
    NOW()
),
(
    'Serra Mármore',
    'DeWalt',
    'SM-003',
    'Serra mármore para cortes em pisos, azulejos e pedras.',
    1,
    2,
    45.00,
    NULL,
    'DISPONIVEL',
    NOW(),
    NOW()
),
(
    'Roçadeira',
    'Stihl',
    'RC-004',
    'Roçadeira para limpeza de terrenos, gramas e matos altos.',
    2,
    2,
    60.00,
    NULL,
    'DISPONIVEL',
    NOW(),
    NOW()
),
(
    'Cortador de Grama',
    'Tramontina',
    'CG-005',
    'Cortador de grama elétrico para jardins residenciais.',
    2,
    1,
    50.00,
    NULL,
    'DISPONIVEL',
    NOW(),
    NOW()
),
(
    'Betoneira',
    'Menegotti',
    'BT-006',
    'Betoneira para preparo de concreto e argamassa.',
    3,
    1,
    90.00,
    NULL,
    'DISPONIVEL',
    NOW(),
    NOW()
),
(
    'Martelete Rompedor',
    'Bosch',
    'MR-007',
    'Martelete usado para quebrar concreto, paredes e pisos.',
    3,
    2,
    85.00,
    NULL,
    'DISPONIVEL',
    NOW(),
    NOW()
),
(
    'Lavadora de Alta Pressão',
    'WAP',
    'LP-008',
    'Lavadora de alta pressão para limpeza de pisos, calçadas e veículos.',
    4,
    1,
    55.00,
    NULL,
    'DISPONIVEL',
    NOW(),
    NOW()
);