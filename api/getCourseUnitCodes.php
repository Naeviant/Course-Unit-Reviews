<!-- Temporary API -->
<?php 
	require_once("utils.php");

	function getCourseUnitCodes() {
        $sql = "SELECT DISTINCT `Code` FROM `CUR_CourseUnits`";
		$res = doSQL($sql);

		if ($res[0]) {
			return [200, toArray($res[1])];
		} else {
			return [400];
		}
	}
?>
