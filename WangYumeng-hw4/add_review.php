<?php
$movie = $_GET["film"];
$moviesrc = "moviedb/$movie";

$review = $_GET["review"];
$rating = $_GET["rating"];
$name = $_GET["name"];
$organization = $_GET["organization"];

$reviewfile = glob("$moviesrc/review*.txt");
$num = count($reviewfile);
$th=$num+1;
//for the review10, we must change the name of 1-9 into 01-09
if($th ==10){
	for($i=0; $i <10; $i++){
		rename("$moviesrc/review$i.txt","$moviesrc/review0$i.txt");
	}
}
/*name is only a test of add_review_error.php;
$rating|| $name|| $organization are using required in  add_review_form.php*/
if(empty($name))
	header("Location: add_review_error.php?film=$movie");
	/*<form method="post" action="add_review_form.php">
		<input >
	</form>*/
else{
 	/*die("Add Review Success!");*/
 	file_put_contents("./$moviesrc/review$th.txt","$review\n$rating\n$name\n$organization");
  	header("Location: movie.php?film=$movie");
}
?>