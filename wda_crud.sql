CREATE TABLE customers
(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    cpf_cnpj varchar(11) NOT NULL,
    birthdate datetime NOT NULL,
    address varchar(255) NOT NULL,
    hood varchar(255) NOT NULL,
    zip_code varchar(8) NOT NULL,
    city varchar(255) NOT NULL,
    phone varchar(10) DEFAULT NULL,
    mobile varchar(11) NOT NULL,
    state varchar(2) NOT NULL,
    ie varchar(11) NOT NULL,
    created datetime NOT NULL,
    modified datetime NOT NULL
);

CREATE TABLE gerentes
(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL,
    datanasc datetime NOT NULL,
    endereco varchar(255) NOT NULL,
    depto varchar(255) NOT NULL,
    created datetime NOT NULL,
    modified datetime NOT NULL,
    foto varchar(100) DEFAULT NULL

);

CREATE TABLE usuarios
(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL,
    user varchar(100) NOT NULL,
    password varchar(30) NOT NULL,
    foto varchar(100) DEFAULT NULL
);