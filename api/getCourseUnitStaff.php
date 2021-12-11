<?php 
    require_once("utils.php"); 
    header('Content-Type: application/json; charset=utf-8');
    
    if (!empty($_GET["year"]) && !empty($_GET["code"])) {
        $sql = "SELECT `T`.`Year` AS `year`, `T`.`CourseUnit` AS `course_unit_code`, CONCAT(`S`.`FirstName`, ' ', `S`.`LastName`) AS `staff_member` FROM `CUR_Teaches` AS `T` INNER JOIN `CUR_Staff` AS `S` ON `S`.`ID` = `T`.`Staff` WHERE `T`.`Year` = '$_GET[year]' AND `T`.`CourseUnit` = '$_GET[code]'";
        $res = doSQL($sql);
    
        if ($res[0]) {
            echo(json_encode(array("status" => 200, "data" => toArray($res[1]))));
        }
        else {
            echo(json_encode(array("status" => 400)));
        }
    }
    else {
        echo(json_encode(array("status" => 400)));
    }
?>
