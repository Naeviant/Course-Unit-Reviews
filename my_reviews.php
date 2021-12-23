<?php include_once("components/header.php") ?>
<?php include_once("auth/isAuth.php") ?>

<?php 
    include_once("internal/getMyReviews.php");
    include_once("internal/getAgreementScore.php");
    $res = getMyReviews($_SESSION["username"])[1];
?>

<h1>My Reviews</h1>
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
                        <td>$review[CourseUnit]</td>
                        <td>$review[Year]</td>
                        <td>" . $average_rating . "</td>
                        <td>" . $score . "</td>
                        <td>" . ucwords($review["Status"]) . "</td>
                        <td><a class='btn btn-primary' href='view_review?id=$review[ID]'>Read Review</a></td>
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

<?php include_once("components/footer.php") ?>