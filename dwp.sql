CREATE TABLE `accounts` ( 
    `ID` INT AUTO_INCREMENT NOT NULL PRIMARY KEY, 
    `username` VARCHAR(80) NOT NULL, 
    `pass` VARCHAR(80) NOT NULL, 
    `Fname` VARCHAR(80) NULL, 
    `Lname` VARCHAR(80) NULL, 
    `email` VARCHAR(80) NOT NULL,  
    `description` TEXT NULL);