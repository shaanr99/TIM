CREATE DEFINER=`sfoltz`@`localhost` PROCEDURE `spGetAllActivities`()
BEGIN
	SELECT activityID, activityDescription, parentID FROM Activity;
END