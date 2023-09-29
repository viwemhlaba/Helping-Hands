-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-sales-ordering-container:3306
-- Generation Time: Sep 15, 2023 at 03:00 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GRP-04-37-HELPINGHANDS`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `add_into_city` (IN `city_name` VARCHAR(255), IN `city_abr` VARCHAR(5))   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while inserting into city table';
    END;

    START TRANSACTION;

    INSERT INTO city (city_name, city_abr)
    VALUES (city_name, city_abr);


    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `assigned_patients_with_chronic_conditions` (IN `nurse_ID` INT(10))   BEGIN
    -- Retrieve and display assigned patients along with their chronic conditions
    SELECT
        cc.contract_number,
        cc.nurse_ID,
        cc.patient_ID,
        cc.care_contract_status,
        cc.contract_date,
        p.patient_ID,
        p.first_name AS patient_first_name,
        p.last_name AS patient_last_name,
        pc.patient_chronic_conditions_ID,
        pc.condition_ID,
        pc.patient_ID,
        c.condition_ID,
        c.condition_name,
        np.nurse_ID
    FROM
        care_contract cc
        JOIN patient_profile p ON cc.patient_ID = p.patient_ID
        JOIN nurse_profile np ON cc.nurse_ID = np.nurse_ID
        JOIN patient_chronic_conditions pc ON p.patient_ID = pc.patient_ID
        JOIN `condition` c ON pc.condition_ID = c.condition_ID
    WHERE
        cc.nurse_ID = nurse_ID
        AND cc.care_contract_status = 'A'
    GROUP BY
        cc.contract_number, p.patient_ID
    ORDER BY
        condition_name ASC;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `care_visits_for_patient` (IN `nurse_ID` INT, IN `care_contract_type` VARCHAR(10), IN `patient_ID` INT)   BEGIN
  
    
    -- Validate care_contract_type parameter
    IF care_contract_type <> 'A' AND care_contract_type <> 'C' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid care_contract_type parameter';
    END IF;
    
    

    -- Retrieve and display Care Visit details for the chosen Care Contract
    SELECT
        cv.care_visit_ID,
        cv.contract_number,
        cv.patient_ID,
        cv.nurse_ID,
        cv.wound_progress,
        cv.visit_notes,
        cv.visit_date,
        cv.visit_time,
        cv.appro_visit_time,
        cv.depart_time,
        np.nurse_ID,
        np.first_name AS nurse_name,
        np.last_name AS nurse_surname,
        p.patient_ID,
        p.first_name,
        p.last_name,
        cc.contract_number,
        cc.care_contract_status
    FROM
        care_visit cv
        JOIN nurse_profile np ON cv.nurse_ID = np.nurse_ID
        JOIN patient_profile p ON cv.patient_ID = p.patient_ID
        JOIN care_contract cc ON cv.contract_number = cc.contract_number
    WHERE
        cc.care_contract_status = care_contract_type
        AND np.nurse_ID = nurse_ID
        AND p.patient_ID = patient_ID
    ORDER BY
        cv.visit_date ASC;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `delete_into_city` (IN `city_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while deleting city table';
    END;

    START TRANSACTION;

    UPDATE city
    SET status = 'N'
    WHERE city_ID = city_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `delete_into_condition` (IN `condition_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating condition table';
    END;

    START TRANSACTION;

    UPDATE `condition`
    SET status = 'N'
    WHERE condition_ID = condition_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `delete_into_nurse_profile` (IN `nurse_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating patient_profile table';
    END;

    START TRANSACTION;

    UPDATE nurse_profile
    SET status = 'N'
    WHERE nurse_ID = nurse_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `delete_into_patient_chronic_conditions` (IN `patient_chronic_conditions_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating patient_chronic_conditions table';
    END;

    START TRANSACTION;

    UPDATE patient_chronic_conditions
    SET status = 'N'
    WHERE patient_chronic_conditions_ID = patient_chronic_conditions_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `delete_into_patient_profile` (IN `patient_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating patient_profile table';
    END;

    START TRANSACTION;

    UPDATE patient_profile
    SET status = 'N'
    WHERE patient_ID = patient_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `delete_into_prefered_nurse_suburb` (IN `prefered_nurse_suburb_ID_new` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating prefered_nurse_suburb table';
    END;

    START TRANSACTION;

    UPDATE prefered_nurse_suburb
    SET status = 'N'
    WHERE prefered_nurse_suburb_ID = prefered_nurse_suburb_ID_new;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `delete_into_suburb` (IN `suburb_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating suburb table';
    END;

    START TRANSACTION;

    UPDATE suburb
    SET status = 'N'
    WHERE suburb_ID = suburb_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `get_care_contract_by_contract_status` (IN `contract_status` VARCHAR(1), IN `care_contract_start_date` DATE, IN `care_contract_end_date` DATE)   BEGIN
    -- Validate START and END DATES
    IF care_contract_end_date < care_contract_start_date THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'End date must not be earlier than start date';
    END IF;

    -- Retrieve and display Care Contract details based on contract status and date range
    SELECT
        cc.contract_number,
        cc.nurse_ID,
        cc.contract_date,
        cc.care_start_date,
        cc.care_end_date,
        cc.care_contract_status,
        np.nurse_ID AS nurse_profile_ID,
        np.first_name,
        np.last_name
    FROM
        care_contract cc
        JOIN nurse_profile np ON cc.nurse_ID = np.nurse_ID
    WHERE
        (cc.care_contract_status = 'C' OR cc.care_contract_status = contract_status)
        AND cc.contract_date BETWEEN care_contract_start_date AND care_contract_end_date
    ORDER BY
        np.last_name ASC;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `get_list_of_nurses_per_suburb` (IN `suburb_ID` INT(10))   SELECT
    pn.prefered_nurse_suburb_ID,
    pn.user_ID AS preferred_user_ID,
    pn.suburb_ID AS preferred_suburb_ID,
    s.suburb_ID,
    s.city_ID,
    u.user_ID,
    u.email_address,
    u.contact_no,
    np.nurse_ID,
    np.first_name AS nurse_first_name,
    np.last_name AS nurse_last_name,
    np.nurse_code,
    np.gender,
    np.dob
FROM
    prefered_nurse_suburb pn
    JOIN suburb s ON pn.suburb_ID = s.suburb_ID
    JOIN user u ON pn.user_ID = u.user_ID
    JOIN nurse_profile np ON u.user_ID = np.user_ID
WHERE
    pn.suburb_ID = suburb_ID
ORDER BY
    nurse_last_name ASC$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `get_patient_care_contracts_and_visits` (IN `patient_ID` INT(10), IN `contract_status` VARCHAR(10))   BEGIN
    -- Display active PATIENTS, their CARE CONTRACTS, and associated CARE VISITS
    SELECT
        cc.contract_number,
        cc.patient_ID AS patient_ID_in_cc,
        cc.contract_date,
        cc.care_start_date,
        cc.care_end_date,
        cc.care_contract_status,
        cv.care_visit_ID,
        cv.nurse_ID,
        cv.contract_number AS cv_contract_number,
        cv.patient_ID AS patient_identify,
        cv.visit_date,
        p.patient_ID,
        p.user_ID,
        p.last_name AS patient_name,
        u.user_ID,
        u.status,
        np.nurse_ID,
        np.last_name AS nurse_name
    FROM
        care_contract cc
        JOIN care_visit cv ON cc.contract_number = cv.contract_number
        JOIN patient_profile p ON cc.patient_ID = p.patient_ID
        JOIN nurse_profile np ON cv.nurse_ID = np.nurse_ID
        JOIN user u ON p.user_ID = u.user_ID
    WHERE
        cc.patient_ID = patient_ID
        AND cc.care_contract_status = contract_status
        AND u.status = 'A'
    ORDER BY
        cc.care_contract_status ASC;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `insert_condition` (IN `condition_name_NEW` VARCHAR(255), IN `condition_description_NEW` VARCHAR(550))   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error occurred while inserting into condition table';
  END;

  START TRANSACTION;

  INSERT INTO `condition` (condition_name, condition_description)
  VALUES (condition_name_NEW, condition_description_NEW);

  COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `insert_into_nurse_profile` (IN `user_ID_NEW` INT, IN `suburb_ID_NEW` INT, IN `first_name_NEW` VARCHAR(255), IN `last_name_NEW` VARCHAR(255), IN `nurse_code_NEW` INT, IN `gender_NEW` VARCHAR(2), IN `id_number_NEW` INT, IN `dob_NEW` DATE)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error occurred while inserting into nurse_profile table';
  END;

  START TRANSACTION;

  INSERT INTO nurse_profile (user_ID, suburb_ID, first_name, last_name, nurse_code,
  gender, id_number, dob)
  VALUES (user_ID_NEW, suburb_ID_NEW, first_name_NEW, last_name_NEW, 
  nurse_code_NEW, gender_NEW, id_number_NEW, dob_NEW);

  COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `insert_into_patient_chronic_conditions` (IN `patient_ID_NEW` INT, IN `condition_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error occurred while inserting into patient_chronic_conditions table';
  END;

  START TRANSACTION;

  INSERT INTO patient_chronic_conditions (patient_ID, condition_ID )
  VALUES (patient_ID_NEW, condition_ID_NEW);

  COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `insert_into_patient_profile` (IN `user_ID_NEW` INT, IN `suburb_ID_NEW` INT, IN `first_name_NEW` VARCHAR(255), IN `last_name_NEW` VARCHAR(255), IN `gender_NEW` VARCHAR(2), IN `id_number_NEW` INT, IN `dob_NEW` DATE, IN `ec_person_NEW` VARCHAR(255), IN `ecp_number_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error occurred while inserting into patient_profile table';
  END;

  START TRANSACTION;

  INSERT INTO patient_profile (user_ID, suburb_ID, first_name, last_name, 
  gender, id_number, dob, ec_person, ecp_number)
  VALUES (user_ID_NEW, suburb_ID_NEW, first_name_NEW, last_name_NEW, 
  gender_NEW, id_number_NEW, dob_NEW, ec_person_NEW, ecp_number_NEW);

  COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `insert_into_prefered_nurse_suburb` (IN `user_ID_NEW` INT, IN `suburb_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error occurred while inserting into prefered_nurse_suburb table';
  END;

  START TRANSACTION;

  INSERT INTO prefered_nurse_suburb (user_ID, suburb_ID)
  VALUES (user_ID_NEW, suburb_ID_NEW);

  COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `insert_into_suburb` (IN `suburb_name` VARCHAR(255), IN `postal_code` VARCHAR(10), IN `city_ID` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error occurred while inserting into suburb table';
  END;

  START TRANSACTION;

  INSERT INTO suburb (suburb_name, postal_code, city_ID)
  VALUES (suburb_name, postal_code, city_ID);

  COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `list_care_visits_per_nurse` (IN `vsit_date_from` DATE, IN `vsit_date_to` DATE, IN `nurse_ID` INT)   BEGIN
    -- Validate START and END DATES
    IF vsit_date_to < vsit_date_from THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'End date must not be earlier than start date';
    END IF;

    -- Retrieve and display Care Visits carried out by each nurse during the date range
    SELECT
        cv.care_visit_ID,
        cv.nurse_ID,
        cv.patient_ID,
        cv.contract_number,
        cv.visit_date,
        cv.visit_time,
        cv.depart_time,
        np.nurse_ID AS nurse_identify,
        np.first_name AS nurse_name,
        np.last_name AS nurse_surname,
        p.patient_ID AS patient_identify,
        p.first_name AS patient_name,
        p.last_name AS patient_surname,
        cn.contract_number AS contract_identify,
        cn.care_start_date,
        cn.care_end_date,
        cn.care_contract_status
    FROM
        care_visit cv
        JOIN nurse_profile np ON cv.nurse_ID = np.nurse_ID
        JOIN patient_profile p ON cv.patient_ID = p.patient_ID
        JOIN care_contract cn ON cv.contract_number = cn.contract_number
    WHERE
        cv.nurse_ID = nurse_ID
        AND cv.visit_date BETWEEN vsit_date_from AND vsit_date_to
    ORDER BY
        nurse_surname ASC, cv.visit_date ASC, cv.visit_time ASC;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `nurse_month_week_visits` (IN `nurse_ID` INT, IN `start_date` DATE, IN `end_date` DATE, IN `view_mode` VARCHAR(10))   BEGIN
  DECLARE today DATE;
  SET today = CURDATE();

  -- VALIDATE START_DATE AND END_DATE --
    IF end_date < start_date THEN
      SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'End date must not be earlier than start date';
    END IF;

    IF start_date < today THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Start date must be from the current date or later';
    END IF;


    -- Filter visits based on view_mode (WEEK / MONTH)
    IF view_mode = 'WEEK' THEN
        SET start_date = DATE_ADD(start_date, INTERVAL -WEEKDAY(start_date) DAY);
        SET end_date = DATE_ADD(end_date, INTERVAL 6 - WEEKDAY(end_date) DAY);
    ELSEIF view_mode = 'MONTH' THEN
        SET start_date = DATE_SUB(start_date, INTERVAL DAYOFMONTH(start_date) - 1 DAY);
        SET end_date = LAST_DAY(end_date);
    END IF;

    SELECT
      cv.care_visit_ID,
      cv.contract_number,
      cv.patient_ID,
      cv.nurse_ID,
      cv.wound_progress,
      cv.visit_notes,
      cv.visit_date,
      cv.visit_time,
      cv.appro_visit_time,
      cv.depart_time,
      np.nurse_ID AS nurse_identify,
      np.first_name AS nurse_name,
      np.last_name AS nurse_surname,
      np.nurse_code,
      p.patient_ID AS patient_identify,
      p.first_name AS patient_name,
      p.last_name AS patient_surname,
      cc.contract_number,
      cc.contract_date
    FROM
      care_visit cv
      JOIN nurse_profile np ON cv.nurse_ID = np.nurse_ID
      JOIN patient_profile p ON cv.patient_ID = p.patient_ID
      JOIN care_contract cc ON cv.contract_number = cc.contract_number
    WHERE
      cv.nurse_ID = nurse_ID
      AND cv.visit_date BETWEEN start_date AND end_date
    ORDER BY
        cv.visit_date ASC;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `patient_care_contracts_assigned` (IN `nurse_ID` INT)   BEGIN
    SELECT
        cc.contract_number,
        cc.nurse_ID,
        cc.patient_ID,
        cc.care_contract_status,
        cc.contract_date,
        np.nurse_ID AS nurse_identify,
        np.last_name AS nurse_surname,
        np.first_name AS nurse_name,
        np.nurse_code,
        p.patient_ID AS patient_identify,
        p.first_name AS patient_name,
        p.last_name AS patient_surname
    FROM
        care_contract cc
        JOIN patient_profile p ON cc.patient_ID = p.patient_ID
        JOIN nurse_profile np ON cc.nurse_ID = np.nurse_ID
    WHERE
        cc.nurse_ID = nurse_ID
        AND cc.care_contract_status = 'A'
    ORDER BY
        p.last_name ASC;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `read_into_city` (IN `city_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while reading from city table';
    END;

    START TRANSACTION;

    SELECT * FROM city WHERE city_ID = city_ID_NEW;

END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `read_into_condition` (IN `condition_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while reading from condition table';
    END;

    START TRANSACTION;

    SELECT * FROM `condition` WHERE condition_ID = condition_ID_NEW;

END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `read_into_nurse_profile` (IN `nurse_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while reading from patient_profile table';
    END;

    START TRANSACTION;

    SELECT * FROM nurse_profile WHERE nurse_ID = nurse_ID_NEW;

END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `read_into_patient_chronic_conditions` (IN `patient_chronic_conditions_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while reading from patient_chronic_conditions  table';
    END;

    START TRANSACTION;

    SELECT * FROM patient_chronic_conditions WHERE patient_chronic_conditions_ID = patient_chronic_conditions_ID_NEW;

END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `read_into_patient_profile` (IN `patient_ID_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while reading from patient_profile table';
    END;

    START TRANSACTION;

    SELECT * FROM patient_profile WHERE patient_ID = patient_ID_NEW;

END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `read_into_prefered_nurse_suburb` (IN `prefered_nurse_suburb_ID_new` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while reading from prefered_nurse_suburb table';
    END;

    START TRANSACTION;

    SELECT * FROM prefered_nurse_suburb WHERE prefered_nurse_suburb_ID = prefered_nurse_suburb_ID_new;

END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `read_into_suburb` (IN `suburb_ID_new` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while reading from suburb table';
    END;

    START TRANSACTION;

    SELECT * FROM suburb WHERE suburb_ID = suburb_ID_new;

END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `update_into_city` (IN `city_ID_NEW` INT, IN `new_city_name` VARCHAR(255), IN `new_city_abr` VARCHAR(5))   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    ROLLBACK;
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Error occurred while updating city table';
  END;

  START TRANSACTION;

  -- Logic to determine new_city_abr based on new_city_name
  -- You need to implement the logic to generate the abbreviation from the name

  UPDATE city
  SET city_name = new_city_name, city_abr = new_city_abr
  WHERE city_ID = city_ID_NEW;

  COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `update_into_condition` (IN `condition_name_NEW` VARCHAR(255), IN `condition_description_NEW` VARCHAR(550))   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating condition table';
    END;

    START TRANSACTION;

    UPDATE `condition`
    SET condition_name = condition_name_NEW, condition_description = condition_description_NEW
    WHERE condition_ID = condition_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `update_into_nurse_profile` (IN `nurse_ID_NEW` INT, IN `user_ID_NEW` INT, IN `suburb_ID_NEW` INT, IN `first_name_NEW` VARCHAR(255), IN `last_name_NEW` VARCHAR(255), IN `nurse_code_NEW` INT, IN `gender_NEW` VARCHAR(2), IN `id_number_NEW` INT, IN `dob_NEW` DATE)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating patient_profile table';
    END;

    START TRANSACTION;

    UPDATE nurse_profile
    SET user_ID = user_ID_new, suburb_ID = suburb_ID_new, first_name = first_name_NEW, 
    last_name = last_name_NEW, nurse_code = nurse_code_NEW, gender = gender_NEW, id_number = id_number_NEW, dob = dob_NEW
    WHERE nurse_ID = nurse_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `update_into_patient_chronic_conditions` (IN `patient_chronic_conditions_ID_NEW` INT, IN `patient_ID_NEW` INT, IN `condition_ID_NEW` INT, IN `status_new` VARCHAR(1))   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating patient_profile table';
    END;

    START TRANSACTION;

    UPDATE patient_profile
    SET patient_chronic_conditions_ID = patient_chronic_conditions_ID_NEW, patient_ID = patient_ID_NEW, condition_ID = condition_ID_NEW, status = status_new
    WHERE patient_chronic_conditions_ID = patient_chronic_conditions_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `update_into_patient_profile` (IN `patient_ID_NEW` INT, IN `user_ID_NEW` INT, IN `suburb_ID_NEW` INT, IN `first_name_NEW` VARCHAR(255), IN `last_name_NEW` VARCHAR(255), IN `gender_NEW` VARCHAR(1), IN `id_number_NEW` INT, IN `dob_NEW` DATE, IN `ec_person_NEW` VARCHAR(255), IN `ecp_number_NEW` INT)   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating patient_profile table';
    END;

    START TRANSACTION;

    UPDATE patient_profile
    SET user_ID = user_ID_new, suburb_ID = suburb_ID_new, first_name = first_name_NEW, last_name = last_name_NEW, gender = gender_NEW, id_number = id_number_NEW, dob = dob_NEW, ec_person = ec_person_NEW, ecp_number = ecp_number_NEW
    WHERE patient_ID = patient_ID_NEW;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `update_into_prefered_nurse_suburb` (IN `prefered_nurse_suburb_ID_new` INT, IN `user_ID_new` INT, IN `suburb_ID_new` INT, IN `status_new` VARCHAR(1))   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating prefered_nurse_suburb table';
    END;

    START TRANSACTION;

    UPDATE prefered_nurse_suburb
    SET user_ID = user_ID_new, suburb_ID = suburb_ID_new, status = status_new
    WHERE prefered_nurse_suburb_ID = prefered_nurse_suburb_ID_new;

    COMMIT;
END$$

CREATE DEFINER=`GRP-04-37-HELPINGHANDS`@`%` PROCEDURE `update_into_suburb` (IN `suburb_ID_NEW` INT, IN `city_ID_new` INT, IN `new_suburb_name` VARCHAR(255), IN `new_postal_code` INT(10), IN `new_status` VARCHAR(1))   BEGIN
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error occurred while updating suburb table';
    END;

    START TRANSACTION;

    UPDATE suburb
    SET suburb_name = new_suburb_name, postal_code = new_postal_code, city_ID = city_ID_new, status = new_status
    WHERE suburb_ID = suburb_ID_NEW;

    COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `care_contract`
--

CREATE TABLE `care_contract` (
  `contract_number` int UNSIGNED NOT NULL,
  `patient_ID` int UNSIGNED NOT NULL,
  `nurse_ID` int UNSIGNED DEFAULT NULL,
  `suburb_ID` int UNSIGNED NOT NULL,
  `wound_description` varchar(255) NOT NULL,
  `contract_date` date NOT NULL,
  `care_start_date` date DEFAULT NULL,
  `care_end_date` date DEFAULT NULL,
  `care_contract_status` enum('N','A','C') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `care_contract`
--

INSERT INTO `care_contract` (`contract_number`, `patient_ID`, `nurse_ID`, `suburb_ID`, `wound_description`, `contract_date`, `care_start_date`, `care_end_date`, `care_contract_status`) VALUES
(2, 2, 3, 16, 'Wound located on vertebrae. Size 5 cm x 3 cm. Red granulation tissue present.', '2023-04-20', '2023-05-01', '2023-05-30', 'C'),
(3, 2, 3, 19, 'Pressure sore on left heel.', '2023-06-19', '2023-07-23', NULL, 'A'),
(4, 3, NULL, 6, 'Deep laceration on left forearm. Tendon damage.  Inflamed and painful.', '2023-08-04', NULL, NULL, 'N'),
(5, 4, 3, 16, 'Pressure sore on sacrum.', '2023-04-20', '2023-04-22', '2023-05-15', 'C'),
(6, 4, 2, 14, 'Ulcer on right shin', '2023-08-04', '2023-08-05', NULL, 'A'),
(7, 5, 2, 14, '3rd degree burns on back and left arm.', '2023-06-01', '2023-06-03', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `care_visit`
--

CREATE TABLE `care_visit` (
  `care_visit_ID` int UNSIGNED NOT NULL,
  `contract_number` int UNSIGNED NOT NULL,
  `patient_ID` int UNSIGNED NOT NULL,
  `nurse_ID` int UNSIGNED NOT NULL,
  `wound_progress` varchar(255) DEFAULT NULL,
  `visit_notes` varchar(255) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `appro_visit_time` time NOT NULL,
  `visit_time` time DEFAULT NULL,
  `depart_time` time DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `care_visit`
--

INSERT INTO `care_visit` (`care_visit_ID`, `contract_number`, `patient_ID`, `nurse_ID`, `wound_progress`, `visit_notes`, `visit_date`, `appro_visit_time`, `visit_time`, `depart_time`, `status`) VALUES
(2, 2, 2, 3, 'Wound infected.  Debridement of necrotic tissue.  Dressing changed.', 'Needs antibiotic. Debridement of necrotic tissue.  Dressing changed.', '2023-05-01', '08:00:00', '08:00:00', '08:45:00', 'A'),
(3, 2, 2, 3, 'Wound size reduced to 3 cm x 2 cm.', 'Explained importance of keeping wound clean & dry.', '2023-05-05', '10:00:00', '10:10:00', '11:00:00', 'A'),
(4, 2, 2, 3, 'Wound size reduced to 2cm x 1cm.', 'Cleaned wound with saline, applied antibiotic cream.  New dressing', '2023-05-12', '14:00:00', '14:00:00', '14:45:00', 'A'),
(5, 2, 2, 3, 'Wound has significantly reduced in size. No infection noted.', 'Cleaned wound with saline. New dressing.', '2023-05-25', '15:30:00', '15:45:00', '16:30:00', 'A'),
(6, 2, 2, 3, 'Wound has almost healed.', 'Instructed patient on how to treat wound.  No more visits required.', '2023-05-10', '08:30:00', '08:30:00', '09:00:00', 'A'),
(7, 3, 2, 3, 'Approximately 1cm in diameter. Shallow open wound with pinkish base & slight drainage. Skin around sore is intact but show some erythema.', 'Gently cleaned the pressure sore with normal saline solution to remove debris and ensure a clean wound bed. Applied sterile dressing.', '2023-07-23', '08:00:00', '08:05:00', '08:50:00', 'A'),
(8, 3, 2, 3, 'Wound unchanged from last visit. The erythema around the wound has slightly improved.', 'Cleaned and dressed wound.', '2023-07-26', '10:00:00', '10:10:00', '11:00:00', 'A'),
(9, 3, 2, 3, NULL, NULL, '2023-08-26', '10:00:00', NULL, NULL, 'A'),
(10, 5, 4, 3, '3cm x 2cm x 1cm stage 3 pressure sore. Wound base dark red with yellow-green discharge.', 'Peri wound skin red, tender to palpitation.  Wound culture ordered. Wound cleansed & hydrocolloid dressing applied.', '2023-04-22', '08:00:00', '08:00:00', '08:45:00', 'A'),
(11, 5, 4, 3, 'Sign of dead tissue. Wound decreased in size 2cm x 1cm x 0.5cm', 'Dead tissue removed.  Wound cleaned.  Antibacterial ointment applied.  New dressing.', '2023-04-26', '10:00:00', '10:10:00', '11:00:00', 'A'),
(12, 5, 4, 3, 'Wound size reduced to 2cm x 1cm.', 'Cleaned wound with saline, applied antibiotic cream.  New dressing', '2023-05-01', '14:00:00', '14:00:00', '14:45:00', 'A'),
(13, 5, 4, 3, 'Wound contraction present.', 'Cleaned wound with saline. New dressing. Advised on pressure relieving measures.', '2023-05-05', '15:30:00', '15:45:00', '16:30:00', 'A'),
(14, 5, 4, 3, 'Wound has almost healed.', 'Instructed patient on how to treat wound.  No more visits required.', '2023-05-12', '16:00:00', '16:10:00', '17:00:00', 'A'),
(15, 6, 4, 2, 'Wound infected.  Pain experiencing pain.  Wound dressing dirty. Wound size 2cm x 2cm', 'Cleaned wound with antiseptic. \r\nApplied antibiotic ointment.  New dressing.\r\n', '2023-08-02', '10:00:00', '10:00:00', '10:30:00', 'A'),
(16, 6, 4, 3, '', '', '2023-08-05', '08:00:00', '08:15:00', '08:45:00', 'A'),
(17, 6, 4, 2, NULL, NULL, '2023-08-12', '11:00:00', NULL, NULL, 'A'),
(18, 7, 5, 2, 'Skin appears charred, leathery, and white. Areas of the burn on shoulder are swollen. Experiencing difficulty moving left shoulder & arm', 'Cleaned wounds.  Debrided non-viable tissue.  Used hydrogel dressings.  Administered pain medication. Recommend tetanus injection.', '2023-07-23', '08:30:00', '08:30:00', '09:45:00', 'A'),
(19, 7, 5, 2, 'Assessed burn progress.  Necrosis & sloughing.', 'Removed dead skin. Cleaned wound.  Applied ointment.  Replaced dressing. ', '2023-07-30', '08:00:00', '08:15:00', '09:00:00', 'A'),
(20, 7, 5, 2, 'Signs of new tissue generating. Wound size decreasing.', 'Cleaned wounds.  Applied new dressings. Assisted patient with mobility exercises.', '2023-08-01', '11:00:00', '10:50:00', '11:50:00', 'A'),
(21, 7, 5, 2, NULL, NULL, '2023-08-12', '09:00:00', NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_ID` int UNSIGNED NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `city_abr` varchar(5) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_ID`, `city_name`, `city_abr`, `status`) VALUES
(1, 'Port Elizabeth', 'PE', 'A'),
(2, 'Durban', 'DBN', 'A'),
(4, 'East London EC', 'ELCO', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE `condition` (
  `condition_ID` int UNSIGNED NOT NULL,
  `condition_name` varchar(25) NOT NULL,
  `condition_description` varchar(500) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`condition_ID`, `condition_name`, `condition_description`, `status`) VALUES
(2, 'Hyperthyroidism', 'A condition that occurs when the thyroid gland makes more thyroid hormones than the body needs. ', 'A'),
(3, 'Sciatica', 'Sciatica is a debilitating condition that is a result of the sciatic nerve or sciatic nerve root pathology. Sciatica pain often is worsened with twisting, bending, or coughing.', 'A'),
(4, 'Asthma', 'Asthma is a chronic lung disease affecting people of all ages. Symptoms can include coughing, wheezing, shortness of breath and chest tightness.', 'A'),
(5, 'Migraine', 'A migraine is a headache that can cause severe throbbing pain or a pulsing sensation, usually on one side of the head. Its often accompanied by nausea, vomiting, and extreme sensitivity to light and sound.', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `read_status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `created_at`, `read_status`) VALUES
(1, 'hey', '2023-09-04 14:19:31', 1),
(2, 'hey', '2023-09-04 14:19:34', 1),
(3, 'viwe', '2023-09-04 14:21:22', 1),
(4, 'yesssssss', '2023-09-04 14:21:22', 1),
(5, 'test', '2023-09-04 14:24:39', 1),
(6, 'testing', '2023-09-04 14:24:39', 1),
(7, 'okay new', '2023-09-04 14:31:10', 1),
(8, 'yes new', '2023-09-04 14:31:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nurse_profile`
--

CREATE TABLE `nurse_profile` (
  `nurse_ID` int UNSIGNED NOT NULL,
  `user_ID` int UNSIGNED NOT NULL,
  `suburb_ID` int UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nurse_code` int NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `id_number` bigint NOT NULL,
  `dob` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nurse_profile`
--

INSERT INTO `nurse_profile` (`nurse_ID`, `user_ID`, `suburb_ID`, `first_name`, `last_name`, `nurse_code`, `gender`, `id_number`, `dob`, `status`) VALUES
(2, 9, 4, 'Dorothy', 'Daniels', 202322, 'F', 9202204720082, '1992-02-22', 'A'),
(3, 10, 4, 'Marcel', 'Van Niekerk', 202323, 'M', 8409114567658, '1984-09-11', 'A'),
(4, 15, 6, 'Vanessa', 'Meintjies', 202324, 'F', 550921499859, '1955-09-21', 'A'),
(5, 11, 6, 'Lesedi', 'Moloi', 202325, 'F', 6509164998658, '1965-09-16', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `password_reset_tokens_ID` int UNSIGNED NOT NULL,
  `user_ID` int UNSIGNED NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`password_reset_tokens_ID`, `user_ID`, `email_address`, `token`, `created_at`) VALUES
(13, 17, 'viwemhlabavm@gmail.com', 'f061cecfc66659a15f43a8b50a2101e0a52fa7100971eb9bed82648f2f83b0fe', '2023-09-01 15:30:40'),
(14, 17, 'viwemhlabavm@gmail.com', 'f3ce67d0af25f89648dc22ff0c1243eb6316cec220c8674ae0c7f8b8736e386d', '2023-09-13 16:33:18'),
(15, 17, 'viwemhlabavm@gmail.com', 'b13a818c73346452b2fe2a410f3b7eb91bd1bfc63a9e1ad20b065d1acbeba091', '2023-09-13 16:34:37'),
(16, 17, 'viwemhlabavm@gmail.com', '5f39e50a4a1696a770ff8a042b456e7b2a164953f750b3e207359283206a4b7e', '2023-09-13 16:42:17'),
(17, 8, 'mpenny@gmail.com', 'b19f743e465c7107637d70303be12f9aff1718dfeb02abaaf863659073fc07df', '2023-09-15 14:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `patient_chronic_conditions`
--

CREATE TABLE `patient_chronic_conditions` (
  `patient_chronic_conditions_ID` int UNSIGNED NOT NULL,
  `patient_ID` int UNSIGNED NOT NULL,
  `condition_ID` int UNSIGNED NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient_chronic_conditions`
--

INSERT INTO `patient_chronic_conditions` (`patient_chronic_conditions_ID`, `patient_ID`, `condition_ID`, `status`) VALUES
(2, 2, 2, 'A'),
(3, 2, 3, 'A'),
(4, 3, 2, 'A'),
(5, 3, 4, 'A'),
(6, 4, 5, 'A'),
(7, 4, 4, 'A'),
(8, 4, 3, 'A'),
(9, 5, 2, 'A'),
(10, 5, 4, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

CREATE TABLE `patient_profile` (
  `patient_ID` int UNSIGNED NOT NULL,
  `user_ID` int UNSIGNED NOT NULL,
  `suburb_ID` int UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `id_number` bigint NOT NULL,
  `dob` date NOT NULL,
  `ec_person` varchar(255) NOT NULL,
  `ecp_number` int NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient_profile`
--

INSERT INTO `patient_profile` (`patient_ID`, `user_ID`, `suburb_ID`, `first_name`, `last_name`, `gender`, `id_number`, `dob`, `ec_person`, `ecp_number`, `status`) VALUES
(2, 16, 6, 'Carlos', 'Andrade', 'M', 5508105317080, '1995-08-10', 'Elzunia Andrade', 732458796, 'A'),
(3, 12, 6, 'Kabelo', 'Padi', 'M', 7112155317059, '1971-12-15', 'Sipho Kuhle', 712458796, 'A'),
(4, 13, 5, 'Pulane', 'Masemola', 'F', 9110126654083, '1991-10-12', 'Mandisa Bala', 632458796, 'A'),
(5, 14, 5, 'Melanie', 'Mack', 'F', 6010089887086, '1960-10-08', 'Kevin Mack', 822458796, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `prefered_nurse_suburb`
--

CREATE TABLE `prefered_nurse_suburb` (
  `prefered_nurse_suburb_ID` int UNSIGNED NOT NULL,
  `user_ID` int UNSIGNED NOT NULL,
  `suburb_ID` int UNSIGNED NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prefered_nurse_suburb`
--

INSERT INTO `prefered_nurse_suburb` (`prefered_nurse_suburb_ID`, `user_ID`, `suburb_ID`, `status`) VALUES
(2, 9, 14, 'A'),
(3, 9, 18, 'A'),
(4, 10, 14, 'A'),
(5, 10, 19, 'A'),
(6, 10, 16, 'A'),
(7, 15, 15, 'A'),
(8, 15, 6, 'A'),
(9, 11, 9, 'A'),
(10, 11, 8, 'A'),
(11, 11, 18, 'A'),
(12, 11, 14, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `suburb`
--

CREATE TABLE `suburb` (
  `suburb_ID` int UNSIGNED NOT NULL,
  `city_ID` int UNSIGNED NOT NULL,
  `suburb_name` varchar(255) NOT NULL,
  `postal_code` int NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suburb`
--

INSERT INTO `suburb` (`suburb_ID`, `city_ID`, `suburb_name`, `postal_code`, `status`) VALUES
(4, 1, 'Bridgemead', 6025, 'A'),
(5, 1, 'Humewood', 6001, 'A'),
(6, 1, 'Algoa Park', 6001, 'A'),
(7, 1, 'Cotswold', 6070, 'A'),
(8, 2, 'Glenmore', 4001, 'A'),
(9, 1, 'Lorraine', 6070, 'A'),
(10, 2, 'Kwamashu', 4359, 'A'),
(11, 2, 'Inanda', 4309, 'A'),
(12, 1, 'Struandale', 4399, 'A'),
(13, 2, 'Tongaat', 6070, 'A'),
(14, 1, 'Walmer', 6070, 'A'),
(15, 1, 'Malabar', 6020, 'A'),
(16, 1, 'Summerstrand', 6001, 'A'),
(17, 1, 'Summerwood', 6001, 'A'),
(18, 1, 'Charlo', 6070, 'A'),
(19, 1, 'South End', 6001, 'A'),
(21, 4, 'mankind', 1234, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` int NOT NULL,
  `user_type` enum('A','P','N','O') NOT NULL,
  `status` enum('A','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `read_status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `username`, `email_address`, `password`, `contact_no`, `user_type`, `status`, `created_at`, `read_status`) VALUES
(7, 'Admin', 'helpinghands@gmail.com', '$2y$10$43aXkhDvp/dO44NruLp21.ULsi1yFzwhEuPk6glgmqaNTYSjI2KJW', 682581235, 'A', 'A', '2023-09-04 14:36:03', 1),
(8, 'MonPen', 'mpenny@gmail.com', '$2y$10$LolwsrbIt8j4B0CeQk1qnuC7vnmwo/dGGpKOPikrVNXAATSnbWvgm', 712351212, 'O', 'A', '2023-09-04 14:36:03', 1),
(9, 'DorDan', 'dorothy@gmail.com', '$2y$10$EGfoiwpdFciyNnbK03lk.Olqt2.IBSZwu1vLsrYyv/syJD908aDHu', 849095263, 'N', 'A', '2023-09-04 14:36:03', 1),
(10, 'MarVan', 'marcel@gmail.com', '$2y$10$eU9N1SxLbz28nwmWaEWWveBK5JvQa.p5Sca.X9tzWkJZ5K02F1NBW', 782368578, 'N', 'A', '2023-09-04 14:36:03', 1),
(11, 'LesMol', 'Lesedi@gmail.com', '$2y$10$PT0NMow6DI2RviYV9tUz5ONKJVp9TmbeZMiIdCLhNbga2bi/GAnEK', 798549874, 'N', 'A', '2023-09-04 14:36:03', 1),
(12, 'KabPad', 'kabeloP@gmail.com', '$2y$10$pWJmK7kgLUJ0i8alCypUEujWF8Ss/Z0ouN5lHyWZvWwhgEgCJGvke', 742458796, 'P', 'A', '2023-09-04 14:36:03', 1),
(13, 'PulMas', 'pulaneM@gmail.com', '$2y$10$xFZgfMtBxOkou3Z2cvDo5uhecsvWm.Y0/m0Hon30ch9wJnD92UQEa', 64245896, 'P', 'A', '2023-09-04 14:36:03', 1),
(14, 'MelMac', 'melanieM@gmail.com', '$2y$10$Y6cj421FNNm7hFXtGgLH6u5Ot75.fmt2gsn93IsovSFsTdOrjuk6q', 726068715, 'P', 'A', '2023-09-04 14:36:03', 1),
(15, 'VanMei', 'vanessa@gmail.com', '$2y$10$eU9N1SxLbz28nwmWaEWWveBK5JvQa.p5Sca.X9KJLOYJJKHIF1NBW', 123456789, 'N', 'A', '2023-09-04 14:36:03', 1),
(16, 'CarAnd', 'carlosA@gmail.com', '$2y$10$RS8sjONfaB2HfBIfrKtSZudRhqQ8Cjjnqsn.wk9ExPFnAmxw8ylrG', 842458769, 'P', 'A', '2023-09-04 14:36:03', 1),
(17, 'ViweTest', 'viwemhlabavm@gmail.com', '$2y$10$tE6m8/FLqS5HeI9//XTyk.yQM7xTNdOIyq55eeZ8KkoXGByBquQPC', 671023499, 'A', 'A', '2023-09-04 14:36:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `care_contract`
--
ALTER TABLE `care_contract`
  ADD PRIMARY KEY (`contract_number`),
  ADD KEY `fk_patient_contract` (`patient_ID`),
  ADD KEY `fk_nurse_contract` (`nurse_ID`),
  ADD KEY `fk_suburb_contract` (`suburb_ID`);

--
-- Indexes for table `care_visit`
--
ALTER TABLE `care_visit`
  ADD PRIMARY KEY (`care_visit_ID`),
  ADD KEY `fk_patient_care_visit` (`patient_ID`),
  ADD KEY `fk_nurse_care_visit` (`nurse_ID`),
  ADD KEY `fk_contract_number_care_visit` (`contract_number`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_ID`);

--
-- Indexes for table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`condition_ID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_profile`
--
ALTER TABLE `nurse_profile`
  ADD PRIMARY KEY (`nurse_ID`),
  ADD KEY `fk_nurse_profile_user` (`user_ID`),
  ADD KEY `fk_nurse_profile_suburb` (`suburb_ID`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`password_reset_tokens_ID`),
  ADD KEY `fk_user_ID_pass_reset` (`user_ID`);

--
-- Indexes for table `patient_chronic_conditions`
--
ALTER TABLE `patient_chronic_conditions`
  ADD PRIMARY KEY (`patient_chronic_conditions_ID`),
  ADD KEY `fk_user_chronic_id` (`patient_ID`),
  ADD KEY `fk_user_chronic_condition` (`condition_ID`);

--
-- Indexes for table `patient_profile`
--
ALTER TABLE `patient_profile`
  ADD PRIMARY KEY (`patient_ID`),
  ADD KEY `fk_patient_profile_user` (`user_ID`),
  ADD KEY `fk_patient_profile_suburb` (`suburb_ID`);

--
-- Indexes for table `prefered_nurse_suburb`
--
ALTER TABLE `prefered_nurse_suburb`
  ADD PRIMARY KEY (`prefered_nurse_suburb_ID`),
  ADD KEY `fk_pre_nurse` (`user_ID`),
  ADD KEY `fk_pre_nurse_suburb` (`suburb_ID`);

--
-- Indexes for table `suburb`
--
ALTER TABLE `suburb`
  ADD PRIMARY KEY (`suburb_ID`),
  ADD KEY `fk_suburb_city` (`city_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `care_contract`
--
ALTER TABLE `care_contract`
  MODIFY `contract_number` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `care_visit`
--
ALTER TABLE `care_visit`
  MODIFY `care_visit_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `condition_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nurse_profile`
--
ALTER TABLE `nurse_profile`
  MODIFY `nurse_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `password_reset_tokens_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patient_chronic_conditions`
--
ALTER TABLE `patient_chronic_conditions`
  MODIFY `patient_chronic_conditions_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_profile`
--
ALTER TABLE `patient_profile`
  MODIFY `patient_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prefered_nurse_suburb`
--
ALTER TABLE `prefered_nurse_suburb`
  MODIFY `prefered_nurse_suburb_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suburb`
--
ALTER TABLE `suburb`
  MODIFY `suburb_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `care_contract`
--
ALTER TABLE `care_contract`
  ADD CONSTRAINT `fk_nurse_contract` FOREIGN KEY (`nurse_ID`) REFERENCES `nurse_profile` (`nurse_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_patient_contract` FOREIGN KEY (`patient_ID`) REFERENCES `patient_profile` (`patient_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_suburb_contract` FOREIGN KEY (`suburb_ID`) REFERENCES `suburb` (`suburb_ID`) ON DELETE CASCADE;

--
-- Constraints for table `care_visit`
--
ALTER TABLE `care_visit`
  ADD CONSTRAINT `fk_contract_number_care_visit` FOREIGN KEY (`contract_number`) REFERENCES `care_contract` (`contract_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_nurse_care_visit` FOREIGN KEY (`nurse_ID`) REFERENCES `nurse_profile` (`nurse_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_patient_care_visit` FOREIGN KEY (`patient_ID`) REFERENCES `patient_profile` (`patient_ID`) ON DELETE CASCADE;

--
-- Constraints for table `nurse_profile`
--
ALTER TABLE `nurse_profile`
  ADD CONSTRAINT `fk_nurse_profile_suburb` FOREIGN KEY (`suburb_ID`) REFERENCES `suburb` (`suburb_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_nurse_profile_user` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE;

--
-- Constraints for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD CONSTRAINT `fk_user_ID_pass_reset` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE;

--
-- Constraints for table `patient_chronic_conditions`
--
ALTER TABLE `patient_chronic_conditions`
  ADD CONSTRAINT `fk_user_chronic_condition` FOREIGN KEY (`condition_ID`) REFERENCES `condition` (`condition_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_chronic_id` FOREIGN KEY (`patient_ID`) REFERENCES `patient_profile` (`patient_ID`) ON DELETE CASCADE;

--
-- Constraints for table `patient_profile`
--
ALTER TABLE `patient_profile`
  ADD CONSTRAINT `fk_patient_profile_suburb` FOREIGN KEY (`suburb_ID`) REFERENCES `suburb` (`suburb_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_patient_profile_user` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE;

--
-- Constraints for table `prefered_nurse_suburb`
--
ALTER TABLE `prefered_nurse_suburb`
  ADD CONSTRAINT `fk_pre_nurse` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pre_nurse_suburb` FOREIGN KEY (`suburb_ID`) REFERENCES `suburb` (`suburb_ID`) ON DELETE CASCADE;

--
-- Constraints for table `suburb`
--
ALTER TABLE `suburb`
  ADD CONSTRAINT `fk_suburb_city` FOREIGN KEY (`city_ID`) REFERENCES `city` (`city_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
