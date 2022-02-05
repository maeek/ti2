USE pasibrzuch;

CREATE TABLE USERS (
	ID int PRIMARY key not null AUTO_INCREMENT,
    USERNAME varchar(255) not null,
    PASSWORD varchar(255) not null,
    EMAIL varchar(255) not null,
    NAME varchar(150) NOT NULL,
    ADDRESS varchar(150) NOT NULL
);

CREATE TABLE DISHES (
  ID int PRIMARY key not null AUTO_INCREMENT,
    NAME varchar(255) not null,
    DESCRIPTION varchar(255) not null,
    PRICE varchar(255) not null,
    IMAGE varchar(255) not null
);

CREATE TABLE ORDERS (
  ID int PRIMARY key not null AUTO_INCREMENT,
    USER_ID int not null,
    ORDER_DATE datetime not null,
    STATUS varchar(255) not null
);

CREATE TABLE ORDER_DETAILS (
  ID int PRIMARY key not null AUTO_INCREMENT,
    ORDER_ID int not null,
    DISH_ID int not null,
    QUANTITY int not null
);
