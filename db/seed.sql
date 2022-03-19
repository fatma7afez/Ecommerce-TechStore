INSERT INTO `cats` (`name`) VALUES ('Laptops'),('Pcs'),('Mobiles');

INSERT INTO `products` (`name`,`desc`,`price`,`piece_num`,`img`,`cat_id`) VALUES
('lenovo ideapad','this is dummy description for product',15000,10,'1.jpg',1),
('dell laptop' ,'this is dummy description for product',10000,10,'2.jpg',1),
('hp laptop','this is dummy description for product',8000,8,'3.jpg',1),
('lenovo thinkpad','this is dummy description for product',13000,5,'4.jpg',1),
('pc 123','this is dummy description for product',5000,3,'5.jpg',2),
('pc 456','this is dummy description for product',6000,4,'6.jpg',2),
('pc 789','this is dummy description for product',7000,2,'7.jpg',2),
('sumsung ay 7age','this is dummy description for product',5000,100,'8.jpg',3),
('oppo ay 7age','this is dummy description for product',5500,50,'9.jpg',3),
('hawai ay 7age','this is dummy description for product',5200,30,'10.jpg',3);

INSERT INTO `admins` (`name`,`email`,`password`) 
VALUES ('fatma Hafez','fatma@gmail.com','$2y$10$cRzA4a9J6msqGGcJpBzkfO4O0YVx2Jb5LQlopEPqeLvqfn/s16mpK');