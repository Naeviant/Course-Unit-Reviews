<?php include_once("components/header.php") ?>
<?php include_once("auth/isAuth.php") ?>

<h1>Submit Course Unit Review</h1>
<?php
    if (!empty($_GET["reviewer_username"])) {
        // Temporary API
        include_once("api/submitReview.php");
        $res = submitReview(
            $_GET["course_unit"],
            $_GET["year"],
            $_SESSION["username"],
            isset($_GET["exam_rating"]) ? $_GET["exam_rating"] : 0,
            isset($_GET["exam_review"]) ? $_GET["exam_review"] : "",
            isset($_GET["coursework_rating"]) ? $_GET["coursework_rating"] : 0,
            isset($_GET["coursework_review"]) ? $_GET["coursework_review"] : "",
            isset($_GET["lecture_rating"]) ? $_GET["lecture_rating"] : 0,
            isset($_GET["lecture_review"]) ? $_GET["lecture_review"] : "",
            isset($_GET["workshops_rating"]) ? $_GET["workshops_rating"] : 0,
            isset($_GET["workshops_review"]) ? $_GET["workshops_review"] : "",
            isset($_GET["tutorial_rating"]) ? $_GET["tutorial_rating"] : 0,
            isset($_GET["tutorial_review"]) ? $_GET["tutorial_review"] : "",
            isset($_GET["other_comments"]) ? $_GET["other_comments"] : ""
        );
        print_r($res);
        if ($res[1]) {
            header("Location: view_review?id=$res[1]");
        }
    }
    else if (empty($_GET["course_unit"]) && empty($_GET["year"])) {
        // Temporary APIs
        include_once("api/getYears.php");
        include_once("api/getCourseUnitCodes.php");
        echo('
            <form action="" method="get">
                <label for="course_unit">Course Unit:</label>
                <select class="form-select" name="course_unit">
                    <option></option>
        ');
        foreach (getCourseUnitCodes()[1] as $code) {
            echo("<option>$code[Code]</option>");
        }
        echo(' 
                </select>
                <label for="year">Year Taken:</label>
                <select class="form-select" name="year">
                    <option></option>
        ');
        foreach (getYears()[1] as $year) {
            echo("<option>$year[Year]</option>");
        }
        echo('
                </select>
                <button type="submit">Continue</button>
            </form>
        ');
    }
    else {
        // Temporary API
        include_once("api/getCourseUnit.php");
        $data = getCourseUnit($_GET["course_unit"], $_GET["year"])[1];
        if ($data) {
            $data = $data[0];
            echo('<form action="" method="get">');
            if ($data["ExamPercentage"] > 0) {
                echo('
                    <label for="exam_rating" class="form-label">Exam Rating:</label>
                    <input type="range" class="form-range" name="exam_rating" step="1" min="1" max="5">
                    <label for="exam_review" class="form-label">Exam Review:</label>
                    <textarea class="form-control" name="exam_review" rows="3"></textarea>
                ');
            }
            if ($data["CourseworkPercentage"] > 0) {
                echo('
                    <label for="coursework_rating" class="form-label">Coursework Rating:</label>
                    <input type="range" class="form-range" name="coursework_rating" step="1" min="1" max="5">
                    <label for="coursework_review" class="form-label">Coursework Review:</label>
                    <textarea class="form-control" name="coursework_review" rows="3"></textarea>               
                ');
            }
            if ($data["LectureHours"] > 0) {
                echo('
                    <label for="lecture_rating" class="form-label">Lecture Rating:</label>
                    <input type="range" class="form-range" name="lecture_rating" step="1" min="1" max="5">
                    <label for="lecture_review" class="form-label">Lecture Review:</label>
                    <textarea class="form-control" name="lecture_review" rows="3"></textarea>
                ');
            }
            if ($data["WorkshopHours"] > 0) {
                echo('
                    <label for="workshops_rating" class="form-label">Workshops Rating:</label>
                    <input type="range" class="form-range" name="workshops_rating" step="1" min="1" max="5">
                    <label for="workshops_review" class="form-label">Workshops Review:</label>
                    <textarea class="form-control" name="workshops_review" rows="3"></textarea>               
                ');
            }
            if ($data["TutorialHours"] > 0) {
                echo('
                    <label for="tutorial_rating" class="form-label">Tutorial Rating:</label>
                    <input type="range" class="form-range" name="tutorial_rating" step="1" min="1" max="5">
                    <label for="tutorial_review" class="form-label">Tutorial Review:</label>
                    <textarea class="form-control" name="tutorial_review" rows="3"></textarea>
                ');
            }
            echo('
                <label for="other_comments" class="form-label">Other Comments:</label>
                <textarea class="form-control" name="other_comments" rows="3"></textarea>
            ');
            echo("  <input name='reviewer_username' value='$_SESSION[username]' style='display: none;'>");
            echo("  <input name='course_unit' value='$_GET[course_unit]' style='display: none;'>");
            echo("  <input name='year' value='$_GET[year]' style='display: none;'>");
            echo('  <button type="submit">Submit Review</button>');
            echo('</form>');
        }
        else {
            
        }
    }
?>

<?php include_once("components/footer.php") ?>