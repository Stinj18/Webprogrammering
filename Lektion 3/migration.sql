CREATE DATABASE migration;

USE migration

CREATE TABLE users (
    user_id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR (127),
    password VARCHAR (127) 
);

