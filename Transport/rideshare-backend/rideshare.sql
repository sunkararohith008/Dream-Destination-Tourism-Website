DROP DATABASE IF EXISTS dbs1109581;
CREATE DATABASE dbs1109581;
USE dbs1109581;  -- MySQL command

-- create the tables
CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE products (
  productID        INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID       INT(11)        NOT NULL,
  name     			VARCHAR(25)   NOT NULL,
  pickUp     			VARCHAR(25)   NOT NULL,
  dropOff     			VARCHAR(25)   NOT NULL,
  phone    VARCHAR(10)  NOT NULL,
  PRIMARY KEY (productID)
);

CREATE TABLE administrators (
  adminID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(60),
  lastName          VARCHAR(60),
  PRIMARY KEY (adminID)
);

CREATE TABLE orders (
  orderID        INT(11)        NOT NULL   AUTO_INCREMENT,
  customerID     INT            NOT NULL,
  orderDate      DATETIME       NOT NULL,
  PRIMARY KEY (orderID)
);

-- insert data into the database
INSERT INTO categories VALUES
(1, 'Barrie'),
(2, 'Toronto'),
(3, 'Kingston'),
(4, 'Ottawa'),
(5, 'Vancouver'),
(6, 'Newfoundland'),
(7, 'Whistler'),
(8, 'Halifax'),
(9, 'Montreal'),
(10, 'Victoria'),
(11, 'Toronto'),
(12, 'Calgary');

INSERT INTO products VALUES
(1, 1, 'Manveer', 'Toronto', '20th Dec, 10.00 AM', '2492887639'),
(2, 1, 'Panchal', 'F & P', 'Everyday', '2492887639'),
(3, 1, 'MPanchal', 'Mississauga', '15th Dec', '2492887639'),
(4, 2, 'Manveer', 'Barrie', '6.00PM', '2492887639'),
(5, 3, 'Panchal', 'Barrie', '25th December, 10.00AM', '2492887639'),
(6, 4, 'MPanchal', 'Barrie', '14th Dec, 4.00PM', '2492887639'),
(7, 5, 'Manveer', 'Barrie', '19th Dec, 1.00 PM', '2492887639'),
(8, 6, 'Panchal', 'Barrie', '21 Dec, 3.00PM', '2492887639'),
(9, 7, 'Manveer', 'Barrie', '23rd Dec, 7.00 PM', '2492887639'),
(10, 8, 'Panchal', 'Barrie', '24th Dec, 6.00 AM', '2492887639'),
(11, 9, 'MPanchal', 'Barrie', '26th Dec, 4.00PM', '2492887639'),
(12, 10, 'Panchal', 'Barrie', '16th Dec, 6.00PM', '2492887639'),
(13, 11, 'Manveer', 'Barrie', '12th Dec, 5.00PM', '2492887639');

