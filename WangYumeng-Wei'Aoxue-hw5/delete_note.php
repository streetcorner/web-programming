<?php

function reorder($notes_path){
	$notesfile = glob("$notes_path/*");
	$num = count($notesfile);
	$th = $num+1;
	//rename file from 1 to num
	$i=1;
	foreach ($notesfile as $note) {
		rename("$note", "$notes_path/$i");
		$i++;
	}	
}

unlink("$notes_path/$note_id");
reorder($notes_path);
?>