create database mvcProduto;
use mvcProduto;

CREATE TABLE Produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) null,
    quantidade double null,
    valor double null,
    created_at timestamp null,
    updated_at timestamp null
);

select * from Produtos;
select * from Setores;
select * from DetalheProdutos;


CREATE TABLE Setores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255) NULL,
    num_setor int NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE DetalheProdutos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao varchar(255) NULL,
    tamanho double NULL,
    peso double null,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

ALTER TABLE Produtos
ADD COLUMN setor_id INT NULL,
ADD CONSTRAINT fk_produto_setor
FOREIGN KEY (setor_id)
REFERENCES Setores(id)
ON DELETE SET NULL;

ALTER TABLE DetalheProdutos
ADD COLUMN produto_id INT NULL,
ADD CONSTRAINT fk_produto_detalhe
FOREIGN KEY (produto_id)
REFERENCES Produtos(id)
ON DELETE SET NULL;

