<?php
    session_start();
    include_once("../internal/handleNewUser.php");

    if (empty($_SERVER["HTTPS"])) {
        $DEVELOPER_URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    } 
    else {
        $DEVELOPER_URL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    if (empty($_SESSION["redirect"])) {
        $REDIRECT_URL = "../home";
    }
    else { 
        $REDIRECT_URL = "../" . $_SESSION["redirect"];
    }

    define("DEVELOPER_URL", $DEVELOPER_URL);
    define("AUTHENTICATION_SERVICE_URL", "http://studentnet.cs.manchester.ac.uk/authenticate/");
    require_once("Authenticator.php");
    session_start();
    Authenticator::validateUser();
    $_SESSION["authTime"] = Authenticator::getTimeAuthenticated();
    $_SESSION["username"] = Authenticator::getUsername();
    $_SESSION["fullName"] = Authenticator::getFullName();
    handleNewUser();
    header("Location: $REDIRECT_URL");
    die();
?>
