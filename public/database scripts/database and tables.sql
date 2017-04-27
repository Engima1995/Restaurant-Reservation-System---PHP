//database administrator information can be changed in application/config/database.php file

//If IDENTIFIED BY PASSWORD is encrypted, the decrypted version is rrslocal

GRANT ALL PRIVILEGES ON *.* TO 'rrs'@'localhost' IDENTIFIED BY PASSWORD '*2189A97957C6F439F6573778049ADA52276F0BAB' WITH GRANT OPTION;

//below is all you need for database creation and table information

CREATE DATABASE restaurant_reservation_system;

DROP DATABASE restaurant_reservation_system;

CREATE TABLE admin (
  adminid INT NOT NULL AUTO_INCREMENT,
  adminUsername VARCHAR(255) NOT NULL,
  adminPassword VARCHAR(255) NOT NULL,
  CONSTRAINT admin_PK PRIMARY KEY(adminid)
);

//insert this query for creating an admin for the RRS site
//the password is 12345
//When creating new user, remember to encrypt password using $this->encryption->encrypt(''); and generate a password and copy it to the query below
//The reason for this is so that when the system runs, it will recognise the encryption sequence and decrypt it properly when checking in Login_model.php

INSERT INTO admin (adminid, adminUsername, adminPassword)
VALUES (1, 'Admin', 'f0a87e06d6b0ae8d31a9b9d3a0d06c4610979b611be0d109762bfc990308c8981b7f1b7f089159cde864a254d1a64bfeebb4217164286fe126a68f1cf555058227dAxn8vefFzUgpddILIjiPaFlnT4+vpyOhQ1NXehEY=');

DROP TABLE admin;

//Customer Table

CREATE TABLE customer (
  customerid INT NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phonenumber VARCHAR(20) NOT NULL,
  CONSTRAINT admin_PK PRIMARY KEY(customerid)
);

DROP TABLE customer;

//City Table

CREATE TABLE city (
  cityid INT NOT NULL AUTO_INCREMENT,
  city VARCHAR(255) NOT NULL,
  CONSTRAINT city_PK PRIMARY KEY (cityid)
);

INSERT INTO city (city)
VALUES ('HongKong');

INSERT INTO city (city)
VALUES ('NewYork');

INSERT INTO city (city)
VALUES ('Paris');

DROP TABLE city;

//Restaurant Table

CREATE TABLE restaurant (
  restaurantid INT NOT NULL AUTO_INCREMENT,
  cityid INT NOT NULL,
  restaurantname VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  timeavailable TIME(2),
  timeend TIME(2),
  CONSTRAINT restaurant_PK PRIMARY KEY (restaurantid),
  CONSTRAINT city_FK FOREIGN KEY (cityid) REFERENCES city(cityid)
);

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (1, 'HK_Res_1', 'Chinese Street Food', '09:00', '22:00');

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (1, 'HK_Res_2', 'Michelin Star Restaurant', '09:00', '22:00');

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (1, 'HK_Res_3', 'Jumbo Kingdom', '09:00', '22:00');

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (2, 'NY_Res_1', 'Indian Restaurant', '09:00', '22:00');

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (2, 'NY_Res_2', 'Southern Hospitality', '09:00', '22:00');

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (2, 'NY_Res_3', 'Balthazar', '09:00', '22:00');

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (3, 'Paris_Res_1', 'Pizza Palace', '09:00', '22:00');

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (3, 'Paris_Res_2', 'Entrecoteone', '09:00', '22:00');

INSERT INTO restaurant (cityid, restaurantname, description, timeavailable, timeend)
VALUES (3, 'Paris_Res_3', 'Entrecotetwo', '09:00', '22:00');

DROP TABLE restaurant;

//Tables table

CREATE TABLE tables (
  tableid INT NOT NULL AUTO_INCREMENT,
  restaurantid INT NOT NULL,
  tableno VARCHAR(10) NOT NULL,
  tablecapacity VARCHAR(10) NOT NULL,
  CONSTRAINT tables_PK PRIMARY KEY (tableid),
  CONSTRAINT restaurantid_FK FOREIGN KEY (restaurantid) REFERENCES restaurant(restaurantid)
);

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (1, '9', '13');

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (2, '9', '13');

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (3, '9', '13');

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (4, '9', '13');

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (5, '9', '13');

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (6, '9', '13');

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (7, '9', '13');

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (8, '9', '13');

INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '1', '3');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '2', '5');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '3', '7');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '4', '9');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '5', '11');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '6', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '7', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '8', '13');
INSERT INTO tables (restaurantid, tableno, tablecapacity)
VALUES (9, '9', '13');

DROP TABLE tables;

//reserveredtables table

CREATE TABLE reservedtables (
  restableid INT NOT NULL AUTO_INCREMENT,
  restaurantid INT NOT NULL,
  tableid INT NOT NULL,
  tableno VARCHAR(10) NOT NULL,
  numberofpeople VARCHAR(255) NOT NULL,
  dates DATE NOT NULL,
  times TIME(2) NOT NULL,
  CONSTRAINT reservedtables_PK PRIMARY KEY (restableid),
  CONSTRAINT restaurantssid_FK FOREIGN KEY (restaurantid) REFERENCES restaurant(restaurantid),
  CONSTRAINT tableid_FK FOREIGN KEY (tableid) REFERENCES tables(tableid)
);

DROP TABLE reservedtables;

//Date table

CREATE TABLE dates (
  dateid INT NOT NULL AUTO_INCREMENT,
  restaurantid INT NOT NULL,
  dates DATE NOT NULL,
  CONSTRAINT date_PK PRIMARY KEY (dateid),
  CONSTRAINT restaurantsid_FK FOREIGN KEY (restaurantid) REFERENCES restaurant(restaurantid)
);

DROP TABLE dates;

//DatesFull table

CREATE TABLE datesfull (
  dateid INT NOT NULL AUTO_INCREMENT,
  restaurantid INT NOT NULL,
  datesfull DATE NOT NULL,
  CONSTRAINT datesfull_PK PRIMARY KEY (dateid),
  CONSTRAINT restaurantsssid_FK FOREIGN KEY (restaurantid) REFERENCES restaurant(restaurantid)
);

DROP TABLE datesfull;

//Booking table

CREATE TABLE booking (
  bookingid INT NOT NULL AUTO_INCREMENT,
  customerid INT NOT NULL,
  restableid INT NOT NULL,
  CONSTRAINT booking_PK PRIMARY KEY (bookingid),
  CONSTRAINT customer_FK FOREIGN KEY (customerid) REFERENCES customer(customerid),
  CONSTRAINT restables_FK FOREIGN KEY (restableid) REFERENCES reservedtables(restableid)
);

DROP TABLE booking;
