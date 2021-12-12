<?php if (count(get_included_files()) == 1) die("Direct access to this file is not permitted."); ?>

<!-- Temporary API -->
<?php 
	require_once("utils.php");

	function handleNewUser() {
        $sql = "SELECT COUNT(*) FROM `CUR_Reviewer` WHERE `Username` = '$_SESSION[username]'";
		$res = doSQL($sql);
        
		if ($res[0]) {
			if (toArray($res[1])[0]["COUNT(*)"] == 0) {
                $name = explode(" ", $_SESSION["fullName"]);

                $sql = "INSERT INTO `CUR_Reviewer`(`Username`, `FirstName`, `LastName`) VALUES ('$_SESSION[username]', '$name[0]', '" . end($name) . "')";
		        $res = doSQL($sql);

                if ($res[0]) {
                    return [201, mysqli_insert_id(getConn())];
                }
                else {
                    return [400];
                }
            }
		} else {
			return [400];
		}
	}
?>
