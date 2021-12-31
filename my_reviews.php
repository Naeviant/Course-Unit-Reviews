<?php include_once("components/header.php") ?>
<?php $_SESSION["redirect"] = "my_reviews"; include_once("auth/isAuth.php") ?>

<?php 
    include_once("internal/getMyReviews.php");
    include_once("internal/getAgreementScore.php");
    $res = getMyReviews($_SESSION["username"])[1];
?>

<div class="container">
    <div class="card">
        <div class="card-body"> 
            <h1 class="text-center">My Reviews</h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Course Unit</th>
                    <th>Year</th>
                    <th>Average Rating</th>
                    <th>Agreement Score</th>
                    <th>Approval Status</th>
                    <th>Read Review</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if (count($res)) {
                            foreach ($res as $review) {
                                $ratings = array($review["LecturesRating"], $review["WorkshopsRating"], $review["CourseworkRating"], $review["ExamRating"], $review["TutorialsRating"]);
                                $ratings_filtered = array_filter($ratings);
                                $average_rating = array_sum($ratings_filtered) / count($ratings_filtered);
                                
                                $score = getAgreementScore($review["ID"])[1];
                                if (empty($score)) {
                                    $score = 0;
                                }
                                echo("
                                    <tr>
                                        <td>$review[CourseUnit]</td>
                                        <td>$review[Year]</td>
                                        <td>" . $average_rating . "</td>
                                        <td>" . $score . "</td>
                                        <td>" . ucwords($review["Status"]) . "</td>
                                        <td><a class='btn btn-primary' href='view_review?id=$review[ID]'>Read Review</a></td>
                                    </tr>
                                ");
                            }
                        }
                        else {
                            echo("
                            <td colspan='6'><em>No reviews found.</em></td>
                            ");
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once("components/footer.php") ?>