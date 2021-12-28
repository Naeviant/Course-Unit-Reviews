<?php include_once("components/header.php") ?>
<?php include_once("auth/isAuth.php") ?>

<?php
    include_once("internal/getReviewer.php");
    $user = getReviewer($_SESSION["username"])[1];

    if ($user[0]["Status"] == "banned") {
        include_once("401.php");
        die();
    }
?>

<h1>Submit Course Unit Review</h1>
<?php
    if (!empty($_GET["reviewer_username"])) {
        // Temporary API
        include_once("internal/submitReview.php");
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
            isset($_GET["workshop_rating"]) ? $_GET["workshop_rating"] : 0,
            isset($_GET["workshop_review"]) ? $_GET["workshop_review"] : "",
            isset($_GET["tutorial_rating"]) ? $_GET["tutorial_rating"] : 0,
            isset($_GET["tutorial_review"]) ? $_GET["tutorial_review"] : "",
            isset($_GET["other_comments"]) ? $_GET["other_comments"] : ""
        );
        print_r($res);
        if ($res[1]) {
            header("Location: thank_you?id=$res[1]");
        }
    }
    else if (empty($_GET["course_unit"]) && empty($_GET["year"])) {
        // Temporary APIs
        include_once("internal/getYears.php");
        include_once("internal/getCourseUnitCodes.php");
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
        include_once("internal/getCourseUnit.php");
        $data = getCourseUnit($_GET["course_unit"], $_GET["year"])[1];
        if ($data) {
            $data = $data[0];
            echo('<form action="" method="get">');
            if ($data["ExamPercentage"] > 0) {
                echo('
                    <label>Exam Rating</label><br />
                    <div>
                        <input type="radio" id="exam-rating-1" name="exam_rating" value="1" />
                        <label for="exam-rating-1" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="exam-rating-2" name="exam_rating" value="2" />
                        <label for="exam-rating-2" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="exam-rating-3" name="exam_rating" value="3" checked />
                        <label for="exam-rating-3" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="exam-rating-4" name="exam_rating" value="4" />
                        <label for="exam-rating-4" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="exam-rating-5" name="exam_rating" value="5" />
                        <label for="exam-rating-5" class="star-rating"><i class="bi bi-star-fill"></i></label>
                    </div>
                    <label for="exam_review" class="form-label">Exam Review:</label>
                    <textarea class="form-control" name="exam_review" rows="3"></textarea>
                ');
            }
            if ($data["CourseworkPercentage"] > 0) {
                echo('
                    <label>Coursework Rating</label><br />
                    <div>
                        <input type="radio" id="coursework-rating-1" name="coursework_rating" value="1" />
                        <label for="coursework-rating-1" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="coursework-rating-2" name="coursework_rating" value="2" />
                        <label for="coursework-rating-2" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="coursework-rating-3" name="coursework_rating" value="3" checked />
                        <label for="coursework-rating-3" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="coursework-rating-4" name="coursework_rating" value="4" />
                        <label for="coursework-rating-4" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="coursework-rating-5" name="coursework_rating" value="5" />
                        <label for="coursework-rating-5" class="star-rating"><i class="bi bi-star-fill"></i></label>
                    </div>
                    <label for="coursework_review" class="form-label">Coursework Review:</label>
                    <textarea class="form-control" name="coursework_review" rows="3"></textarea>               
                ');
            }
            if ($data["LectureHours"] > 0) {
                echo('
                    <label>Lecture Rating</label><br />
                    <div>
                        <input type="radio" id="lecture-rating-1" name="lecture_rating" value="1" />
                        <label for="lecture-rating-1" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="lecture-rating-2" name="lecture_rating" value="2" />
                        <label for="lecture-rating-2" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="lecture-rating-3" name="lecture_rating" value="3" checked />
                        <label for="lecture-rating-3" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="lecture-rating-4" name="lecture_rating" value="4" />
                        <label for="lecture-rating-4" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="lecture-rating-5" name="lecture_rating" value="5" />
                        <label for="lecture-rating-5" class="star-rating"><i class="bi bi-star-fill"></i></label>
                    </div>
                    <label for="lecture_review" class="form-label">Lecture Review:</label>
                    <textarea class="form-control" name="lecture_review" rows="3"></textarea>
                ');
            }
            if ($data["WorkshopHours"] > 0) {
                echo('
                    <label>Workshop Rating</label><br />
                    <div>
                        <input type="radio" id="workshop-rating-1" name="workshop_rating" value="1" />
                        <label for="workshop-rating-1" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="workshop-rating-2" name="workshop_rating" value="2" />
                        <label for="workshop-rating-2" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="workshop-rating-3" name="workshop_rating" value="3" checked />
                        <label for="workshop-rating-3" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="workshop-rating-4" name="workshop_rating" value="4" />
                        <label for="workshop-rating-4" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="workshop-rating-5" name="workshop_rating" value="5" />
                        <label for="workshop-rating-5" class="star-rating"><i class="bi bi-star-fill"></i></label>
                    </div>
                    <label for="workshop_review" class="form-label">Workshops Review:</label>
                    <textarea class="form-control" name="workshop_review" rows="3"></textarea>               
                ');
            }
            if ($data["TutorialHours"] > 0) {
                echo('
                    <label>Tutorial Rating</label><br />
                    <div>
                        <input type="radio" id="tutorial-rating-1" name="tutorial_rating" value="1" />
                        <label for="tutorial-rating-1" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="tutorial-rating-2" name="tutorial_rating" value="2" />
                        <label for="tutorial-rating-2" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="tutorial-rating-3" name="tutorial_rating" value="3" checked />
                        <label for="tutorial-rating-3" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="tutorial-rating-4" name="tutorial_rating" value="4" />
                        <label for="tutorial-rating-4" class="star-rating"><i class="bi bi-star-fill"></i></label>
                        <input type="radio" id="tutorial-rating-5" name="tutorial_rating" value="5" />
                        <label for="tutorial-rating-5" class="star-rating"><i class="bi bi-star-fill"></i></label>
                    </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="static/js/star_rating.js"></script>

<?php include_once("components/footer.php") ?>