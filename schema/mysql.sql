create table if not exists `Settings`
(
	`id` int(10) not null auto_increment,
	`name` varchar(50),
	`value` varchar(200) default null,
	primary key (`id`),
	key `name` (`name`)
) engine InnoDB;
