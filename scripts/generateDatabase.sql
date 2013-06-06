-- Create the database if it doesnt exist
create database if not exists db_canvas_printing;
use db_canvas_printing;


-- Creating some tables if they dont already exist

CREATE TABLE IF NOT EXISTS clients (
first_name varchar(20) NOT NULL,
last_name varchar(20) NOT NULL,
address_street varchar(20) NOT NULL,
address_city varchar(20) NOT NULL,
province varchar(20) NOT NULL,
postal_code varchar(20) NOT NULL,
email varchar(50) NOT NULL,
password varchar(10) NOT NULL,
client_id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (client_id)
);
CREATE TABLE IF NOT EXISTS orders (
invoice_id int NOT NULL AUTO_INCREMENT,
image_id int NOT NULL,
client_id int NOT NULL,
width int NOT NULL,
height int NOT NULL,
cost FLOAT NOT NULL,
PRIMARY KEY (invoice_id)
);
CREATE TABLE IF NOT EXISTS images (
image_id int NOT NULL AUTO_INCREMENT,
image_name varchar(100) NOT NULL,
description varchar(250) NOT NULL,
PRIMARY KEY (image_id)
);

-- Establishing the Images Database some Images and their descriptions

INSERT INTO clients(first_name, last_name, address_street, address_city, province, postal_code, email, password) values
("Martin","Gingras","3480 McCarthy Rd.","Ottawa","Ontario","K1V9A1","martin@magingras.com","password");

INSERT INTO images (image_id, image_name, description) VALUES
(1000, "one.jpeg", "Beautiful grassy hillside with lots of sunlight with a nicely handcrafted bench.");
INSERT INTO images (image_name, description) VALUES
("two.jpeg", "Beautiful sunset over a grass hillside."),
("three.jpeg", "A nice countryside landscape with houses off in the distance."),
("four.jpeg", "Beach scene framed in sunlight with a hill rising off into the distance."),
("five.jpeg", "Mist encased mountain off in the distance with colorful buildings in the foregrounds."),
("six.jpeg", "City lights captured in the dusk glow."),
("seven.jpeg", "A cityscape with the lights captured."),
("eight.jpeg", "Kitty cat sitting there cutely."),
("nine.jpeg", "Clouds!!"),
("ten.jpeg", "Yellow beatle."),
("eleven.jpeg", "Cute kitty cat, with it's eyes closed.");

