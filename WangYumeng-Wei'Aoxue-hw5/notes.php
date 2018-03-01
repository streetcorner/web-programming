<?php

session_start();
include("include/util.php");

$login = $_SESSION["login"];
$dbpath =dbpath();
$notes_path = "$dbpath/$login/notes";
//output todos in a note
function output_todos($note_path){
	$todos = file("$note_path", FILE_IGNORE_NEW_LINES);
	$num_of_todos =count($todos);
	for ($j=2; $j <$num_of_todos ; $j++) { 
	?>
		<li><span class="todo"><?= $todos[$j] ?></span></li>
	<?php
	}
}
//output all notes of a login account
function output_notes($notes_path,$login){
	$notes = glob("$notes_path/*");
	$num_of_notes = count($notes);
	//i represent the name of notes_file
	for ($i=1; $i <= $num_of_notes; $i++) { 
		$note_path ="$notes_path/$i";
		$note_content =file("$note_path");
		?>
		<form class="list left" action="perform_action.php?login=<?= $login ?>" method="post">	
			<input type="hidden" name="todo_id" value="<?= $i ?>" />
			<div class="note_title" title="<?= $note_content[1] ?>">
				<?= get_title($note_path) ?>			
				<input class="button right" type="submit" name="delete_note" value="X" title="delete this note"/>
			</div>	
			<ul>
						<li><span class="todo"></span></li>
						<?= output_todos($note_path) ?>
					</ul>
			<div>
				<input class ='left text_input' type="text" name="new_todo" />
				<input class ='right button' type="submit" name="add_todo" value="+" title="add a todo"/>
			</div>	
		</form>
		<?php
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>2DO</title>
    <meta charset="utf-8" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
  </head>
<body>
	
	<a id="logout" href="logout.php">
		<input class="button" type="button" value="Logout" />
	</a>
	
	<div id="top_banner">
		<form method="post" action="add_note.php?login=<?= $login?>" > 
			<div>
				<span class="left"><?= get_name($login) ?>'s <span id="logo">2DO</span> notes</span>
			</div>
			<div class="right">
				<input class="button right" type="submit" value="Add note" title="add a new note"/>
				<input class="right" type="text" name="note_title" />
				<div>Enter the title of your new note here</div>
			</div>
		</form>
	</div>
	<!-- notes -->
	<div id="content">
	<?= output_notes($notes_path,$login) ?>
	
</div>
</body>
</html>