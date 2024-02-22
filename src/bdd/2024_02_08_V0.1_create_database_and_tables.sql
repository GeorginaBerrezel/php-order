CREATE
    DATABASE IF NOT EXISTS order_php_exam;

USE
    order_php_exam;

DROP TABLE orders;
DROP TABLE product;
DROP TABLE user;

CREATE TABLE user
(
    id       INTEGER      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email    VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE product
(
    id          INTEGER      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100) NOT NULL,
    description TEXT,
    price       FLOAT,
    img         VARCHAR(255) NOT NULL
);

CREATE TABLE orders
(
    id         INTEGER   NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id    INT       NOT NULL,
    product_id INT       NOT NULL,
    quantity   INT       NOT NULL,
    order_date TIMESTAMP NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user (id),
    FOREIGN KEY (product_id) REFERENCES product (id)
);