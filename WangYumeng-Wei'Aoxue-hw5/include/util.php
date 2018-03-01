<?php

# returns the relative path of the database folder
function dbpath() {
	return "2doDB";
}

# returns the first name of the user of login $login
function get_name($login) { //get first name
	$dbpath = dbpath();
	$info = file("$dbpath/$login/info.txt",FILE_IGNORE_NEW_LINES);
	return "$info[1] $info[2]";
}

# extract the note id (a number) from the file path
# of the file. For example, note_id("2doDB/marc/notes/3") returns "3"
function note_id($note_file_path) {
	$notesfile = glob("$note_file_path/*");
	$num = count($notesfile);
	$th = $num+1;
	//rename file from 1 to num
	return $th;
}



# returns the title of the $note array
function get_title($note_path) {
	$a=file("$note_path",FILE_IGNORE_NEW_LINES);
	return $a[0];
}

# returns the date of the $note array
function get_date($note_path) {
	$a=file("$note_path",FILE_IGNORE_NEW_LINES);
	$datetime = explode(" ",$a[1]);
	return $datetime;
}


?>
