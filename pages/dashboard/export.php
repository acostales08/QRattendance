<?php
session_start();
ob_start();
include '../config.php';
$filename = 'AttenadanceRecord-'.date('Y-m-d').'.csv';

$query = "SELECT * FROM table_attendance";
$result = mysqli_query($conn,$query);

$array = array();

$file = fopen($filename,"w");
$array = array("ID","STUDENT ID","TIME IN ","TIME OUT","LOG DATE","STATUS");
fputcsv($file,$array);

while($row = mysqli_fetch_array($result)){
    $ID =$row['ID'];
    $STUDENTID =$row['StudentID'];
    $TIMEIN =$row['TIMEIN'];
    $TIMEOUT =$row['TIMEOUT'];
    $LOGDATE =$row['LOGDATE'];
    $STATUS =$row['STATUS'];

    $array = array($ID,$STUDENTID,$TIMEIN,$TIMEOUT,$LOGDATE,$STATUS);
    fputcsv($file,$array);
}
fclose($file);

header("Content-Description: File Transfer");
header("Content-Disposition: Attachment; filename=$filename");
header("Content-type: application/csv;");
readfile($filename);
unlink($filename);
exit();

?>