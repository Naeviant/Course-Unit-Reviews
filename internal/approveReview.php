<?php if (count(get_included_files()) == 1) die("Direct access to this file is not permitted."); ?>

<!-- Temporary API -->
<?php 
	require_once("utils.php");

	function approveReview($ID) {
        $sql = "UPDATE `CUR_Reviews` SET `Status` = 'approved' WHERE `ID` = '$ID'";
		$res = doSQL($sql);

		if ($res[0]) {
			return [200, null];
		} else {
			return [400];
		}
	}
?>
