#SKD101|invifiredb|64|2013.08.01 13:04:42|21455|6|14|15563|1|49|12|14|6|2|45|9|3|95|8|15|15|14|614|82|8|236|703|714|550|224|221|2065|167

DROP TABLE IF EXISTS `adsense_clicks`;
CREATE TABLE `adsense_clicks` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) DEFAULT '0',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `referrer` varchar(255) DEFAULT '',
  PRIMARY KEY (`aid`),
  KEY `path` (`path`),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */;

DROP TABLE IF EXISTS `affiliates`;
CREATE TABLE `affiliates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `cookie_id` varchar(56) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `referer` varchar(80) DEFAULT NULL,
  `ad_id` int(10) unsigned DEFAULT NULL,
  `click_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `affiliates_user_id` (`user_id`),
  KEY `affiliates_cookie_id` (`cookie_id`),
  KEY `affiliates_ip` (`ip`),
  KEY `affiliates_click_time` (`click_time`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */;

DROP TABLE IF EXISTS `affiliates_ads`;
CREATE TABLE `affiliates_ads` (
  `ad_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(30) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `anchor` varchar(100) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `cat_id` int(10) unsigned DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `redirect` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT 'a',
  PRIMARY KEY (`ad_id`),
  KEY `affiliates_ads_label` (`label`),
  KEY `affiliates_ads_type` (`type`),
  KEY `affiliates_ads_cat_id` (`cat_id`),
  KEY `affiliates_ads_status` (`status`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */;

DROP TABLE IF EXISTS `affiliates_cats`;
CREATE TABLE `affiliates_cats` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  `weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */;

DROP TABLE IF EXISTS `affiliates_summary`;
CREATE TABLE `affiliates_summary` (
  `user_id` int(10) NOT NULL DEFAULT '0',
  `total_points` int(10) DEFAULT NULL,
  `period_points` int(10) DEFAULT NULL,
  `previous_period_points` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=latin1 */;

DROP TABLE IF EXISTS `aggregator_feed`;
CREATE TABLE `aggregator_feed` (
  `fid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key: Unique feed ID.',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title of the feed.',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT 'URL to the feed.',
  `refresh` int(11) NOT NULL DEFAULT '0' COMMENT 'How often to check for new feed items, in seconds.',
  `checked` int(11) NOT NULL DEFAULT '0' COMMENT 'Last time feed was checked for new items, as Unix timestamp.',
  `queued` int(11) NOT NULL DEFAULT '0' COMMENT 'Time when this feed was queued for refresh, 0 if not queued.',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT 'The parent website of the feed; comes from the <link> element in the feed.',
  `description` longtext NOT NULL COMMENT 'The parent website’s description; comes from the <description> element in the feed.',
  `image` longtext NOT NULL COMMENT 'An image representing the feed.',
  `hash` varchar(64) NOT NULL DEFAULT '' COMMENT 'Calculated hash of the feed data, used for validating cache.',
  `etag` varchar(255) NOT NULL DEFAULT '' COMMENT 'Entity tag HTTP response header, used for validating cache.',
  `modified` int(11) NOT NULL DEFAULT '0' COMMENT 'When the feed was last modified, as a Unix timestamp.',
  `block` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Number of items to display in the feed’s block.',
  PRIMARY KEY (`fid`),
  UNIQUE KEY `url` (`url`),
  UNIQUE KEY `title` (`title`),
  KEY `queued` (`queued`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */ COMMENT='Stores feeds to be parsed by the aggregator.';

DROP TABLE IF EXISTS `aggregator_item`;
CREATE TABLE `aggregator_item` (
  `iid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key: Unique ID for feed item.',
  `fid` int(11) NOT NULL DEFAULT '0' COMMENT 'The drupal_aggregator_feed.fid to which this item belongs.',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title of the feed item.',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT 'Link to the feed item.',
  `author` varchar(255) NOT NULL DEFAULT '' COMMENT 'Author of the feed item.',
  `description` longtext NOT NULL COMMENT 'Body of the feed item.',
  `timestamp` int(11) DEFAULT NULL COMMENT 'Posted date of the feed item, as a Unix timestamp.',
  `guid` varchar(255) DEFAULT NULL COMMENT 'Unique identifier for the feed item.',
  PRIMARY KEY (`iid`),
  KEY `fid` (`fid`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */ COMMENT='Stores the individual items imported from feeds.';

DROP TABLE IF EXISTS `asset`;
CREATE TABLE `asset` (
  `idasset` bigint(20) unsigned NOT NULL,
  `nameasset` text NOT NULL,
  `url` text NOT NULL,
  `idowner` int(10) unsigned NOT NULL,
  `album` text,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`idasset`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */;

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `idbook` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtile` int(10) unsigned DEFAULT NULL,
  `title` text NOT NULL,
  `noidung` text NOT NULL,
  `author` text NOT NULL,
  `iduser` text NOT NULL,
  `tilestyle` tinyint(4) NOT NULL DEFAULT '0',
  `reviewedtime` int(10) unsigned NOT NULL DEFAULT '0',
  `rating` tinyint(2) unsigned NOT NULL DEFAULT '4',
  `voteup` int(10) unsigned NOT NULL DEFAULT '0',
  `reviewpeople` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `show` float NOT NULL DEFAULT '1',
  PRIMARY KEY (`idbook`)
) ENGINE=InnoDB AUTO_INCREMENT=22 /*!40101 DEFAULT CHARSET=utf8 */;

INSERT INTO `book` VALUES