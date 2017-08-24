CREATE TABLE `book_admin` (
`id` int NOT NULL AUTO_INCREMENT,
`login` varchar(255) NOT NULL,
`pwd` varchar(255) NOT NULL,
`name` varchar(255) NOT NULL,
`sex` enum('男','女') NOT NULL,
`dateBirth` date NOT NULL,
`identity` varchar(255) NOT NULL,
`tel` varchar(255) NOT NULL,
`origin` varchar(255) NULL,
`nation` varchar(255) NULL,
`code` varchar(255) NULL,
`timeLastLogin` datetime NULL,
`timeThisLogin` datetime NULL,
`statusLock` enum('0','1') NOT NULL DEFAULT '0',
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_classified` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`description` varchar(255) NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_admin_classified` (
`id` int NOT NULL AUTO_INCREMENT,
`admin` int NOT NULL,
`classified` int NOT NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_type` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_class` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_book` (
`id` int NOT NULL AUTO_INCREMENT,
`ISBN` varchar(255) NOT NULL,
`codeBar` varchar(255) NOT NULL,
`title` varchar(255) NOT NULL,
`subtitle` varchar(255) NULL,
`author` varchar(255) NOT NULL,
`translator` varchar(255) NULL,
`language` varchar(255) NULL,
`class` int NOT NULL,
`type` int NOT NULL,
`press` int NOT NULL,
`libary` int NOT NULL,
`datePublish` date NOT NULL,
`periodPublish` varchar(255) NULL,
`periodicalCode` varchar(255) NULL,
`periodicalTotalNumber` int NULL,
`edition` varchar(255) NULL,
`bian` varchar(255) NULL,
`juan` varchar(255) NULL,
`ce` varchar(255) NULL,
`page` int NULL,
`numberInventory` int NOT NULL,
`numberRest` int NULL DEFAULT 0,
`position` varchar(255) NULL,
`responsable` varchar(255) NOT NULL,
`recorder` int NOT NULL,
`timeRecord` datetime NOT NULL,
`maxNumberDelay` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_tag` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NULL,
PRIMARY KEY (`id`) ,
UNIQUE INDEX (`name`)
);

CREATE TABLE `book_book_tag` (
`id` int NOT NULL AUTO_INCREMENT,
`book` int NOT NULL,
`tag` int NOT NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_client` (
`id` int NOT NULL AUTO_INCREMENT,
`login` varchar(255) NULL,
`pwd` varchar(255) NULL,
`serialNumber` varchar(255) NOT NULL,
`name` varchar(255) NOT NULL,
`sex` enum('男','女') NOT NULL,
`dateBirth` date NOT NULL,
`tel` varchar(255) NOT NULL,
`nation` varchar(255) NULL,
`origin` varchar(255) NULL,
`identity` varchar(255) NOT NULL,
`etc` varchar(255) NULL,
`statusLock` enum('0','1') NULL DEFAULT '0',
`status` enum('0','1') NULL DEFAULT '1',
PRIMARY KEY (`id`) ,
UNIQUE INDEX (`tel`)
);

CREATE TABLE `book_press` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`adresse` varchar(255) NOT NULL,
`tel` varchar(255) NOT NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_borrow` (
`id` int NOT NULL AUTO_INCREMENT,
`client` int NOT NULL,
`serialNumber` varchar(255) NULL,
`time` datetime NOT NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_operation_record` (
`id` int NOT NULL,
`admin` int NOT NULL,
`operation` varchar(255) NOT NULL,
`content` varchar(255) NOT NULL,
`ip` varchar(255) NOT NULL,
`time` datetime NOT NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_config` (
`user` varchar(255) NULL
);

CREATE TABLE `book_client_tag` (
`id` int NOT NULL AUTO_INCREMENT,
`client` int NULL,
`tag` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_client_class` (
`id` int NULL AUTO_INCREMENT,
`client` int NULL,
`class` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_client_type` (
`id` int NOT NULL AUTO_INCREMENT,
`client` int NULL,
`type` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_client_press` (
`id` int NOT NULL AUTO_INCREMENT,
`client` int NULL,
`press` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_volume` (
`id` int NOT NULL AUTO_INCREMENT,
`book` int NULL,
`serialNumber` varchar(255) NULL,
`status` varchar(255) NULL,
`recency` varchar(255) NULL,
`addTime` date NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_borrow_content` (
`id` int NOT NULL AUTO_INCREMENT,
`idBorrow` int NULL,
`volume` int NULL,
`dateReturn` date NULL,
`dateExpire` date NULL,
`status` varchar(255) NULL,
`numberProlonger` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_libary` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NULL,
`responsable` varchar(255) NULL,
`tel` varchar(255) NULL,
`email` varchar(255) NULL,
`timeOpen` time NULL,
`timeClose` time NULL,
`etc` varchar(255) NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_client_libary` (
`id` int NOT NULL AUTO_INCREMENT,
`client` int NULL,
`libary` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_history_serch` (
`id` int NOT NULL,
`admin` int NOT NULL,
`type` varchar(255) NULL,
`content` varchar(255) NULL,
`time` datetime NULL,
`cachId` varchar(255) NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_template_classified` (
`id` int NOT NULL AUTO_INCREMENT,
`template` int NULL,
`classified` int NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `book_template` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NULL,
PRIMARY KEY (`id`) 
);