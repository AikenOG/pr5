CREATE DATABASE login;

USE login;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('1337', '1337');
CREATE USER '1337'@'localhost' IDENTIFIED WITH mysql_native_password BY '1337';

GRANT ALL PRIVILEGES ON login.* TO '1337'@'localhost';

FLUSH PRIVILEGES;

