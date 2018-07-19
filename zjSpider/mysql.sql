create table luo_zj1 (
id int(11) primary key not null auto_increment,
title varchar(255) not null,
url varchar(100)binary not null
)default charset=utf8;

create table luo_zj2 (
id int(11) primary key not null auto_increment,
title varchar(255) not null,
url varchar(100) not null
)default charset=utf8;

CREATE TABLE IF NOT EXISTS `spider_zj1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `spider_zj2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;