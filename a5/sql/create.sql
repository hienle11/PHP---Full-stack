DROP DATABASE IF EXISTS assignment5;

CREATE DATABASE assignment5;
 
USE assignment5;

CREATE TABLE Users (
    user_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL,
    user_password VARCHAR(300) NOT NULL, 
    user_email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Admins (
	admin_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INTEGER NOT NULL UNIQUE,
    CONSTRAINT FK_Admins_Users FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Categories (
	category_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    category_name VARCHAR(300) NOT NULL UNIQUE
);

CREATE TABLE Products (
	product_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(300) NOT NULL,
    price REAL NOT NULL,
    quantity INTEGER NOT NULL,
    descript TEXT NOT NULL,
    image_uri VARCHAR(300) NOT NULL,
    category_id INTEGER NOT NULL,
    CONSTRAINT CHK_Products_Price CHECK (price >= 0),
    CONSTRAINT CHK_Products_Quantity CHECK (quantity >= 0),
    CONSTRAINT FK_Products_Categories FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);
