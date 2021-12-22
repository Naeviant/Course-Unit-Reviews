<?php if (count(get_included_files()) == 1) die("Direct access to this file is not permitted."); ?>

<!-- Temporary API -->
<?php 
	require_once("utils.php");

	function getReview($ID) {
        $sql = "SELECT * FROM `CUR_Reviews` AS `R` INNER JOIN `CUR_CourseUnits` AS `C` ON `R`.`CourseUnit` = `C`.`Code` AND `R`.`Year` = `C`.`Year` WHERE `R`.`ID` = '$ID'";
		$res = doSQL($sql);

		if ($res[0]) {
			return [200, toArray($res[1])];
		} else {
			return [400];
		}
	}
?>
