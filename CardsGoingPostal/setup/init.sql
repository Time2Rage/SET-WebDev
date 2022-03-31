/*
Setup for the SQL Database
*/
-- Creating DB
CREATE DATABASE CGP;
-- Hook the DB
USE CGP;
/*
Create the tables in concurrent order.
*/
-- USER
CREATE TABLE user(
    email VARCHAR(45) NOT NULL,
    password VARCHAR(20) NOT NULL,
    PRIMARY KEY(email)
);
-- CUSTOMER
CREATE TABLE customer(
    custID INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(45),
    -- not including ctcID because no link needed
    PRIMARY KEY(custID),
    FOREIGN KEY(email) REFERENCES user(email)
);
-- PRINTER
CREATE TABLE printer(
    empNr INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(45),
    PRIMARY KEY(empNr),
    FOREIGN KEY(email) REFERENCES user(email)
);
-- CONTACT
CREATE TABLE contact(
    ctcID INT NOT NULL AUTO_INCREMENT,
    custID INT NOT NULL,
    fName VARCHAR(45),
    sName VARCHAR(45),
    addLine1 VARCHAR(80),
    addLine2 VARCHAR(80),
    zip VARCHAR(8),
    country VARCHAR(4),
    PRIMARY KEY(ctcID),
    FOREIGN KEY(custID) REFERENCES customer(custID)
);
-- PAYMENT METHOD
CREATE TABLE payment(
    custID INT NOT NULL,
    ccNr INT NOT NULL,
    fName VARCHAR(45),
    sName VARCHAR(45),
    expDate DATE,
    secNr int,
    CONSTRAINT PK_payMeth PRIMARY KEY(custID,ccNr),
    FOREIGN KEY(custID) REFERENCES customer(custID)
);
-- TEMPLATE
CREATE TABLE template(
    tmpID INT NOT NULL AUTO_INCREMENT,
    tmpType VARCHAR(3) NOT NULL,
    filePath VARCHAR(60) NOT NULL,
    price INT NOT NULL,
    PRIMARY KEY(tmpID)
);
-- CARDS
CREATE TABLE cards(
    cardID INT NOT NULL AUTO_INCREMENT,
    custID INT,
    title VARCHAR(20),
    filePath VARCHAR(60),
    thbPath VARCHAR(60),
    price INT,
    PRIMARY KEY(cardID),
    FOREIGN KEY(custID) REFERENCES customer(custID)
);
-- ORDER
CREATE TABLE orders(
    ordNr INT NOT NULL AUTO_INCREMENT,
    custID INT NOT NULL,
    empNr INT,
    ordTotal INT,
    PRIMARY KEY(ordNr),
    FOREIGN KEY(custID) REFERENCES customer(custID),
    FOREIGN KEY(empNr) REFERENCES printer(empNr)
);
/*
CREATING HELPER TABLES
*/
-- ORDER_DETAILS
CREATE TABLE order_detail(
    ordNr INT NOT NULL,
    ctcID INT NOT NULL,
    cardID INT NOT NULL,
    amount INT,
    CONSTRAINT PK_orderDet PRIMARY KEY(ordNr,ctcID,cardID),
    FOREIGN KEY(ordNr) REFERENCES orders(ordNr),
    FOREIGN KEY(ctcID) REFERENCES contact(ctcID),
    FOREIGN KEY(cardID) REFERENCES cards(cardID)
);


