<?php
	include('../config.php');
	
	$id=$_GET['id'];
	
    $examId=$_POST['examId'];
	$type =$_POST['type'];
	$question=$_POST['question'];
	$choice_A=$_POST['choice_A'];
	$choice_B=$_POST['choice_B'];
	$choice_C=$_POST['choice_C'];
	$choice_D=$_POST['choice_D'];
	$correctAnswer=$_POST['correctAnswer'];
	
	
	mysqli_query($conn,"UPDATE exam_question set eqt_id='$id', exam_question='$question', exam_ch1='$choice_A',
	exam_ch2='$choice_B', exam_ch3='$choice_C', exam_ch4='$choice_D', exam_answer='$correctAnswer', q_type='$type', exam_id='$examId'  WHERE eqt_id='$id'");
	header("location:manage-exam.php?id=$examId");

?>
