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