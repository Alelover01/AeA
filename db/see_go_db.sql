-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 16, 2023 alle 17:26
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `see&go`
-- CREATE SCHEMA IF NOT EXISTS `see&go` DEFAULT CHARACTER SET utf8 ;
-- USE `see&go` ;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `IdAlert` int(10) NOT NULL,
  `NomeUtente` char(22) NOT NULL COMMENT 'Nome di chi compie l''azione',
  `Descrizione` char(22) NOT NULL COMMENT 'Opzionale se non si fa il like e commenta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `persone`
--

CREATE TABLE `persone` (
  `Username` char(22) NOT NULL COMMENT 'Indice Tabella in modo da avere username diversi ogni volta',
  `Nome` char(22) NOT NULL,
  `Cognome` char(22) NOT NULL,
  `Sesso` char(22) NOT NULL,
  `Email` char(22) NOT NULL,
  `Password` char(22) NOT NULL COMMENT 'Campo da usare per fare il check con ripeti password',
  `Paese` char(45) NOT NULL,
  `DataNascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- --------------------------------------------------------

--
-- Struttura della tabella `follower`
--

CREATE TABLE `follower` (
  `following_user_id` char(22) NOT NULL,
  `followed_user_id` char(22) NOT NULL,
  CONSTRAINT `Username`
    FOREIGN KEY (`following_user_id` , `followed_user_id`)
    REFERENCES `see&go`.`persone` (`Username` , `Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `Username_idx` ON `see&go`.`follower` (`following_user_id` ASC, `followed_user_id` ASC) VISIBLE;

-- --------------------------------------------------------

--
-- Struttura della tabella `post_type`
--

CREATE TABLE `post_type` (
  `post_type_id` INT NOT NULL,
  `post_type_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`post_type_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`post`
-- -----------------------------------------------------
CREATE TABLE `post` (
  `post_id` INT NOT NULL,
  `created_by_user_id` char(45) NOT NULL,
  `created_time` VARCHAR(45) NOT NULL,
  `caption` VARCHAR(45) NULL,
  `post_type` INT NOT NULL,
  PRIMARY KEY (`post_id`),
  CONSTRAINT `Username`
    FOREIGN KEY (`created_by_user_id`)
    REFERENCES `see&go`.`persone` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `post_type_id`
    FOREIGN KEY (`post_type`)
    REFERENCES `see&go`.`post_type` (`post_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `Username_idx` ON `see&go`.`post` (`created_by_user_id` ASC) VISIBLE;

CREATE INDEX `post_type_id_idx` ON `see&go`.`post` (`post_type` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `like`
-- -----------------------------------------------------
/*OPZIONALE!! SE RIUSCIAMO A FARLO MOLTO MEGLIO!!*/
CREATE TABLE `like` (
  `like_id` INT NOT NULL,
  `post_id` INT NOT NULL,
  `user_profile_id` char(45) NOT NULL,
  `created_time` DATETIME NOT NULL,
  PRIMARY KEY (`like_id`),
  CONSTRAINT `Username`
    FOREIGN KEY (`user_profile_id`)
    REFERENCES `see&go`.`persone` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `post_id`
    FOREIGN KEY (`post_id`)
    REFERENCES `see&go`.`post` (`post_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `Username_idx` ON `see&go`.`like` (`user_profile_id` ASC) VISIBLE;

CREATE INDEX `post_id_idx` ON `see&go`.`like` (`post_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `comment`
-- -----------------------------------------------------
CREATE TABLE `comment` (
  `comment_id` INT NOT NULL,
  `post_id` INT NOT NULL,
  `user_profile_id` char(45) NOT NULL,
  `comment_text` VARCHAR(2000) NOT NULL,
  `created_time` INT NOT NULL,
  `comment_replied_to_id` INT NULL,
  PRIMARY KEY (`comment_id`),
  CONSTRAINT `post_id`
    FOREIGN KEY (`post_id`)
    REFERENCES `see&go`.`post` (`post_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Username`
    FOREIGN KEY (`user_profile_id`)
    REFERENCES `see&go`.`persone` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `comment_id`
    FOREIGN KEY (`comment_replied_to_id`)
    REFERENCES `see&go`.`comment` (`comment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `post_id_idx` ON `see&go`.`comment` (`post_id` ASC) VISIBLE;

CREATE INDEX `Username_idx` ON `see&go`.`comment` (`user_profile_id` ASC) VISIBLE;

CREATE INDEX `comment_id_idx` ON `see&go`.`comment` (`comment_replied_to_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `post_media`
-- -----------------------------------------------------
CREATE TABLE `post_media` (
  `post_media_id` INT NOT NULL,
  `post_id` INT NOT NULL,
  `media_file` VARCHAR(45) NOT NULL,
  `position` INT NOT NULL,
  `longitude` VARCHAR(45) NULL,
  `latitude` VARCHAR(45) NULL,
  PRIMARY KEY (`post_media_id`),
  CONSTRAINT `post_id`
    FOREIGN KEY (`post_id`)
    REFERENCES `see&go`.`post` (`post_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `post_id_idx` ON `see&go`.`post_media` (`post_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `post_media_user_tag`
-- -----------------------------------------------------
CREATE TABLE `post_media_user_tag` (
  `post_media_id` INT NOT NULL,
  `user_profile_id` char(45) NOT NULL,
  `x_coordinate` VARCHAR(45) NULL,
  `y_coordinate` VARCHAR(45) NULL,
  CONSTRAINT `post_media_id`
    FOREIGN KEY (`post_media_id`)
    REFERENCES `see&go`.`post_media` (`post_media_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Username`
    FOREIGN KEY (`user_profile_id`)
    REFERENCES `see&go`.`persone` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `post_media_id_idx` ON `see&go`.`post_media_user_tag` (`post_media_id` ASC) VISIBLE;

CREATE INDEX `Username_idx` ON `see&go`.`post_media_user_tag` (`user_profile_id` ASC) VISIBLE;


/*SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;*/ -->NON SO BENE A CHE SERVONO 
--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`IdAlert`);

--
-- Indici per le tabelle `persone`
--
ALTER TABLE `persone`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `IdAlert` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;