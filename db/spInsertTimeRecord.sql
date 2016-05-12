USE `TIM`;
DROP procedure IF EXISTS `spInsertTimeRecord`;

DELIMITER $$
USE `TIM`$$
CREATE PROCEDURE `spInsertTimeRecord` (IN uid int, IN startTime DATE, IN endTime DATE, IN activityID int)
BEGIN
	INSERT INTO TimeRecords (userID, startTime, endTime, activityID, createDate, createUID)
    VALUES (uid, startTime, endTime, activityID, now(), uid);
END
$$

DELIMITER ;
