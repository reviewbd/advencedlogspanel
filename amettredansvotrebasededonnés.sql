CREATE DATABASE fivem_logs;
USE fivem_logs;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('admin', MD5('admin'));

CREATE TABLE logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_type VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  event_date DATETIME DEFAULT CURRENT_TIMESTAMP
);
