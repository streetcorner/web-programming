<?php
$moviesrc="moviedb";
$moviefile = glob("$moviesrc/*");
$th = count($moviefile)+1;
$newmoviesrc="$moviesrc/movie$th";
mkdir("$newmoviesrc");
//info.txt
if(is_uploaded_file($_FILES["info"]["tmp_name"])){
	move_uploaded_file($_FILES["info"]["tmp_name"],"$newmoviesrc/info.txt");
}
//overview.txt
if(is_uploaded_file($_FILES["overview"]["tmp_name"])){
	move_uploaded_file($_FILES["overview"]["tmp_name"],"$newmoviesrc/overview.txt");
}
//overview.png
if(is_uploaded_file($_FILES["image"]["tmp_name"])){
	move_uploaded_file($_FILES["image"]["tmp_name"],"$newmoviesrc/overview.png");
}
for($i=1; $i<11; $i++){
	if(is_uploaded_file($_FILES["review$i"]["tmp_name"]))
		move_uploaded_file($_FILES["review$i"]["tmp_name"],"$newmoviesrc/review$i.txt");
	else
		break;
}
header("Location: home.php");
?>

