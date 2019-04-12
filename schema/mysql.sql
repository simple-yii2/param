create table if not exists `settings`
(
    `id` int(10) not null auto_increment,
    `alias` varchar(50),
    `title` varchar(100) default null,
    `value` varchar(200) default null,
    primary key (`id`),
    key `alias` (`alias`)
) engine InnoDB;
