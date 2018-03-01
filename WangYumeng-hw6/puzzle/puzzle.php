<?php
	function extract_letter($s) {//input $s=puzzle/image1/part-a.jpeg 
		$a = explode(".",basename($s));
		$a = explode("-",$a[0]);
		return $a[1];//return a,b,c,d...
	}
	
	$puzzle = $_GET["puzzle"]; //image*
    $array = glob("puzzle/$puzzle/part-*.jpeg");
	shuffle($array);//random sort $array
	$title = file_get_contents("puzzle/$puzzle/title.txt");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Puzzle</title>

    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="puzzle.css" />
    <script type="text/javascript" src="puzzle.js"></script>
  </head>

<body>
	
<h1><?= $title ?></h1>

<img id="image" src="puzzle/<?= $puzzle ?>/image.jpeg" />

<div id="puzzle">
	<div>
	<?php
	for ( $i = 0; $i < count($array); $i++ ) {
		if ( $i > 0 && $i % 4 == 0 ) {
		?>
		</div><div> <!-- every 4 images are a module -->
		<?php
		}
		?>
        <img name="<?= extract_letter($array[$i]) ?>" onclick="click_on(this)" src="<?= $array[$i] ?>" />
		<?php //name =a,b,c,...  $array=puzzle/image1/part-a.jpeg
	}
	?>
	</div>
</div>
<div id="result">You solved the puzzle!!</div>

</body>
</html>
