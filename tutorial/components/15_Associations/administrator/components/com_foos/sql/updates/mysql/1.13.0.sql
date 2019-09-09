ALTER TABLE `#__foos_details` ADD COLUMN  `published` tinyint(1) NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__foos_details` ADD COLUMN  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' AFTER `alias`;

ALTER TABLE `#__foos_details` ADD COLUMN  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' AFTER `alias`;

ALTER TABLE `#__foos_details` ADD KEY `idx_state` (`published`);
