<?php
	include('../config.php');
	
	$id=$_GET['id'];
	
    $examId=addslashes($_POST['examId']);
	$type =addslashes($_POST['type']);
	$question=addslashes($_POST['question']);
	$choice_A=addslashes($_POST['choice_A']);
	$choice_B=addslashes($_POST['choice_B']);
	$choice_C=addslashes($_POST['choice_C']);
	$choice_D=addslashes($_POST['choice_D']);
	$correctAnswer=addslashes($_POST['correctAnswer']); 
	
	
	mysqli_query($conn,"UPDATE exam_question set eqt_id='$id', exam_question='$question', exam_ch1='$choice_A',
	exam_ch2='$choice_B', exam_ch3='$choice_C', exam_ch4='$choice_D', exam_answer='$correctAnswer', q_type='$type', exam_id='$examId'  WHERE eqt_id='$id'");
	header("location:manage-exam.php?id=$examId");
	ob_end_flush();
		   exit(0);
?>
