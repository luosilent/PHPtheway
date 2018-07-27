CREATE TABLE `liu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stime` date NOT NULL,
  `small` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `big` int(10) NOT NULL,
  `etime` date NOT NULL,
  `cdate` date NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE (`stime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
