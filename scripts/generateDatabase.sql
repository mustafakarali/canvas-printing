-- 
--  generateDatabase.sql
--  comp2405a4
--  
--  Created by Martin Gingras on 2012-03-31.
--  Copyright 2012 Martin Gingras. All rights reserved.
-- 

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
email varchar(20) NOT NULL,
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
("Martin","Gingras","279 Shakespeare Dr.","Waterloo","Ontario","N2L2V6","mg@g.com","potty");

INSERT INTO images (image_id, image_name, description) VALUES
(1000, "one.jpeg", "Beautiful beach covered in driftwood at dusk");
INSERT INTO images (image_name, description) VALUES
("two.jpeg", "Sunset on a peaceful lake with stray clouds"),
("three.jpeg", "Sunset silhouetting the mountains with the sky full of stray clouds"),
("four.jpeg", "Beach scene framed in sunlight with forestry off in the background"),
("five.jpeg", "Mist covered island encased in sunlight"),
("six.jpeg", "The leaves of fall captured in all their colourful splendour"),
("seven.jpeg", "A lake bathed in sunlight fading into a mysterious fog encompassing a forest in the background"),
("eight.jpeg", "Frost settling down on a forest in the early stages of winter"),
("nine.jpeg", "A solitary rock framed in the foreground with a beautiful sunset coloring the sky behind it"),
("ten.jpeg", "The colors of fall reflected in the water of a calm river");

