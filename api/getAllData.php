<?php 
    require_once("utils.php"); 
    header('Content-Type: application/json; charset=utf-8');

    $sql = "SELECT `C`.`Year` AS `year`, `C`.`Code` AS `course_unit_code`, `C`.`Name` AS `name`, `C`.`Credits` AS `credits`, `C`.`Level` AS `level`, `C`.`Length` AS `length`, CONCAT(`S`.`FirstName`, ' ', `S`.`LastName`) AS `unit_lead`, `C`.`ExamPercentage` AS `exam_percentage`, `C`.`CourseworkPercentage` AS `coursework_percentage`, `C`.`ExamHours` AS `exam_hours`, `C`.`LectureHours` AS `lecture_hours`, `C`.`WorkshopHours` AS `workshop_hours`, `C`.`TutorialHours` AS `tutorial_hours`, `C`.`IndependentHours` AS `independent_hours`, `C`.`Optional` AS `optional`, CONCAT(`X`.`FirstName`, ' ', `X`.`LastName`) AS `staff`, `P`.`PrereqOf` AS `requires`, `Q`.`PrereqTo` AS `required_for` FROM `CUR_CourseUnits` AS `C` LEFT JOIN `CUR_Staff` AS `S` ON `C`.`Lead` = `S`.`ID` LEFT JOIN `CUR_Teaches` AS `T` ON `T`.`Year` = `C`.`Year` AND `T`.`CourseUnit` = `C`.`Code` LEFT JOIN `CUR_Staff` AS `X` ON `T`.`Staff` = `X`.`ID` LEFT JOIN `CUR_Prereqs` AS `P` ON `P`.`PrereqTo` = `C`.`Code` AND `P`.`Year` = `C`.`Year` LEFT JOIN `CUR_Prereqs` AS `Q` ON `Q`.`PrereqOf` = `C`.`Code` AND `Q`.`Year` = `C`.`Year`";
    $res = doSQL($sql);

    if ($res[0]) {
        $data = array();
        $raw = toArray($res[1]);
        $units = array_unique(array_map(function($x) { return array("course_unit_code" => $x["course_unit_code"], "year" => $x["year"] );}, $raw), SORT_REGULAR);
        foreach ($units as $unit) {
            $records = array_filter($raw, function($x) use ($unit) { return $x["course_unit_code"] == $unit["course_unit_code"] && $x["year"] == $unit["year"]; });
            $main = $records[array_keys($records)[0]];
            if (!isset($data[$main["year"]])) {
                $data[$main["year"]] = array();
            }
            $main["staff"] = array_values(array_filter(array_unique(array_map(function($x) { return array("name" => $x["staff"]); }, $records), SORT_REGULAR)));
            $main["requires"] = array_values(array_filter(array_unique(array_map(function($x) { return $x["requires"]; }, $records))));
            $main["required_for"] = array_values(array_filter(array_unique(array_map(function($x) { return $x["required_for"]; }, $records))));
            array_push($data[$main["year"]], $main);
        }
        echo(json_encode(array("status" => 200, "data" => $data), JSON_NUMERIC_CHECK));
    }
    else {
        echo(json_encode(array("status" => 400)));
    }
?>
