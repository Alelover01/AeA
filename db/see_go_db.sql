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
 CREATE SCHEMA IF NOT EXISTS `see&go` DEFAULT CHARACTER SET utf8 ;
 USE `see&go` ;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `IdAlert` int(10) NOT NULL,
  `UserPost` char(22) NOT NULL,
  `Descrizione` char(255) NOT NULL,
  `User` varchar(22) NOT NULL,
  `IdPost` int(11) NOT NULL
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
  --`Paese` char(45) NOT NULL,
  `DataNascita` date NOT NULL,
  `Città` char(22) NOT NULL, COMMENT 'Andrà nel profilo'
  `Foto` char(22)
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
  `media_file` VARCHAR(45) NOT NULL,
  `created_time` VARCHAR(45) NOT NULL,
  `caption` VARCHAR(45) NULL,
  --`longitude` VARCHAR(45) NULL, --NON so se serve
  --`latitude` VARCHAR(45) NULL, --NON so se serve
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
  `post_id` INT NOT NULL,
  `user_profile_id` char(45) NOT NULL,
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
  --`comment_replied_to_id` INT NULL,
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
-- Table `post_media_user_tag`
-- -----------------------------------------------------
CREATE TABLE `post_media_user_tag` (
  `post_id` INT NOT NULL,
  `user_profile_id` char(45) NOT NULL,
  `x_coordinate` VARCHAR(45) NULL,
  `y_coordinate` VARCHAR(45) NULL,
  CONSTRAINT `post_id`
    FOREIGN KEY (`post_id`)
    REFERENCES `see&go`.`post` (`post_id`)
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

/*Riempimento database*/
--
--Riempimento Tabella persone
--
INSERT INTO `persone` (`Username`, `Nome`, `Cognome`, `Sesso`, `Email`, `Password`,`DataNascita`, `Città`, `Foto`) 
VALUES ('mmarioRoss', 'Mario', 'Rossi', 'Maschio', 'marioRossi@hotmail.com', 'mario0', '1999-02-15', 'Toronto, Canada', '../images/face2.jpg');

INSERT INTO `persone` (`Username`, `Nome`, `Cognome`, `Sesso`, `Email`, `DataNascita`, `Città`, `Foto`, `Password`) 
VALUES ('ginaPina99', 'Gina', 'Pina', 'Femmina', 'ginaPina@hotmail.com', '1996-10-08', 'New York, USA', '../images/face1.jpg', 'gina1');

INSERT INTO `persone` (`Username`, `Nome`, `Cognome`, `Sesso`, `Email`, `DataNascita`, `Città`, `Foto`, `Password`) 
VALUES ('aaronP', 'aaron', 'Piper', 'Maschio', 'aaronPiper@hotmail.com', '1997-08-25', 'Madrid, Spagna', '../images/face3.png', 'aaron1');

INSERT INTO `persone` (`Username`, `Nome`, `Cognome`, `Sesso`, `Email`, `DataNascita`, `Città`, `Foto`, `Password`) 
VALUES ('gigi1', 'Gigi', 'Hadid', 'Femmina', 'gigiHadid@gmail.com', '1995-07-05', 'Los Angeles, USA', '../images/face4.jpg', '0000000');

INSERT INTO `persone` (`Username`, `Nome`, `Cognome`, `Sesso`, `Email`, `DataNascita`, `Città`, `Foto`, `Password`) 
VALUES ('harryphoto', 'Harry', 'Ross', 'Maschio', 'harryRoss@hotmail.com', '1994-02-02', 'London, UK', '../images/face5.jpg', '2222222');

--
--Riempimento Tabella post
--
INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `longitude`, `latitude`, `post_type`)
VALUES (1, `ginaPina99`, `../images/pic1.png`,`2022-01-09 10:12`,`Bello bello bello bello`,``,``,`luogo`);

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `longitude`, `latitude`, `post_type`)
VALUES (2, `ginaPina99`, `../images/pic2.png`,`2022-10-20 08:45`,`Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit.`,``,``, `luogo`);

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `longitude`, `latitude`, `post_type`)
VALUES (3, `ginaPina99`, `../images/face1.jpg`,`2023-02-01 02:45`,`Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit.`,``,``, `luogo`);

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `longitude`, `latitude`, `post_type`)
VALUES (4,`mmarioRoss`, `../images/pic1.png.jpg`,`2022-12-01 18:02`,`Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit.`,``,``, `luogo`);



