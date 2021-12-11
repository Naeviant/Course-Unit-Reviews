<?php 
    require_once("utils.php"); 
    header('Content-Type: application/json; charset=utf-8');
    
    $sql = "SELECT `Code` AS `course_unit_code`, `Year` AS `year` FROM `CUR_CourseUnits`";
    $res = doSQL($sql);

    if ($res[0]) {
        echo(json_encode(array("status" => 200, "data" => toArray($res[1])), JSON_NUMERIC_CHECK));
    }
    else {
        echo(json_encode(array("status" => 400)));
    }
?>
