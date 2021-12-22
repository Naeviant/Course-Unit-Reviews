<?php if (count(get_included_files()) == 1) die("Direct access to this file is not permitted."); ?>

<!-- Temporary API -->
<?php 
	require_once("utils.php");

	function setAgreement($ReviewID, $Username, $Score) {
        $sql = "DELETE FROM `CUR_Agreements` WHERE `ReviewID` = '$ReviewID' AND `Username` = '$Username';";
        $res = doSQL($sql);
		if ($res[0] && $Score != 0) {
			$sql = "INSERT INTO `CUR_Agreements` (`ReviewID`, `Username`, `Type`) VALUES ('$ReviewID', '$Username', '$Score');";
			$res = doSQL($sql);
	
			if ($res[0]) {
				return [201, mysqli_insert_id(getConn())];
			} else {
				return [400];
			}
		} else {
			return [400];
		}
	}
?>
