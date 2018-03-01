<!DOCTYPE html>
<html>
	<head>
		<title>Rancid Tomatoes</title>

		<meta charset="utf-8" />
		<link href="css/home.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="banner">
			<img src="images/rancidbanner.png" alt="Rancid Tomatoes" />
		</div>

		<h1>Movie reviews</h1>

<?php 
	//index movie_x
	$moviesrc =glob("moviedb/*");	
	function rotten_fresh($rating){
		if($rating>60)
			return "fresh";
		else
			return "rotten";
	}
	function link_movie($moviesrc){
		//find movie link
		 foreach ($moviesrc as $moviex) {
		 	list($tittle, $year, $rating) = file("$moviex/info.txt");
		 	$url=explode("/", $moviex);
		 	/*echo $rating;
		 	echo rotten_fresh($rating);*/
		?>
	 	<li id="<?= rotten_fresh($rating) ?>">
			<a class="link" href="movie.php?film=<?= $url[1] ?>"><?= $tittle ?></a>
		</li>
		<?php
		}//foreach
	}//function
	?>
 -->
<div id="content">
	<ul>
		<?= link_movie($moviesrc) ?>
	</ul>
</div>

<div id ="addlink">
	<a href="add_movie_form.php">Add a New Movie</a>
</div>

<div id="footer">
	 2015 &copy; Rancid Tomatoes <img src="images/fresh.gif" alt="Fresh" />
</div>
	
	</body>
</html>
