# CRUD v1



---



## 1. Software utilizados

- XAMPP 8.2.12 (PHP 8.2.12) para Windows  - [Download XAMPP](https://www.apachefriends.org/index.html)
- IDE Visual Studio Code 1.85.1 para Windows - [Download Visual Studio Code](https://code.visualstudio.com/Download)



---



## 2. Descrição do Software



O software oferece a gestao de "produtos", com as seguintes funcionalidades: **CADASTRAR**, **RELATORIO**, **ATUALIZAR** e **EXCLUIR** que podem ser acessadas no **menu** presente em todas  as paginas, para faciltar a navegação do usuario.



- **CADASTRAR**:

  Permite **cadastrar** de novos produtos no sistema, incluindo: **nome**, **descrição**, **categoria**, **preço** e **quantidade**.

  

- **RELATORIO:**

  Permite **Listar** a quantidade de produtos em estoque, mostrando todas as informações que compem um produto: **nome**, **descrição**, **categoria**, **preço** e **quantidade**.

  

- **ATUALIZAR:**

  Permite **Atualizar** as informações de um produto especifico, informando o **Código** do Produto, e depois editando as ontras informações como: **nome**, **descrição**, **categoria**, **preço** e **quantidade**.

  

- **EXCLUIR:**

  Permite **Excluir** um produto em estoque, informando o **Código** do produto para que sja escluido.



---



## 3. Banco de Dados



`db_produto.sql`

````sql
CREATE DATABASE db_produto;

USE db_produto;

CREATE TABLE tb_produto (
    cd_produto   INT PRIMARY KEY AUTO_INCREMENT,
    nm_produto   VARCHAR(255),
    ds_produto   VARCHAR(255),
    nm_categoria VARCHAR(255),
    vl_produto   NUMERIC(10,2),
    qt_produto   INT
    );
````



---

