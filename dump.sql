
DROP TABLE IF EXISTS page;
CREATE TABLE page(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
meta_title VARCHAR (255) DEFAULT '',
meta_description VARCHAR (255) DEFAULT '',
content TEXT,
short_content TEXT,
status INT(2) DEFAULT  0,
category_id INT(11) DEFAULT 0,
image VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS page_category;
CREATE TABLE page_category(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
meta_title VARCHAR (255) DEFAULT '',
meta_description TEXT,
content TEXT,
status INT(2) DEFAULT 0,
image VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS block;
CREATE TABLE block(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
content TEXT,
status INT(2) DEFAULT 0,
image VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS quick_order;
CREATE TABLE quick_order(
id INT NOT NULL AUTO_INCREMENT,
part_name VARCHAR (255) DEFAULT '',
name VARCHAR (255) DEFAULT '',
phone VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS news;
CREATE TABLE news(
id INT NOT NULL AUTO_INCREMENT,
title VARCHAR (255) DEFAULT '',
date_create INT (11) DEFAULT 0,
content TEXT,
status INT(2) DEFAULT 0,
image VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
email VARCHAR (255) DEFAULT '',
password VARCHAR (255) DEFAULT '',
status INT(2) DEFAULT 0,
role INT(2) DEFAULT 0,
last_visit INT(11),
image VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS product;
CREATE TABLE product(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
meta_title VARCHAR (255) DEFAULT '',
meta_description TEXT,
content TEXT,
short_content TEXT,
price INT(11) DEFAULT 0,
in_stock INT(11) DEFAULT 0,
category_id INT(11),
status INT(2) DEFAULT 0,
image VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS product_category;
CREATE TABLE product_category(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
meta_title VARCHAR (255) DEFAULT '',
meta_description TEXT,
content TEXT,
status INT(2) DEFAULT 0,
image VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
surname VARCHAR (255) DEFAULT '',
phone VARCHAR (255) DEFAULT '',
email VARCHAR (255) DEFAULT '',
delivery_id INT(11) DEFAULT 0,
payment_id INT(11) DEFAULT 0,
sum INT(11) DEFAULT 0,
count INT(11) DEFAULT 0,
products TEXT,
status INT (2) DEFAULT 1,
date_create INT (11) DEFAULT 0,
date_update INT (11) DEFAULT 0,
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS setting;
CREATE TABLE setting(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
value TEXT,
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments(
id INT NOT NULL AUTO_INCREMENT,
parent_id int (11) DEFAULT 0,
object_id int (11) DEFAULT 0,
name VARCHAR (255) DEFAULT '',
email VARCHAR (255) DEFAULT '',
comment TEXT,
status INT (2) DEFAULT 0,
date_create INT(11),
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS delivery;
CREATE TABLE delivery(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
value TEXT,
price INT(11) DEFAULT 0,
status INT (11) DEFAULT 0,
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS payment;
CREATE TABLE payment(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
value TEXT,
status INT (11) DEFAULT 0,
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS brand;
CREATE TABLE brand(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR (255) DEFAULT '',
status INT (11) DEFAULT 0,
image VARCHAR (255) DEFAULT '',
PRIMARY KEY (id)
);



INSERT INTO `product_category`(`name`, `meta_title`, `meta_description`, `status`) VALUES ('АВТОНОМКИ','Автономка для вантажівки - купити в інтернет-магазині TIRMarket','Замовити автономку для вантажівки - ціна на сайті інтернет-магазину tirrmarket.com.ua ✓ Широкий асортимент автозапчастин і комплектуючих ➤ Замовляйте за ☎ +38 097 123 45 67 ☎ 38 066 123 45 67 ✓Доставка по всій Україні','1')