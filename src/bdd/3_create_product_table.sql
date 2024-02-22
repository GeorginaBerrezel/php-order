CREATE TABLE product
(
    id          INTEGER      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100) NOT NULL,
    description TEXT,
    price       FLOAT,
    img         VARCHAR(255) NOT NULL
);