<?php

$dbhost = 'localhost:3060';
$dbuser = 'wordlyAccess';
$dbpass = 'wordlyAccess';
$dbname = 'SchoolSourceQuestions';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(!$conn) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname);

$sql = "SELECT * FROM `questions` ORDER BY RAND() LIMIT 1";

$result = mysql_query($sql, $conn);


if(!$result) {
	echo ("No Questions Available :(");
} else {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$final = $row["Question"];
	}

	echo ($final);
}

mysql_close();

?>