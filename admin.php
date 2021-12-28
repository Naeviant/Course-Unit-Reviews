<?php include_once("auth/isAdmin.php") ?>
<?php include_once("components/header.php") ?>

<?php 
    include_once("internal/getReviewer.php");
    include_once("internal/banReviewer.php");
    include_once("internal/unbanReviewer.php");
    if (isset($_POST["ban"]) && !empty($_POST["username"])) {
        if (count(getReviewer($_POST["username"])[1]) > 0) {
            banReviewer($_POST["username"]);
            echo('
                <div class="alert alert-primary" role="alert">
                User ' . $_POST["username"] . ' can no longer post reviews.
                </div>
            ');
        } else {
            echo('
                <div class="alert alert-warning" role="alert">
                User ' . $_POST["username"] . ' is not registered on the system.
                </div>
            ');
        }
    } else if (isset($_POST["unban"]) && !empty($_POST["username"])) {
        if (count(getReviewer($_POST["username"])[1]) > 0) {
            unbanReviewer($_POST["username"]);
            echo('
                <div class="alert alert-primary" role="alert">
                    User ' . $_POST["username"] . ' can now post reviews.
                </div>
            ');
        } else {
            echo('
                <div class="alert alert-warning" role="alert">
                User ' . $_POST["username"] . ' is not registered on the system.
                </div>
            ');
        }
    }
?>

<h1>Ban/Unban User</h1>
<form method="post">
    <label for="username">Username: </label>
    <input type="text" name="username">
    <button type="submit" name="ban" value="ban" class="btn btn-danger">Ban User</button>
    <button type="submit" name="unban" value="unban" class="btn btn-success">Unban User</button>
</form>

<?php include_once("components/footer.php") ?>