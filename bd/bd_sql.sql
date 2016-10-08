-- MySQL Script generated by MySQL Workbench
-- 10/04/16 12:50:30
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema simpusco_pizzeria
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `simpusco_pizzeria` ;

-- -----------------------------------------------------
-- Schema simpusco_pizzeria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `simpusco_pizzeria` DEFAULT CHARACTER SET utf8 ;
USE `simpusco_pizzeria` ;

-- -----------------------------------------------------
-- Table `simpusco_pizzeria`.`varieties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simpusco_pizzeria`.`varieties` ;

CREATE TABLE IF NOT EXISTS `simpusco_pizzeria`.`varieties` (
  `variety_id` INT NOT NULL AUTO_INCREMENT,
  `variety_name` VARCHAR(50) NOT NULL,
  `ingredients` VARCHAR(100) NOT NULL,
  `picture` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`variety_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simpusco_pizzeria`.`customers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simpusco_pizzeria`.`customers` ;

CREATE TABLE IF NOT EXISTS `simpusco_pizzeria`.`customers` (
  `customer_id` INT NOT NULL AUTO_INCREMENT,
  `customer_name` VARCHAR(80) NOT NULL,
  `customer_email` VARCHAR(45) NOT NULL,
  `customer_pass` VARCHAR(45) NOT NULL,
  `customer_address` VARCHAR(120) NOT NULL,
  `customer_tel` VARCHAR(15) NOT NULL,
  `registered` DATETIME NOT NULL,
  `approved` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`customer_id`),
  UNIQUE INDEX `customer_email_UNIQUE` (`customer_email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simpusco_pizzeria`.`sizes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simpusco_pizzeria`.`sizes` ;

CREATE TABLE IF NOT EXISTS `simpusco_pizzeria`.`sizes` (
  `size_id` INT NOT NULL AUTO_INCREMENT,
  `size_name` VARCHAR(45) NOT NULL,
  `price` FLOAT NOT NULL,
  PRIMARY KEY (`size_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simpusco_pizzeria`.`sales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simpusco_pizzeria`.`sales` ;

CREATE TABLE IF NOT EXISTS `simpusco_pizzeria`.`sales` (
  `sale_id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NOT NULL,
  `total` FLOAT NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `colonia` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(60) NOT NULL,
  `calle` VARCHAR(80) NOT NULL,
  `referencias` VARCHAR(120) NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`sale_id`),
  INDEX `fk_sales_customers1_idx` (`customer_id` ASC),
  CONSTRAINT `fk_sales_customers1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `simpusco_pizzeria`.`customers` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simpusco_pizzeria`.`sale_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simpusco_pizzeria`.`sale_details` ;

CREATE TABLE IF NOT EXISTS `simpusco_pizzeria`.`sale_details` (
  `sale_detail_id` INT NOT NULL AUTO_INCREMENT,
  `sale_id` INT NOT NULL,
  `size_id` INT NOT NULL,
  `variety_id` INT NOT NULL,
  INDEX `fk_sales_sizes_idx` (`size_id` ASC),
  INDEX `fk_sales_varieties1_idx` (`variety_id` ASC),
  INDEX `fk_sales_details_sales1_idx` (`sale_id` ASC),
  PRIMARY KEY (`sale_detail_id`),
  CONSTRAINT `fk_sales_sizes`
    FOREIGN KEY (`size_id`)
    REFERENCES `simpusco_pizzeria`.`sizes` (`size_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sales_varieties1`
    FOREIGN KEY (`variety_id`)
    REFERENCES `simpusco_pizzeria`.`varieties` (`variety_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sales_details_sales1`
    FOREIGN KEY (`sale_id`)
    REFERENCES `simpusco_pizzeria`.`sales` (`sale_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simpusco_pizzeria`.`admins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simpusco_pizzeria`.`admins` ;

CREATE TABLE IF NOT EXISTS `simpusco_pizzeria`.`admins` (
  `admin_id` INT NOT NULL,
  `admin_name` VARCHAR(45) NOT NULL,
  `admin_user` VARCHAR(45) NOT NULL,
  `admin_pass` VARCHAR(45) NOT NULL,
  `registered` DATE NOT NULL,
  PRIMARY KEY (`admin_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simpusco_pizzeria`.`promotions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `simpusco_pizzeria`.`promotions` ;

CREATE TABLE IF NOT EXISTS `simpusco_pizzeria`.`promotions` (
  `promotion_id` INT NOT NULL AUTO_INCREMENT,
  `promotion_title` VARCHAR(60) NOT NULL,
  `promotion_desc` VARCHAR(120) NOT NULL,
  `promotion_type` INT NOT NULL DEFAULT 0,
  `promotion_photo` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`promotion_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `simpusco_pizzeria`.`sizes`
-- -----------------------------------------------------
START TRANSACTION;
USE `simpusco_pizzeria`;
INSERT INTO `simpusco_pizzeria`.`sizes` (`size_id`, `size_name`, `price`) VALUES (1, 'Individual', 30);
INSERT INTO `simpusco_pizzeria`.`sizes` (`size_id`, `size_name`, `price`) VALUES (2, 'Mediana', 79);
INSERT INTO `simpusco_pizzeria`.`sizes` (`size_id`, `size_name`, `price`) VALUES (3, 'Familiar', 99);

COMMIT;

