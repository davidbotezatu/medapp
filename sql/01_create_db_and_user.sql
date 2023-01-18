CREATE DATABASE medapp;
CREATE USER medapp@localhost IDENTIFIED BY 'parola';
USE medapp;
GRANT ALL ON medapp TO 'medapp'@'localhost';
FLUSH PRIVILEGES;