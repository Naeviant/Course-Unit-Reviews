<?php if (count(get_included_files()) == 1) die("Direct access to this file is not permitted."); ?>

<!-- Temporary API -->
<?php 
	require_once("utils.php");

	function getAgreementScore($ID) {
        $sql = "SELECT SUM(`Type`) AS `Score` FROM `CUR_Agreements` WHERE `ReviewID` = '$ID'";
		$res = doSQL($sql);

		if ($res[0]) {
            $score = mysqli_fetch_assoc($res[1])["Score"];
            if (empty($score)) {
                $score = 0;
            }
			return [200, $score];
		} else {
			return [400];
		}
	}
?>
