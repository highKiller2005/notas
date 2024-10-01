DROP DATABASE IF EXISTS `thiago_kaua`;
CREATE DATABASE `thiago_kaua`;
USE `thiago_kaua`;

CREATE TABLE `notas` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `titulo` VARCHAR(100) NOT NULL,
    `conteudo` TEXT,
    `categoria` VARCHAR(100) NOT NULL,
    `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `user` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) UNIQUE NOT NULL,
    `senha` VARCHAR(255) NOT NULL
);

-- add relationship
ALTER TABLE `notas` ADD COLUMN `user_id` INT;
