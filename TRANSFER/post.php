<?php

$array=json_decode($_POST['q']);

$question = $array[0];
$subject = $array[1];
$teacher = $array[2];

$dbhost = 'localhost:3060';
$dbuser = 'wordlyAccess';
$dbpass = 'wordlyAccess';
$dbname = 'SchoolSourceQuestions';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(!$conn) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname);

$sql = "INSERT INTO `questions` (Question, Subject, Teacher) VALUES('".$question."', '".$subject."', '".$teacher."')";

mysql_query($sql, $conn);

mysql_close();

?>