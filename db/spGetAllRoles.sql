USE `TIM`;
DROP procedure IF EXISTS `spGetAllRoles`;

DELIMITER $$
USE `TIM`$$
CREATE PROCEDURE `spGetAllRoles`()
BEGIN
	SELECT roleID, roleName FROM Roles;
END$$

DELIMITER ;
