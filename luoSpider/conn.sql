CREATE TABLE IF NOT EXISTS `luospider1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=30 ;

CREATE TABLE IF NOT EXISTS `luospider1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=30 ;

create table luoSpider3(
id int(11) primary key not null auto_increment,
aid int(11) not null,
function varchar(255) not null,
url varchar(150) not null
);
create table luoSpider4(
id int(11) primary key not null auto_increment,
aid int(11) not null,
function varchar(255) not null,
description text  null,
parameters text  null,
returnValues text  null,
changeLog text  null,
notes	text  null,
seeAlso	text  null
);
