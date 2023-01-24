CREATE DATABASE medapp;
USE medapp;
CREATE USER medapp@localhost IDENTIFIED BY 'parola';
GRANT ALL PRIVILEGES ON `medapp`.* TO 'medapp'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;