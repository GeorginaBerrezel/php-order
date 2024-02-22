DELETE FROM user;
ALTER TABLE user AUTO_INCREMENT = 1;

INSERT INTO user (email, password)
VALUES
    ("georgina.berrezel@gmail.com", "$2y$10$KyyGSBQPiTQ9ugHQ/HUeauRBTYdDq4n9e0KnEDZ.ZGT4TnUGeVVRC");


INSERT INTO product (name, description, price, img)
VALUES
    ("skateboard", "test test2", 100, "skate.jpg"),
    ("bmx", "testbmx testbmx2", 300, "bmx.jpg"),
    ("roller", "testroller testroller2", 150, "roller.jpg");

INSERT INTO orders (user_id, product_id, quantity, order_date)
VALUES
    (1, 1, 100, '2022-07-23 13:10:11'),
    (1, 2, 10, '2022-07-24 13:10:11');
