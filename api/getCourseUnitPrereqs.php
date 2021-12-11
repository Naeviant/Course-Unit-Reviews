<?php 
    require_once("utils.php"); 
    header('Content-Type: application/json; charset=utf-8');
    
    if (!empty($_GET["year"]) && !empty($_GET["code"])) {
        $sql = "SELECT `Year` AS `year`, `PrereqOf` AS `need_unit`, `PrereqTo` AS `for_unit` FROM `CUR_Prereqs` WHERE `Year` = '$_GET[year]' AND `PrereqTo` = '$_GET[code]'";
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
