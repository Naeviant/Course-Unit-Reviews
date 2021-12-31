<?php include_once("components/header.php") ?>

<?php
    if (!isset($_GET["id"])) {
        $_GET["id"] = "0";
    }
?>

<div id="center-wrapper">
    <div class="card">
        <div class="card-body message-wrapper">
            <h1 class="text-center">Thank you!</h1>
            <br />
            <h3 class="text-center">Your review will be checked by an administrator before being published. Your review ID is <strong><?php echo($_GET["id"]); ?></strong>.</h3>
        </div>
    </div>
</div>

<?php include_once("components/footer.php") ?>