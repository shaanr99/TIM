USE `TIM`;
DROP procedure IF EXISTS `spInsertTimeRecord`;

DELIMITER $$
USE `TIM`$$
CREATE PROCEDURE `spInsertTimeRecord` (IN d int, IN u int, IN a int)
BEGIN
	INSERT INTO TimeRecords (durationInSeconds, userID, activityID)
    VALUES (d, u, a);
END
$$

DELIMITER ;
