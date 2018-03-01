<!DOCTYPE html>
<html>
	<head>
		<title>TMNT - Rancid Tomatoes</title>
		<meta charset="utf-8" />
		<link href="css/movie.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<div id="banner">
			<img src="images/rancidbanner.png" alt="Rancid Tomatoes"/>
		</div>

		<a href="home.php"><img id="backlink" src=" images/goback.png" alt="Go Back"/></a>
		<?php 
		//index of different pages;
		$movie = $_GET["film"];
		$moviesrc="moviedb/$movie";
		list($tittle, $year, $rating) = file("$moviesrc/info.txt");
		?>

		<h1><?= $tittle ?> (<?= $year ?>)</h1>
		
		<div id="content">
			<div id="right">
				<div>
					<img src="<?= $moviesrc ?>/overview.png" alt="general overview"/>
				</div>

				<?php 
				//output the overview content
				$ov=file("$moviesrc/overview.txt");
				/*echo $ov[0];*/
				function ouput_overview($ov){

					foreach ($ov as $ovline) {
						$ovcontent=explode(":",$ovline);
						/*echo $ovcontent[0];*/
						$top=$ovcontent[0];
						$tail=$ovcontent[1];
				?>
						<dt><?= $top ?></dt>
						<dd><?= $tail ?></dd>
				<?php
					}
				}
				?>

				<dl>
					<?= ouput_overview($ov) ?>
					
				</dl>
			</div><!--right-->

			<div id="left">
				<div id="left-banner">
					
					<?php
					//bigger than 60 is a fresh tomato,otherwise is a rotten one.
					if($rating>60){
						$tomato="images/freshlarge.png";
						$alt="Fresh";
					}else{
						$tomato="images/rottenlarge.png";
						$alt="Rotten";
					}
					?>
					<img src=<?= $tomato ?> alt= <?= $alt ?> />
					<font1><?= $rating?>%</font1>
				</div>
				
				<?php
				//show reviews
				$reviewfile = glob("$moviesrc/review*.txt");
				$num = count($reviewfile);
				/*echo (int)($num/2);*/ 
				/*foreach ($reviewfile as $reviewline) {
					echo $reviewline;
				}*/
				/*print ($reviewfile[0]);*/
				function fresh_rooten($cri){
					//trim($cri);
					if(trim($cri)==="FRESH")
						$result= "images/fresh.gif";
					else if(trim($cri)==="ROTTEN")
						$result= "images/rotten.gif";
					return $result;
				}
				
				function review($reviewfile, $i){ //
					list($review, $cri, $reviewer, $publication)=file($reviewfile[$i]);
					/*echo fresh_rooten($cri);*/
					?>		
					<p id="review">
						<img src="<?= fresh_rooten($cri) ?>"/>
						<q><?= $review ?></q>
					</p>
					<p>
						<img src="images/critic.gif" alt="Critic" />
						<?= $reviewer ?><br />
						<?= $publication ?>
					<?php
				}
				?>

				<div id="left-review">
					</p>
					<?php 
					for($i=0; $i<(round($num/2)); $i++){
						review($reviewfile, $i);
					}
					?>
				</div><!--left review-->

				<div id="right-review">
					<?php 
					//output right reviews
					for($j=(round($num/2)); $j<$num; $j++){
						review($reviewfile, $j);
					}
					?>
					<!-- post movie name to add_review_form -->
					<div id="addreview">
					 	<!-- <a href="add_review_form.php">Add New Review</a> -->
					 	<form action="add_review_form.php" method="post">
							<input type="hidden" name="movie" value="<?= $movie ?>">
							<input type="submit" value="Add New Review">
						</form>
					</div>

					
				</div><!--right review-->
			</div><!--left-->
			<p id="footer">(1-<?= $num?>) of 88</p>
		</div><!--pg1-->

	</body>
</html>
