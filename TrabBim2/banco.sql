CREATE TABLE carro(
    placa VARCHAR(7) PRIMARY KEY,
    modelo VARCHAR(50) NOT NULL,
    cor VARCHAR(30) NOT NULL,
    ano INTEGER NOT NULL,
    valor DOUBLE NOT NULL
);

CREATE TABLE fabricante(
    documento VARCHAR(15) PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    endereco VARCHAR(50) NOT NULL
);


CREATE TABLE usuario(
    documento VARCHAR(15) PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    endereco VARCHAR(50) NOT NULL
);