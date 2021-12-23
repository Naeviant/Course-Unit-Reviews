<?php include_once("components/header.php") ?>

<form action="" method="get">
    <label for="course_unit">Course Unit:</label>
    <select class="form-select" name="course_unit">
        <?php
            include_once("internal/getCourseUnitCodes.php");
            foreach (getCourseUnitCodes()[1] as $code) {
                if (!empty($_GET["course_unit"]) && $_GET["course_unit"] == $code["Code"]) {
                    echo("<option selected>$code[Code]</option>");
                }
                else {
                    echo("<option>$code[Code]</option>");
                }
            }
        ?>
    </select>
    <label for="year">Year Taken:</label>
    <select class="form-select" name="year">
        <?php
            include_once("internal/getYears.php");
            foreach (getYears()[1] as $year) {
                if (!empty($_GET["year"]) && $_GET["year"] == $year["Year"]) {
                    echo("<option selected>$year[Year]</option>");
                }
                else {
                    echo("<option>$year[Year]</option>");
                }
            }
        ?>
    </select>
    <button type="submit">Search</button>
</form>

<?php 
    if (empty($_GET["course_unit"]) || empty($_GET["year"])) {
        include_once("components/footer.php");
        die();
    }
    include_once("internal/getReviews.php");
    include_once("internal/getAgreementScore.php");
    $res = getReviews($_GET["course_unit"], $_GET["year"])[1];
?>

<table class="table">
    <thead>
        <tr>
            <th>Course Unit</th>
            <th>Year</th>
            <th>Average Rating</th>
            <th>Agreement Score</th>
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
                        <td><a class='btn btn-primary' href='view_review?id=$review[ID]'>Read Review</a></td>
                    ");
                }
            }
            else {
                echo("
                    <td colspan='5'><em>No reviews found.</em></td>
                ");
            }
        ?>
    </tbody>
</table>

<?php include_once("components/footer.php") ?>