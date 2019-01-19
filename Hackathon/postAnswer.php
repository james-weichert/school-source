<?php

$array=json_decode($_GET['r']);

$question = $array[0];
$answer = $array[1];

$dbhost = 'localhost:3060';
$dbuser = 'wordlyAccess';
$dbpass = 'wordlyAccess';
$dbname = 'SchoolSourceQuestions';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(!$conn) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname);

if(!mysql_query("SELECT Answer1 FROM `questions` WHERE Question='".$question."'", $conn)) {
	if(!mysql_query("SELECT Answer2 FROM `questions` WHERE Question='".$question."'", $conn)) {
		if(!mysql_query("SELECT Answer3 FROM `questions` WHERE Question='".$question."'", $conn)) {
			if(!mysql_query("SELECT Answer4 FROM `questions` WHERE Question='".$question."'", $conn)) {
				if(!mysql_query("SELECT Answer5 FROM `questions` WHERE Question='".$question."'", $conn)) {
					if(!mysql_query("SELECT Answer6 FROM `questions` WHERE Question='".$question."'", $conn)) {

					} else {
						mysql_query("UPDATE `questions` SET Answer6='".$answer."' WHERE Question='".$question."'", $conn);
					}
				} else {
					mysql_query("UPDATE `questions` SET Answer5='".$answer."' WHERE Question='".$question."'", $conn);
				}
			} else {
				mysql_query("UPDATE `questions` SET Answer4='".$answer."' WHERE Question='".$question."'", $conn);
			}
		} else {
			mysql_query("UPDATE `questions` SET Answer3='".$answer."' WHERE Question='".$question."'", $conn);
		}
	} else {
		mysql_query("UPDATE `questions` SET Answer2='".$answer."' WHERE Question='".$question."'", $conn);
	}
} else {
	mysql_query("UPDATE `questions` SET Answer1='".$answer."' WHERE Question='".$question."'", $conn);
}


?>