<?php 
    session_start();

    if (!isset($_SESSION["authTime"]) || !isset($_SESSION["username"]) || !isset($_SESSION["fullName"])) {
        header("Location: auth/login.php");
        die();
    }

    include_once(__DIR__ . "/../internal/getReviewer.php");
    $user = getReviewer($_SESSION["username"])[1];

    if ($user[0]["Status"] != "admin") {
        include_once(__DIR__ . "/../401.php");
        die();
    }
?>