--
--Riempimento Tabella post_type
--
INSERT INTO `post_type` (`post_type_id`,`post_type_name`)
VALUES (`01`,`Itinerario`);
INSERT INTO `post_type` (`post_type_id`,`post_type_name`)
VALUES (`02`,`Luogo`);
INSERT INTO `post_type` (`post_type_id`,`post_type_name`)
VALUES (`03`,`Cibo`);
INSERT INTO `post_type` (`post_type_id`,`post_type_name`)
VALUES (`04`,`Outfit`);
INSERT INTO `post_type` (`post_type_id`,`post_type_name`)
VALUES (`05`,`Tips_mezzi`);
INSERT INTO `post_type` (`post_type_id`,`post_type_name`)
VALUES (`06`,`Road_trip`);


--
--Riempimento Tabella post
--
INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`)
VALUES ('01', 'mmarioRoss', '../images/pic2.png', '2022-02-26 11:10:10.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('02', 'ginaPina99', '../images/pic1.png', '2022-10-08 15:20:04.000000', 'Omenare imperavi ameno. Dimere, dimere matiro. Matiremo. Ameno.', '2');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('03', 'ginaPina99', '../images/pic3.png', '2023-01-02 23:14:06.000000', 'Good day, good pic :)', '6');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('10', 'harryphoto', '../images/cibo5.jpg', '2023-02-13 19:59:38.000000', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '3');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('11', 'mmarioRoss', '../images/outfit2.jpg', '2022-08-22 15:18:40.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '4');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('12', 'mmarioRoss', '../images/itinerary.jpg', '2022-11-02 07:30:43.000000', 'Omenare imperavi ameno. Dimere, dimere matiro', '1');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`)
VALUES ('13', 'mmarioRoss', '../images/cibo4.jpg', '2023-01-13 12:05:50.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '3');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('14', 'mmarioRoss', '../images/cibo2.png', '2023-01-30 20:12:16.000000', 'Omenare imperavi emulari, ameno', '3');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('15', 'gigi1', '../images/cibo3.jpg', '2022-06-13 12:14:14.000000', 'Omenare imperavi emulari, ameno', '3');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('16', 'gigi1', '../images/outfit1.jpg', '2022-11-14 17:16:20.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '4');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('17', 'gigi1', '../images/transport2.jpg', '2022-12-13 18:20:47.000000', 'Omenare imperavi emulari, ameno', '5');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('18', 'gigi1', '../images/transport3.jpg', '2023-01-10 14:00:16.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '5');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('19', 'gigi1', '../images/outfit.png', '2023-01-30 20:21:29.000000', 'Omenare imperavi emulari, ameno', '4');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('20', 'aaronP', '../images/transport.jpg', '2022-06-13 15:23:29.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '5');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('21', 'aaronP', '../images/transport1.jpg', '2022-09-13 13:25:34.000000', 'Omenare imperavi emulari, ameno', '5');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('22', 'aaronP', '../images/road.jpg', '2023-02-13 20:27:47.000000', 'Omenare imperavi emulari, ameno. Ameno dori me', '6');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('23', 'harryphoto', '../images/road1.jpeg', '2023-02-12 15:28:50.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '6');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('24', 'aaronP', '../images/itinerary3.jpg', '2023-02-13 20:31:15.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '1');

INSERT INTO `post` (`post_id`, `created_by_user_id`, `media_file`, `created_time`, `caption`, `post_type`) 
VALUES ('25', 'harryphoto', '../images/itinerary.png', '2023-02-13 20:32:14.000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '1');
