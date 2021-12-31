<?php include_once("components/header.php") ?>
<?php $_SESSION["redirect"] = "submit_review"; include_once("auth/isAuth.php") ?>

<?php
    include_once("internal/getReviewer.php");
    $user = getReviewer($_SESSION["username"])[1];

    if ($user[0]["Status"] == "banned") {
        include_once("401.php");
        die();
    }
?>

<div class="container">
    <div class="card">
        <div class="card-body"> 
            <h1 class="text-center">Submit New Review</h1>
        </div>
    </div>
</div>

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
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form class="row" action="" method="get">
                            <div class="col-5">
                                <label for="course_unit">Course Unit:</label>
                                <select class="form-select" name="course_unit">
        ');
        foreach (getCourseUnitCodes()[1] as $code) {
            if (!empty($_GET["course_unit"]) && $_GET["course_unit"] == $code["Code"]) {
                echo("<option selected>$code[Code]</option>");
            }
            else {
                echo("<option>$code[Code]</option>");
            }
        }
        echo('
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="year">Year Taken:</label>
                                <select class="form-select" name="year">
        ');
        foreach (getYears()[1] as $year) {
            if (!empty($_GET["year"]) && $_GET["year"] == $year["Year"]) {
                echo("<option selected>$year[Year]</option>");
            }
            else {
                echo("<option>$year[Year]</option>");
            }
        }
        echo('
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary btn-search" type="submit">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Exam Rating:</label>
                                    <div class="col-sm-10">
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
                                </div>
                                <div class="row mb-3">
                                    <label for="exam_review" class="col-sm-2 col-form-label">Exam Review:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="exam_review"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ');
            }
            if ($data["CourseworkPercentage"] > 0) {
                echo('
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Coursework Rating:</label>
                                    <div class="col-sm-10">
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
                                </div>
                                <div class="row mb-3">
                                    <label for="coursework_review" class="col-sm-2 col-form-label">Coursework Review:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="coursework_review"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ');
            }
            if ($data["LectureHours"] > 0) {
                echo('
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Lecture Rating:</label>
                                    <div class="col-sm-10">
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
                                </div>
                                <div class="row mb-3">
                                    <label for="lecture_review" class="col-sm-2 col-form-label">Lecture Review:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="lecture_review"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ');
            }
            if ($data["WorkshopHours"] > 0) {
                echo('
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Workshops Rating:</label>
                                    <div class="col-sm-10">
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
                                </div>
                                <div class="row mb-3">
                                    <label for="workshop_review" class="col-sm-2 col-form-label">Workshops Review:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="workshop_review"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ');
            }
            if ($data["TutorialHours"] > 0) {
                echo('
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tutorial Rating:</label>
                                    <div class="col-sm-10">
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
                                </div>
                                <div class="row mb-3">
                                    <label for="tutorial_review" class="col-sm-2 col-form-label">Tutorial Review:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="tutorial_review"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ');
            }
            echo('
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="other_comments"  class="col-sm-2 col-form-label">Other Comments:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="other_comments"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ');
            echo("  <input name='reviewer_username' value='$_SESSION[username]' style='display: none;'>");
            echo("  <input name='course_unit' value='$_GET[course_unit]' style='display: none;'>");
            echo("  <input name='year' value='$_GET[year]' style='display: none;'>");
            echo('
                <div class="container">
                    <div class="card">
                        <div class="card-body row justify-content-md-center">
                            <div class="col-md-auto">
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            </div>
                        </div>
                    </div>
                </div>
            ');
            echo('</form>');
            echo('<br />');
        }
        else {
            
        }
    }
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="static/js/star_rating.js"></script>

<?php include_once("components/footer.php") ?>