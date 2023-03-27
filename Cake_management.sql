create database cake_management;
create table users(
id int(10) auto_increment primary key,
fullnames varchar(100) not null,
username varchar(100) not null,
email varchar(100) not null,
contact int(10) not null,
gender varchar(50) not null,
location varchar(100) not null,
usersuser_type varchar(30) not null,
password char(128) not null
);
create table products(
product_id int(10) primary key auto_increment,
product_name varchar(100) not null, 
product_description varchar(200) not null, 
product_price int(10) not null, 
product_image varchar(100) not null
);
create table orderss(
customer_Name varchar(100) not null,
product_id int(10) primary key auto_increment,
product_name varchar(100) not null, 
product_description varchar(200) not null, 
product_price int(10) not null, 
product_image varchar(100) not null,
bakers_name varchar(100) not null,
status varchar(50) not null,
payment varchar(100) not null
);
-- create table delivery(
-- deliver_name varchar(100) not null,
-- id int(10) auto_increment primary key,
-- customer_name varchar(100) not null,
-- delivery_address varchar(100) not null,
-- deliver_date_time date not null, 
-- deliver_time datetime not null, 
-- deliver_option int(10) not null, 
-- payment_method varchar(100) not null
-- );
create table deliveries(
deliver_name varchar(100) not null,
id int(10) auto_increment primary key,
customer_name varchar(100) not null,
delivery_address varchar(100) not null,
deliver_date_time date not null, 
deliver_time datetime not null, 
deliver_option int(10) not null, 
bakers_name varchar(100) not null,
payment_method varchar(100) not null
);