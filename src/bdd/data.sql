DELETE FROM user;
ALTER TABLE user AUTO_INCREMENT = 1;

INSERT INTO user (email, password)
VALUES
    ("georgina.berrezel@gmail.com", "test"),
    ("olivia@gmail.com", "toto"),
    ("Louisa@gmail.com", "tatat")
