<?php
	include'../config.php';
	
	$examId=$_POST['examId'];
	$type =$_POST['type'];
	$question=$_POST['question'];
	$choice_A=$_POST['choice_A'];
	$choice_B=$_POST['choice_B'];
	$choice_C=$_POST['choice_C'];
	$choice_D=$_POST['choice_D'];
	$correctAnswer=$_POST['correctAnswer'];
	
	mysqli_query($conn,"insert into exam_question (exam_id, exam_question, exam_ch1, exam_ch2, exam_ch3, exam_ch4, exam_answer, q_type)
	 values ('$examId', '$question', '$choice_A','$choice_B', '$choice_C','$choice_D', '$correctAnswer', '$type')");
	header("location:manage-exam.php?id=$examId");

?>


