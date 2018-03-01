<?php
$new_todo = $_POST["new_todo"];
if(empty(trim($new_todo))){//empty todo
	header("Location: error.php?type=todo");
	die();//make error.php takes effect
}
else
	file_put_contents("$notes_path/$note_id", "$new_todo\n",FILE_APPEND);
?>