create database if not exists owsap_ecommerce;
use owsap_ecommerce;


CREATE TABLE IF NOT EXISTS `article` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  `image` VARCHAR(128) NULL,
  `prix` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) UNIQUE NOT NULL,
  `mdp` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `note` TINYINT(1) NOT NULL,
  `article_id` INT UNSIGNED NOT NULL,
  INDEX `fk_product_article_id` (`article_id` ASC),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `contact` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id`)
);







START TRANSACTION;
INSERT INTO `product` (`id`, `nom`, `description`, `image`, `prix`,) VALUES (1, 'premier produit', 'lorem','/public/image2/telescope_amateur.jpg','120',);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`,) VALUES (2, '', '', '', '');
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`,) VALUES (3, '', '', '', '');
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`,) VALUES (4, '', '', '', '');
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`,) VALUES (5, '', '', '', '',);
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`,) VALUES (6, '', '', '', '');

Select * from article;



