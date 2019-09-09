ALTER TABLE `#__foos_details` ADD COLUMN  `checked_out` int(10) unsigned NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__foos_details` ADD COLUMN  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' AFTER `alias`;
