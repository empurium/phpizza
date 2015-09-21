phpizza
=======

A Symfony project created on September 19, 2015, 7:27 pm.



### Create the `customers` table to store users

CREATE TABLE `phpizza`.`customers` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`fname` VARCHAR(255) NOT NULL,
	`lname` VARCHAR(255) NOT NULL,
	`phone` VARCHAR(40) NOT NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB;


### Create the `pizza_orders` table to store order history

CREATE TABLE `phpizza`.`pizza_orders` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`customer_id` INT(10) UNSIGNED NOT NULL,
	`pizza_variety` VARCHAR(255) NOT NULL,
	`toppings` TEXT NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	INDEX `customer_id_idx` (`customer_id`)
)
ENGINE=InnoDB;
