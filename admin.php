<?php include_once("auth/isAdmin.php") ?>
<?php include_once("components/header.php") ?>

<?php 
    include_once("internal/getReviewer.php");
    include_once("internal/banReviewer.php");
    include_once("internal/unbanReviewer.php");
    include_once("internal/approveReview.php");
    include_once("internal/rejectReview.php");
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
    } else if (isset($_POST["approve"])) {
        approveReview($_POST["approve"]);
    } else if (isset($_POST["reject"])) {
        rejectReview($_POST["reject"]);
    }
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Admin Panel</h1>
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-body">
            <h3 class="text-center">Ban/Unban User</h3>
            <form method="post" class="row">
                <div class="col-8 d-grid gap-2">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="col-2 d-grid gap-2">
                    <button type="submit" name="ban" value="ban" class="btn btn-danger">Ban User</button>
                </div>
                <div class="col-2 d-grid gap-2">
                    <button type="submit" name="unban" value="unban" class="btn btn-success">Unban User</button>
                </div>
            </form>
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-body">
            <?php 
                include_once("internal/getPendingReviews.php");
                $res = getPendingReviews()[1];
            ?>
            
            <h3 class="text-center">Approve/Reject Pending Reviews</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date Submitted</th>
                        <th>Course Unit</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (count($res)) {
                            foreach ($res as $review) {
                                echo("
                                    <tr>
                                        <td>" . date("d/m/Y", strtotime($review["Timestamp"])) . "</td>
                                        <td>$review[CourseUnit]</td>
                                        <td>$review[Year]</td>
                                        <td>
                                            <form method='POST'>
                                                <a class='btn btn-primary' href='view_review?id=$review[ID]' target='_blank'>Read Review</a>
                                                <button class='btn btn-success' type='submit' name='approve' value='$review[ID]' target='_blank'>Approve</button>
                                                <button class='btn btn-danger' type='submit' name='reject' value='$review[ID]' target='_blank'>Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                ");
                            }
                        }
                        else {
                            echo("
                                <td colspan='4'><em>No reviews found.</em></td>
                            ");
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include_once("components/footer.php") ?>