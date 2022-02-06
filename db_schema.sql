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
    STATUS varchar(255) not null,
    DETAILS text
);

INSERT INTO DISHES (NAME, DESCRIPTION, PRICE, IMAGE) VALUES
('Pizza Margherita', 'Pizza Margherita', '10', 'pizza_margherita.jpg'),
('Pizza Napoletana', 'Pizza Napoletana', '10', 'pizza_napoletana.jpg'),
('Pizza Quattro Stagioni', 'Pizza Quattro Stagioni', '10', 'pizza_quattro_stagioni.jpg'),
('Pizza Funghi', 'Pizza Funghi', '10', 'pizza_funghi.jpg'),
('Pizza Prosciutto', 'Pizza Prosciutto', '10', 'pizza_prosciutto.jpg'),
('Pizza Quattro Formaggi', 'Pizza Quattro Formaggi', '10', 'pizza_quattro_formaggi.jpg'),
('Pizza Vegetariana', 'Pizza Vegetariana', '10', 'pizza_vegetariana.jpg'),
('Pizza Frutti di Mare', 'Pizza Frutti di Mare', '10', 'pizza_frutti_di_mare.jpg'),
('Pizza Quattro Formaggi', 'Pizza Quattro Formaggi', '10', 'pizza_quattro_formaggi.jpg'),
('Pizza Quattro Stagioni', 'Pizza Quattro Stagioni', '10', 'pizza_quattro_stagioni.jpg'),
('Pizza Prosciutto', 'Pizza Prosciutto', '10', 'pizza_prosciutto.jpg'),
('Pizza Vegetariana', 'Pizza Vegetariana', '10', 'pizza_vegetariana.jpg'),
('Pizza Frutti di Mare', 'Pizza Frutti di Mare', '10', 'pizza_frutti_di_mare.jpg'),
('Pizza Margherita', 'Pizza Margherita', '10', 'pizza_margherita.jpg'),
('Pizza Napoletana', 'Pizza Napoletana', '10', 'pizza_napo.jpg');
