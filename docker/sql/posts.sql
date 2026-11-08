SET NAMES utf8mb4;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `category_id` int(11) NOT NULL,
    `title` varchar(200) NOT NULL,
    `description` text NOT NULL,
    `photo_path` varchar(255) NULL default "public\images\placeholder1.jpg",
    `location` varchar(255) NOT NULL,
    `date_updated` datetime DEFAULT NULL,
    `date_planned` datetime NOT NULL,
    `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
    `capacity` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;