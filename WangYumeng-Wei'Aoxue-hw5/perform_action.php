<?php
	session_start();
	include("include/util.php");
/*	check();*/

	$login= $_GET["login"];
	$note_id=$_POST["todo_id"];
	$dbpath = dbpath();
	$notes_path = "$dbpath/$login/notes";
		
	if ( isset($_POST["delete_note"])) {//delete,and reorder
		include("delete_note.php");
	}
	else {//submit
		include("add_todo.php");
	}
	header("Location: notes.php");
?>