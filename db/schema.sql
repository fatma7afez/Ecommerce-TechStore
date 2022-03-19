CREATE TABLE `cats`(
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT NOW()
);
CREATE TABLE `products` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `desc` TEXT NOT NULL,
    `price` DECIMAL(8,2) NOT NULL,
    `piece_num` SMALLINT NOT NULL,
    `img` VARCHAR(255) NOT NULL,
    `cat_id`  INT(11) UNSIGNED,
    `created_at` DATETIME NOT NULL DEFAULT NOW(),

    FOREIGN KEY (`cat_id`) REFERENCES  `cats`(`id`) ON DELETE SET NULL 
); 

CREATE TABLE `orders` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `phone`VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) UNIQUE,
    `address` VARCHAR(255),
    `status` ENUM('pending','approved','cancel') NOT NULL DEFAULT 'pending',
    `created_at` DATETIME NOT NULL DEFAULT NOW()
);


CREATE TABLE `order_details`(
    `product_id` INT(11) UNSIGNED ,
    `order_id` INT(11) UNSIGNED,
    `qty` INT NOT NULL,
    FOREIGN KEY (`product_id`) REFERENCES  `products`(`id`) ON DELETE SET NULL ,
    FOREIGN KEY (`order_id`) REFERENCES  `orders`(`id`) ON DELETE SET NULL 
);

CREATE TABLE `admins` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `is_Super` ENUM('Yes', 'No') DEFAULT 'No',
    `created_at` DATETIME NOT NULL DEFAULT NOW()
);