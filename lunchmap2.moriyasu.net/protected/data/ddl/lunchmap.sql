CREATE DATABASE `lunchmap` DEFAULT CHARACTER SET utf8;

USE `lunchmap`;

CREATE TABLE IF NOT EXISTS `lunch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `shop_name` varchar(255) NOT NULL COMMENT '店名',
  `latlng` geometry NOT NULL COMMENT '緯度経度',
  `menu` varchar(255) NOT NULL COMMENT 'メニュー',
  `image_url` varchar(255) NOT NULL COMMENT '画像URL',
  `nearest` varchar(255) NOT NULL COMMENT '最寄り駅',
  `price` int(10) unsigned NOT NULL COMMENT '価格',
  `visited_at` date NOT NULL COMMENT '訪問日',
  `created_at` datetime NOT NULL COMMENT '作成日時',
  `updated_at` datetime NOT NULL COMMENT '更新日時',
  PRIMARY KEY  (`id`),
  SPATIAL KEY `latlng_index` (`latlng`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ランチ';
