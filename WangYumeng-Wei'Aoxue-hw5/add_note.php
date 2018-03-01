<?php
session_start();
include("include/util.php");

$login = $_SESSION["login"];
$note_title = $_POST["note_title"];
$dbpath = dbpath();
$notes_path = "$dbpath/$login/notes";

if(empty(trim($note_title))){
	header("Location: error.php?type=note");
}
else{
	$id = note_id($notes_path);
	$date =date('Y-m-j h:ia');
	file_put_contents("$notes_path/$id", "$note_title\nCreated $date\n ");
	header("Location: notes.php");
}
?>