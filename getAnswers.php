<?php

$q = $_GET["q"];

$dbhost = 'localhost:3060';
$dbuser = 'wordlyAccess';
$dbpass = 'wordlyAccess';
$dbname = 'SchoolSourceQuestions';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(!$conn) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname);

$sql = "SELECT * FROM `questions` WHERE Question='".$q."'";

$result = mysql_query($sql, $conn);

$answers = [];

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$answers[0] = $row['Answer1'];
	$answers[1] = $row['Answer2'];
	$answers[2] = $row['Answer3'];
	$answers[3] = $row['Answer4'];
	$answers[4] = $row['Answer5'];
	$answers[5] = $row['Answer6'];
}

if(!$answers[0]) {
	echo ("No answers quite yet. Click refresh.");
} else {
	echo ("<br />".$answers[0]."<br />".$answers[1]."<br />".$answers[2]."<br />".$answers[3]."<br />".$answers[4]."<br />".$answers[5]);
}

mysql_close();

?>