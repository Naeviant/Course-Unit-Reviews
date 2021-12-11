<?php 
    require_once("utils.php"); 
    header('Content-Type: application/json; charset=utf-8');
    
    if (!empty($_GET["year"]) && !empty($_GET["code"])) {
        $sql = "SELECT `C`.`Year` AS `year`, `C`.`Code` AS `course_unit_code`, `C`.`Name` AS `name`, `C`.`Credits` AS `credits`, `C`.`Level` AS `level`, `C`.`Length` AS `length`, CONCAT(`S`.`FirstName`, ' ', `S`.`LastName`) AS `unit_lead`, `C`.`ExamPercentage` AS `exam_percentage`, `C`.`CourseworkPercentage` AS `coursework_percentage`, `C`.`ExamHours` AS `exam_hours`, `C`.`LectureHours` AS `lecture_hours`, `C`.`WorkshopHours` AS `workshop_hours`, `C`.`TutorialHours` AS `tutorial_hours`, `C`.`IndependentHours` AS `independent_hours`, `C`.`Optional` AS `optional` FROM `CUR_CourseUnits` AS `C` INNER JOIN `CUR_Staff` AS `S` ON `C`.`Lead` = `S`.`ID` WHERE `Year` = '$_GET[year]' AND `Code` = '$_GET[code]'";
        $res = doSQL($sql);
    
        if ($res[0]) {
            $data = toArray($res[1])[0];
            $data["optional"] = (bool)$data["optional"];
            echo(json_encode(array("status" => 200, "data" => $data), JSON_NUMERIC_CHECK));
        }
        else {
            echo(json_encode(array("status" => 400)));
        }
    }
    else {
        echo(json_encode(array("status" => 400)));
    }
?>
