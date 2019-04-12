CREATE DATABASE coding_challenge character set UTF8;

USE coding_challenge;

CREATE TABLE survey (
    id BIGINT(20) UNSIGNED NOT NULL auto_increment,
    name VARCHAR(255) NOT NULL,
    birth_date DATE DEFAULT NULL,
    email VARCHAR(255) NOT NULL,
    favorite_color VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET 'utf8';