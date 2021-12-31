<?php 
    session_start();
    include_once("internal/getReview.php");
    include_once("internal/getReviewer.php");

    $isAdmin = false;
    if (isset($_SESSION["username"])) {
        $res = getReviewer($_SESSION["username"])[1];
        if ($res[0]["Status"] == "admin") {
            $isAdmin = true;
        }
    }

    if (isset($_GET["id"])) {
        $res = getReview($_GET["id"])[1];
        if (empty($res) || $res[0]["Status"] == "rejected") {
            include_once("404.php");
            die();
        }
        else if ($res[0]["Status"] != "approved" && !$isAdmin) {
            session_write_close();
            include_once("components/header.php");
            echo('
                <div id="center-wrapper">
                    <div class="card">
                        <div class="card-body message-wrapper">
                            <h1>Awaiting Approval</h1>
                            <br />
                            <h3>This review is awaiting approval from an administrator. Please try again later.</h3>
                        </div>
                    </div>
                </div>
            ');
            include_once("components/footer.php");
            die();
        }
    }
    else {
        include_once("404.php");
        die();
    }
    $res = $res[0];

    include_once("internal/setAgreement.php");
    if (isset($_POST["agree"]) && isset($_SESSION["username"])) {
        setAgreement($_GET["id"], $_SESSION["username"], 1);
        unset($_POST);
    }
    else if (isset($_POST["neutral"]) && isset($_SESSION["username"])) {
        setAgreement($_GET["id"], $_SESSION["username"], 0);
        unset($_POST);
    }
    else if (isset($_POST["disagree"]) && isset($_SESSION["username"])) {
        setAgreement($_GET["id"], $_SESSION["username"], -1);
        unset($_POST);
    }
    session_write_close();

    include_once("internal/getAgreementScore.php");
    $score = getAgreementScore($_GET["id"])[1];
?>

<?php include_once("components/header.php") ?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Review for <?php echo($res["CourseUnit"]) ?> in <?php echo($res["Year"]) ?></h1>
            <h5 class="text-center">Date Submitted: <?php echo(date("jS F Y", strtotime($res["Timestamp"]))); ?></h5>
            <h5 class="text-center">Review Score: <?php echo($score); ?></h5>
        </div>
    </div>
</div>

<div class="container">
    <div class="accordion" id="ratings">
        <?php
            if ($res["ExamPercentage"] > 0) {
                echo('
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingExam">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExam" aria-expanded="true" aria-controls="collapseExam">
                                <span>Exam Rating: &nbsp;</span>
                ');
                for ($i = 1; $i <= 5; $i++) {
                    echo($res["ExamRating"] >= $i ? '<span class="star-rating active"><i class="bi bi-star-fill"></i> </span>' : '<span class="star-rating"><i class="bi bi-star-fill"></i> </span>');
                }
                echo('
                            </button>
                        </h2>
                        <div id="collapseExam" class="accordion-collapse collapse" aria-labelledby="collapseExam" data-bs-parent="#ratings">
                            <div class="accordion-body">
                ');
                if (!empty($res["ExamNotes"])) {
                    echo("<p>$res[ExamNotes]</p>");
                }
                else {
                    echo("<p><em>No further information provided.</em></p>");
                }
                echo('
                            </div>
                        </div>
                    </div>
                ');
            }
            if ($res["CourseworkPercentage"] > 0) {
                echo('
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCoursework">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCoursework" aria-expanded="true" aria-controls="collapseCoursework">
                                <span>Coursework Rating: &nbsp;</span>
                ');
                for ($i = 1; $i <= 5; $i++) {
                    echo($res["CourseworkRating"] >= $i ? '<span class="star-rating active"><i class="bi bi-star-fill"></i> </span>' : '<span class="star-rating"><i class="bi bi-star-fill"></i> </span>');
                }
                echo('
                            </button>
                        </h2>
                        <div id="collapseCoursework" class="accordion-collapse collapse" aria-labelledby="collapseCoursework" data-bs-parent="#ratings">
                            <div class="accordion-body">
                ');
                if (!empty($res["CourseworkNotes"])) {
                    echo("<p>$res[CourseworkNotes]</p>");
                }
                else {
                    echo("<p><em>No further information provided.</em></p>");
                }
                echo('
                            </div>
                        </div>
                    </div>
                ');
            }
            if ($res["LectureHours"] > 0) {
                echo('
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingLectures">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLectures" aria-expanded="true" aria-controls="collapseLectures">
                                <span>Lectures Rating: &nbsp;</span>
                ');
                for ($i = 1; $i <= 5; $i++) {
                    echo($res["LecturesRating"] >= $i ? '<span class="star-rating active"><i class="bi bi-star-fill"></i> </span>' : '<span class="star-rating"><i class="bi bi-star-fill"></i> </span>');
                }
                echo('
                            </button>
                        </h2>
                        <div id="collapseLectures" class="accordion-collapse collapse" aria-labelledby="collapseLectures" data-bs-parent="#ratings">
                            <div class="accordion-body">
                ');
                if (!empty($res["LecturesNotes"])) {
                    echo("<p>$res[LecturesNotes]</p>");
                }
                else {
                    echo("<p><em>No further information provided.</em></p>");
                }
                echo('
                            </div>
                        </div>
                    </div>
                ');
            }
            if ($res["WorkshopHours"] > 0) {
                echo('
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingWorkshops">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWorkshops" aria-expanded="true" aria-controls="collapseWorkshops">
                                <span>Workshops Rating: &nbsp;</span>
                ');
                for ($i = 1; $i <= 5; $i++) {
                    echo($res["WorkshopsRating"] >= $i ? '<span class="star-rating active"><i class="bi bi-star-fill"></i> </span>' : '<span class="star-rating"><i class="bi bi-star-fill"></i> </span>');
                }
                echo('
                            </button>
                        </h2>
                        <div id="collapseWorkshops" class="accordion-collapse collapse" aria-labelledby="collapseWorkshops" data-bs-parent="#ratings">
                            <div class="accordion-body">
                ');
                if (!empty($res["WorkshopsNotes"])) {
                    echo("<p>$res[WorkshopsNotes]</p>");
                }
                else {
                    echo("<p><em>No further information provided.</em></p>");
                }
                echo('
                            </div>
                        </div>
                    </div>
                ');
            }
            if ($res["TutorialHours"] > 0) {
                echo('
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTutorials">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTutorials" aria-expanded="true" aria-controls="collapseTutorials">
                                <span>Tutorials Rating: &nbsp;</span>
                ');
                for ($i = 1; $i <= 5; $i++) {
                    echo($res["TutorialsRating"] >= $i ? '<span class="star-rating active"><i class="bi bi-star-fill"></i> </span>' : '<span class="star-rating"><i class="bi bi-star-fill"></i> </span>');
                }
                echo('
                            </button>
                        </h2>
                        <div id="collapseTutorials" class="accordion-collapse collapse" aria-labelledby="collapseTutorials" data-bs-parent="#ratings">
                            <div class="accordion-body">
                ');
                if (!empty($res["TutorialsNotes"])) {
                    echo("<p>$res[TutorialsNotes]</p>");
                }
                else {
                    echo("<p><em>No further information provided.</em></p>");
                }
                echo('
                            </div>
                        </div>
                    </div>
                ');
            }
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOther">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOther" aria-expanded="true" aria-controls="collapseOther">
                    <span>Other Remarks</span>
                </button>
            </h2>
            <div id="collapseOther" class="accordion-collapse collapse" aria-labelledby="collapseOther" data-bs-parent="#ratings">
                <div class="accordion-body">
                    <?php
                        echo("
                            <h3>Other Remarks</h3>
                        ");
                        if (!empty($res["OtherNotes"])) {
                            echo("<p>$res[OtherNotes]</p>");
                        }
                        else {
                            echo("<p><em>None provided.</em></p>");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_SESSION["username"]) && $_SESSION["username"] != $res["ReviewerUsername"] && $res["Status"] == "approved") {
        echo('
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Do you agree with this review?</h3>
                        <form method="POST" class="row">
                            <div class="col d-grid gap-2">
                                <button type="submit" name="agree" value="agree" class="btn btn-success"><i class="bi bi-hand-thumbs-up-fill"></i> Yes</button>
                            </div>
                            <div class="col d-grid gap-2">
                                <button type="submit" name="neutral" value="neutral" class="btn btn-warning"><i class="bi bi-patch-question-fill"></i> Partially</button>
                            </div>
                            <div class="col d-grid gap-2">
                                <button type="submit" name="disagree" value="disagree" class="btn btn-danger"><i class="bi bi-hand-thumbs-down-fill"></i> No</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ');
    }
?>


<?php include_once("components/footer.php") ?>