<?php include_once("components/header.php") ?>

<?php
    if (!isset($_GET["id"])) {
        $_GET["id"] = "0";
    }
?>

<div id="center-wrapper">
    <h1>Thank you!</h1>
    <hr />
    <h3>Your review will be checked by an administrator before being published. Your review ID is <strong><?php echo($_GET["id"]); ?></strong>.</h3>
</div>

<?php include_once("components/footer.php") ?>