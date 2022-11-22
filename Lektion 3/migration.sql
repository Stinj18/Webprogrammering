CREATE DATABASE migration;

USE migration

CREATE TABLE users (
    user_id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR (127),
    password VARCHAR (127) 
);

CREATE TABLE images (
    image_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(127),
    image LONGBLOB NOT NULL,
    imgdescription VARCHAR(127)
);
