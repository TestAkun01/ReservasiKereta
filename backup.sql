CREATE TABLE `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `schedule_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `num_tickets` int NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL,
  `identity` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_id` (`schedule_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('12','1','1','12','2024-10-07 03:21:10','','','','');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('13','1','1','1','2024-10-07 07:35:30','','','','');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('14','1','1','1','2024-10-08 22:23:13','','','','');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('15','1','1','1','2024-10-10 20:07:51','Ahmad Ubaydir Rohman','Anjay','098778978','');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('16','1','1','1','2024-10-10 20:26:18','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('17','1','1','1','2024-10-10 20:55:31','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('18','1','1','1','2024-10-10 20:56:19','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('19','1',NULL,'1','2024-10-10 20:59:11','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('20','1','1','1','2024-10-10 21:09:29','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('21','1','1','1','2024-10-10 21:17:58','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('22','1','1','1','2024-10-10 21:19:35','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('25','1','1','1','2024-10-10 21:22:52','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');
INSERT INTO reservation (id,schedule_id,user_id,num_tickets,booking_date,name,identity,contact,email) VALUES ('26','1','1','1','2024-10-10 21:38:50','Ahmad Ubaydir Rohman','Anjay','2121','nomorhpku6@gmail.com');

CREATE TABLE `schedules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `train_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `station_from` int NOT NULL,
  `station_to` int NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `seats_left` int NOT NULL,
  `arrival_time` time NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `station_from` (`station_from`),
  KEY `station_to` (`station_to`),
  CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`station_from`) REFERENCES `stations` (`id`),
  CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`station_to`) REFERENCES `stations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO schedules (id,train_name,station_from,station_to,departure_date,departure_time,seats_left,arrival_time,price) VALUES ('1','Argo Bromo','1','2','2024-10-05','08:00:00','18','12:00:00','300000.00');
INSERT INTO schedules (id,train_name,station_from,station_to,departure_date,departure_time,seats_left,arrival_time,price) VALUES ('2','Argo Parahyangan','1','2','2024-10-05','14:00:00','49','18:00:00','250000.00');
INSERT INTO schedules (id,train_name,station_from,station_to,departure_date,departure_time,seats_left,arrival_time,price) VALUES ('3','Taksaka','1','3','2024-10-06','07:00:00','79','11:00:00','350000.00');
INSERT INTO schedules (id,train_name,station_from,station_to,departure_date,departure_time,seats_left,arrival_time,price) VALUES ('4','Gaya Baru','2','4','2024-10-07','09:00:00','120','15:00:00','200000.00');

CREATE TABLE `stations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO stations (id,name,city) VALUES ('1','Gambir','Jakarta');
INSERT INTO stations (id,name,city) VALUES ('2','Bandung','Bandung');
INSERT INTO stations (id,name,city) VALUES ('3','Yogyakarta','Yogyakarta');
INSERT INTO stations (id,name,city) VALUES ('4','Surabaya','Surabaya');

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO users (id,username,password,created_at) VALUES ('1','Test','$2y$10$EBwjMkKLOWT8kepV/oEaFeYIqrXZEQugifw7CyC/t16hID.NAnin.','2024-10-07 00:57:40');

