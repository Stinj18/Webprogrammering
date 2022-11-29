-- The migrations file exists so that everyone can run the script and get the same database
-- on their local machine.

DROP DATABASE IF EXISTS migration;
CREATE DATABASE migration;
USE migration;

CREATE TABLE users (
    user_id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR (127) /* UNIQUE NOT NULL - Vil gøre så der kun kan findes en bruger med det brugernavn, og der skal være et tegn*/, 
    password VARCHAR (127) 
);

CRATE TABLE images (
    image_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(127),
    image LONGBLOB NOT NULL,
    imgdescription VARCHAR(127)
);