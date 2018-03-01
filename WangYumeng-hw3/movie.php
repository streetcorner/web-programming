<!DOCTYPE html>
<html>
	<head>
		<title>TMNT - Rancid Tomatoes</title>
		<meta charset="utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<div id="banner1">
			<img src="images/rancidbanner.png" alt="Rancid Tomatoes"/>
		</div>

		<a href="home.html"><img class="imglink" src=" images/goback.png" alt="Go Back"/></a>
		<?php 
		//index of different pages;
		$movie = $_GET["film"];
		$moviesrc="moviedb/$movie";
		list($tittle, $year, $percentage) = file("$moviesrc/info.txt");
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
				<div id="banner2">
					
					<?php
					//bigger than 60 is a fresh tomato,otherwise is a rotten one.
					if($percentage>60){
						$tomato="images/freshlarge.png";
						$alt="Fresh";
					}else{
						$tomato="images/rottenlarge.png";
						$alt="Rotten";
					}
					?>
					<img src=<?= $tomato ?> alt= <?= $alt ?> />
					<font1><?= $percentage?>%</font1>
				</div>
				
				<?php
					//show reviews
					$reviewfile = glob("$moviesrc/review*.txt");
					$num = count($reviewfile);
					/*echo (int)($num/2);*/ 
					/*print ($reviewfile[0]);*/
					function fresh_rooten($cri){
						//trim($cri);
						if(trim($cri)==="FRESH")
							$result= "images/fresh.gif";
						else if(trim($cri)==="ROTTEN")
							$result= "images/rotten.gif";
						return $result;
					}
					
					function review($reviewfile, $f){ //
						list($review, $cri, $reviewer, $publication)=file($reviewfile[$f]);
						/*echo fresh_rooten($cri);*/
				?>		
						<p class="comment">
							<img src="<?= fresh_rooten($cri) ?>"/>
							<q><?= $review ?></q>
						</p>
						<p>
							<img src="images/critic.gif" alt="Critic" />
							<?= $reviewer ?><br />
							<?= $publication ?>
						</p>
				<?php
					}
				?>

				<div id="left-review">
					<?php 
					$f=0;
					/*list($review, $cri, $reviewer, $publication)=file($reviewfile[$f]);
					echo $cri."qqq";*/
					while($f <= (int)($num/2)){
						review($reviewfile, $f);
						$f++;
					}
					?>
				</div><!--left comment-->

				<div id="right-review">
					<?php 
					//output right reviews
					while($f < $num){
						review($reviewfile, $f);
						$f++;
					}
					?>
					
				</div><!--right comment-->
			</div><!--left-->
			<p id="footer">(1-<?= $num?>) of 88</p>
		</div><!--pg1-->

	</body>
</html>
