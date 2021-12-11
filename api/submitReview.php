<!-- Temporary API -->
<?php 
	require_once("utils.php");

	function submitReview(
		$CourseUnit,
		$Year,
		$ReviewerUsername,
		$ExamRating,
		$ExamReview,
		$CourseworkRating,
		$CourseworkReview,
		$LectureRating,
		$LectureReview,
		$WorkshopsRating,
		$WorkshopsReview,
		$TutorialRating,
		$TutorialReview,
		$OtherComments
	) {
        $sql = "INSERT INTO `CUR_Reviews` (`ID`, `Year`, `CourseUnit`, `ReviewerUsername`, `ExamRating`, `ExamNotes`, `CourseworkRating`, `CourseworkNotes`, `LecturesRating`, `LecturesNotes`, `WorkshopsRating`, `WorkshopsNotes`, `TutorialsRating`, `TutorialsNotes`, `OtherNotes`, `Timestamp`, `Status`) VALUES (NULL, '$Year', '$CourseUnit', '$ReviewerUsername', '$ExamRating', '$ExamReview', '$CourseworkRating', '$CourseworkReview', '$LectureRating', '$LectureReview', '$WorkshopsRating', '$WorkshopsReview', '$TutorialRating', '$TutorialReview', '$OtherComments', CURRENT_TIMESTAMP, 'pending');";
		$res = doSQL($sql);

		if ($res[0]) {
			return [201, mysqli_insert_id(getConn())];
		} else {
			return [400];
		}
	}
?>
