<?php
session_start();
	include'../config.php';
	if(isset($_POST['submit'])){

	$examId=addslashes($_POST['examId']);
	$type =addslashes($_POST['type']);
	$question=addslashes($_POST['question']);
	$choice_A=addslashes($_POST['choice_A']);
	$choice_B=addslashes($_POST['choice_B']);
	$choice_C=addslashes($_POST['choice_C']);
	$choice_D=addslashes($_POST['choice_D']);
	$correctAnswer=addslashes($_POST['correctAnswer']); 

	if($type == 'Multiple Choice'){
		if($correctAnswer != $choice_A AND $correctAnswer != $choice_B AND $correctAnswer != $choice_C AND $correctAnswer != $choice_D){
			mysqli_query($conn,"insert into exam_question (exam_id, exam_question, exam_ch1, exam_ch2, exam_ch3, exam_ch4, exam_answer, q_type)
			values ('$examId', '$question', '$choice_A','$choice_B', '$choice_C','$choice_D', '$correctAnswer', '$type')");
			$_SESSION['info'] = "Please input correct answer";
			header("location:manage-exam.php?id=$examId");
			exit(0);
		}else{

			mysqli_query($conn,"insert into exam_question (exam_id, exam_question, exam_ch1, exam_ch2, exam_ch3, exam_ch4, exam_answer, q_type)
			values ('$examId', '$question', '$choice_A','$choice_B', '$choice_C','$choice_D', '$correctAnswer', '$type')");
		   header("location:manage-exam.php?id=$examId");

		}
		

	}else{
		mysqli_query($conn,"insert into exam_question (exam_id, exam_question, exam_ch1, exam_ch2, exam_ch3, exam_ch4, exam_answer, q_type)
	 values ('$examId', '$question', '$choice_A','$choice_B', '$choice_C','$choice_D', '$correctAnswer', '$type')");
	header("location:manage-exam.php?id=$examId");
	}
	
	
}
	
	

?>


