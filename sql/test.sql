DROP PROCEDURE IF EXISTS `nurse_month_week_visits`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nurse_month_week_visits` (IN `nurse_ID` INT, IN `start_date` DATE, IN `end_date` DATE, IN `view_mode` VARCHAR(10))   BEGIN
  
    SELECT
      pp.*,
      sb.suburb_ID,
      sb.suburb_name,
      u.user_ID,
      u.email_address,
      u.contact_no
    FROM
      patient_profile pp
      JOIN suburb sb ON pp.suburb_ID = sb.suburb_ID
      JOIN user u ON pp.user_ID = u.user_ID
    WHERE
      pp.user_ID = nurse_ID
      
    ORDER BY
        cv.visit_date ASC;
END$$