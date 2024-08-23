CREATE SCHEMA IF NOT EXISTS `pdo` DEFAULT CHARACTER SET utf8 ;

USE `pdo` ;

CREATE TABLE produtos(
    id int(11) NOT NULL AUTO_INCREMENT,
    descricao varchar(50) DEFAULT NULL,
    preco decimal(10,2) DEFAULT NULL,
    PRIMARY KEY (id)
)