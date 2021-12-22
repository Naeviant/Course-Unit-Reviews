<?php 
    include_once("internal/getReview.php");
    if (isset($_GET["id"])) {
        $res = getReview($_GET["id"])[1];
        if (empty($res) || $res[0]["Status"] == "rejected") {
            include_once("404.php");
            die();
        }
        else if ($res[0]["Status"] != "approved") {
            include_once("components/header.php");
            echo('
                <div id="center-wrapper">
                    <h1>Awaiting Approval</h3>
                    <hr />
                    <h3>This review is awaiting approval from an administrator. Please try again later.</h3>
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
?>

<?php include_once("components/header.php") ?>

<h1>Review for <?php echo($res["CourseUnit"]) ?> in <?php echo($res["Year"]) ?></h1>

<?php
    if ($res["ExamPercentage"] > 0) {
        echo("
            <h3>Exam Rating: $res[ExamRating]</h3>
        ");
        if (!empty($res["ExamNotes"])) {
            echo("<p>$res[ExamNotes]</p>");
        }
        else {
            echo("<p><em>No further information provided.</em></p>");
        }
    }
    if ($res["CourseworkPercentage"] > 0) {
        echo("
            <h3>Coursework Rating: $res[CourseworkRating]</h3>
        ");
        if (!empty($res["CourseworkNotes"])) {
            echo("<p>$res[CourseworkNotes]</p>");
        }
        else {
            echo("<p><em>No further information provided.</em></p>");
        }
    }
    if ($res["LectureHours"] > 0) {
        echo("
            <h3>Lectures Rating: $res[LecturesRating]</h3>
        ");
        if (!empty($res["LecturesNotes"])) {
            echo("<p>$res[LecturesNotes]</p>");
        }
        else {
            echo("<p><em>No further information provided.</em></p>");
        }
    }
    if ($res["WorkshopHours"] > 0) {
        echo("
            <h3>Workshops Rating: $res[WorkshopsRating]</h3>
        ");
        if (!empty($res["WorkshopsNotes"])) {
            echo("<p>$res[WorkshopsNotes]</p>");
        }
        else {
            echo("<p><em>No further information provided.</em></p>");
        }
    }
    if ($res["TutorialHours"] > 0) {
        echo("
            <h3>Tutorials Rating: $res[TutorialsRating]</h3>
        ");
        if (!empty($res["TutorialsNotes"])) {
            echo("<p>$res[TutorialsNotes]</p>");
        }
        else {
            echo("<p><em>No further information provided.</em></p>");
        }
    }
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

<?php include_once("components/footer.php") ?>