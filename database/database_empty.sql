CREATE SCHEMA IF NOT EXISTS `stage_quest` DEFAULT CHARACTER SET utf8 ;
USE `stage_quest` ;


CREATE TABLE IF NOT EXISTS `stage_quest`.`locations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `country` VARCHAR(50) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `street` VARCHAR(50) NOT NULL,
  `postcode` VARCHAR(50) NOT NULL,
  `add_info` VARCHAR(100) NULL COMMENT '\'Address Details\'',
  `created_at` TIMESTAMP(6) NULL,
  `updated_at` TIMESTAMP(6) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(50) NOT NULL DEFAULT 'STUDENT',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(300) NOT NULL COMMENT '\'margin to hatch\'',
  `center` VARCHAR(50) NOT NULL,
  `promotion` VARCHAR(50) NULL,
  `roles_id` INT NOT NULL,
  `created_at` TIMESTAMP(6) NULL,
  `updated_at` TIMESTAMP(6) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_users_roles1_idx` (`roles_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `stage_quest`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`sectors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sector` VARCHAR(45) NOT NULL DEFAULT 'INFORMATIC',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`companies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `visibility` TINYINT(2) NULL,
  `sectors_id` INT NOT NULL,
  `created_at` TIMESTAMP(6) NULL,
  `updated_at` TIMESTAMP(6) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_companies_sectors1_idx` (`sectors_id` ASC) VISIBLE,
  CONSTRAINT `fk_companies_sectors1`
    FOREIGN KEY (`sectors_id`)
    REFERENCES `stage_quest`.`sectors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`evaluations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `note` DECIMAL NULL,
  `companies_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  `created_at` TIMESTAMP(6) NULL,
  `updated_at` TIMESTAMP(6) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_companies_id`
    FOREIGN KEY (`companies_id`)
    REFERENCES `stage_quest`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_id`
    FOREIGN KEY (`users_id`)
    REFERENCES `stage_quest`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;




CREATE TABLE IF NOT EXISTS `stage_quest`.`type_promotions` (
  `id` INT NOT NULL,
  `type_promotion` VARCHAR(45) NOT NULL DEFAULT 'CPIA2',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`status_internships` (
  `id` INT NOT NULL,
  `status` VARCHAR(20) NULL ,
  `created_at` TIMESTAMP(6) NULL,
  `updated_at` TIMESTAMP(6) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`internship_offers` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(50) NOT NULL,
    `duration_numerical` INT NOT NULL,
    `duration_unit` TINYINT(2) NOT NULL COMMENT '\'Store duration with value, unit : mois or semaine\'',
    `salary` DECIMAL NOT NULL,
    `num_place` INT NOT NULL COMMENT 'Number of place',
    `num_applicant` INT NOT NULL,
    `date` DATE NOT NULL COMMENT 'The start of the internship',
    `text` VARCHAR(5000) NOT NULL COMMENT '\'explain what the student will do\'',
    `type_promotions_id` INT NOT NULL,
    `status_id` INT NOT NULL,
    `location_id` INT NOT NULL,
    `companies_id` INT NOT NULL,
    `created_at` TIMESTAMP(6) NULL,
    `updated_at` TIMESTAMP(6) NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_internship_offers_type_promotions1_idx` (`type_promotions_id` ASC) VISIBLE,
    INDEX `fk_internship_offers_status1_idx` (`status_id` ASC) VISIBLE,
    INDEX `fk_internship_offers_companies1_idx` (`companies_id` ASC),
    CONSTRAINT `fk_internship_offers_type_promotions1` FOREIGN KEY (`type_promotions_id`) REFERENCES `stage_quest`.`type_promotions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_internship_offers_status1` FOREIGN KEY (`status_id`) REFERENCES `stage_quest`.`status_internships` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_internship_offers_companies1` FOREIGN KEY (`companies_id`) REFERENCES `stage_quest`.`companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;




CREATE TABLE IF NOT EXISTS `stage_quest`.`skills` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `skill` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`internship_offers_skills` (
  `skills_idskills` INT NOT NULL,
  `internship_offers_id` INT NOT NULL,
  PRIMARY KEY (`skills_idskills`, `internship_offers_id`),
  INDEX `fk_skills_has_internship_offers_internship_offers1_idx` (`internship_offers_id` ASC) VISIBLE,
  INDEX `fk_skills_has_internship_offers_skills1_idx` (`skills_idskills` ASC) VISIBLE,
  CONSTRAINT `fk_skills_has_internship_offers_skills1`
    FOREIGN KEY (`skills_idskills`)
    REFERENCES `stage_quest`.`skills` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_skills_has_internship_offers_internship_offers1`
    FOREIGN KEY (`internship_offers_id`)
    REFERENCES `stage_quest`.`internship_offers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`application` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cv` VARCHAR(100) NOT NULL,
  `cover_letter` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP(6) NULL,
  `updated_at` TIMESTAMP(6) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_users`
    FOREIGN KEY (`id`)
    REFERENCES `stage_quest`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_internship`
    FOREIGN KEY (`id`)
    REFERENCES `stage_quest`.`internship_offers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `stage_quest`.`wishlist` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `internship_offers_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  `created_at` TIMESTAMP(6) NULL,
  `updated_at` TIMESTAMP(6) NULL,
  INDEX `fk_internship_offers_has_users_users1_idx` (`users_id` ASC) VISIBLE,
  INDEX `fk_internship_offers_has_users_internship_offers1_idx` (`internship_offers_id` ASC) VISIBLE,
  CONSTRAINT `fk_internship_offers_has_users_internship_offers1`
    FOREIGN KEY (`internship_offers_id`)
    REFERENCES `stage_quest`.`internship_offers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_internship_offers_has_users_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `stage_quest`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `stage_quest`.`status_applications` (
  `id` INT NOT NULL,
  `application_id` INT NOT NULL,
  `created_at` TIMESTAMP(6) NULL,
  `updated_at` TIMESTAMP(6) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_status_applications_application1_idx` (`application_id` ASC) VISIBLE,
  CONSTRAINT `fk_status_applications_application1`
    FOREIGN KEY (`application_id`)
    REFERENCES `stage_quest`.`application` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;



ALTER TABLE `stage_quest`.`status_applications`
DROP FOREIGN KEY `fk_status_applications_application1`;
ALTER TABLE `stage_quest`.`status_applications`
DROP COLUMN `application_id`,
ADD COLUMN `status` VARCHAR(20) NOT NULL AFTER `id`,
DROP INDEX `fk_status_applications_application1_idx` ;
;

ALTER TABLE `stage_quest`.`internship_offers`
CHANGE COLUMN `num_applicant` `num_applicant` INT NULL ;



ALTER TABLE `stage_quest`.`internship_offers`
CHANGE COLUMN `num_applicant` `num_applicant` INT NULL;

ALTER TABLE `stage_quest`.`users`
ADD COLUMN `birthdate` DATE NULL AFTER `updated_at`;

ALTER TABLE `stage_quest`.`internship_offers`
CHANGE COLUMN `date` `date` DATE NULL COMMENT 'The start of the internship' ;

ALTER TABLE `stage_quest`.`users`
ADD COLUMN `visibility` TINYINT(2) NULL DEFAULT 1 AFTER `birthdate`;

ALTER TABLE `stage_quest`.`type_promotions`
ADD COLUMN `name_promotion` VARCHAR(45) NOT NULL DEFAULT 'TLPX00' AFTER `type_promotion`,
ADD COLUMN `speciality` VARCHAR(45) NOT NULL DEFAULT 'Informatique' AFTER `name_promotion`,
CHANGE COLUMN `type_promotion` `type_promotion` VARCHAR(45) NOT NULL DEFAULT 'A1' ;

ALTER TABLE `stage_quest`.`companies`
ADD COLUMN `body` VARCHAR(2500) NULL DEFAULT '\"\"' AFTER `updated_at`;

ALTER TABLE `stage_quest`.`application`
ADD COLUMN `offer_id` INT,
ADD COLUMN `user_id` INT,
ADD CONSTRAINT `fk_application_offer_id`
    FOREIGN KEY (`offer_id`)
    REFERENCES `stage_quest`.`internship_offers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_application_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `stage_quest`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

ALTER TABLE `stage_quest`.`application`
MODIFY COLUMN `cover_letter` TEXT;

drop table stage_quest.application;
CREATE TABLE stage_quest.application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cv VARCHAR(100),
    cover_letter TEXT,
    offer_id INT,
    user_id INT,
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (offer_id) REFERENCES internship_offers(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);