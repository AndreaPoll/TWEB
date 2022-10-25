<!DOCTYPE html>

	<?php $movie=$_GET["film"];?>

	<head>
		<title>Rancid Tomatoes</title>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="movie.css" type="text/css" rel="stylesheet">
		<link href="movie.css" type="text/css" rel="stylesheet">
		<link rel="icon" type="image/x-icon" href="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif">
	</head>

	<body>
		<div id="backgroundBanner">
			<spam id="banner">
				<img id="bannerIMG" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes">
			</spam>
		</div>

		<!-- completare il titolo -->
		<?php 
			switch($movie){
				case "mortalkombat": list($nomeFilm, $annoProduzione, $percentualeGradimento) = file("mortalkombat/info.txt"); ?> <h1> <?php print $nomeFilm . $annoProduzione ?> </h1>
		<?php 						break;							
				case "princessbride": list($nomeFilm, $annoProduzione, $percentualeGradimento) = file("princessbride/info.txt"); ?> <h1> <?php print $nomeFilm . $annoProduzione ?> </h1>
		<?php 						break;
				case "tmnt": list($nomeFilm, $annoProduzione, $percentualeGradimento) = file("tmnt/info.txt"); ?> <h1> <?php print $nomeFilm . $annoProduzione ?> </h1>
		<?php 				 break;
				case "tmnt2": list($nomeFilm, $annoProduzione, $percentualeGradimento) = file("tmnt2/info.txt"); ?> <h1> <?php print $nomeFilm . $annoProduzione ?> </h1>
		<?php 				  break;
			} ?>

		<!-- completare il css per la leftbar-->
		<div id="article">	
			<div id="rightbox">
				<div>
					<?php 
						switch($movie){
							case "mortalkombat": ?> <img src="mortalkombat/overview.png" alt="general overview">
					<?php 						break;							
							case "princessbride": ?> <img src="princessbride/overview.png" alt="general overview">
					<?php 						break;
							case "tmnt": ?> <img src="tmnt/overview.png" alt="general overview">
					<?php 				 break;
							case "tmnt2": ?> <img src="tmnt2/overview.png" alt="general overview">
					<?php 				  break;
						} ?>
				</div>

				<div id="liste">
				<?php 
					switch($movie){
						case "mortalkombat": $descrizioneFilm = file("mortalkombat/overview.txt"); 
											break;
						case "princessbride": $descrizioneFilm = file("princessbride/overview.txt");
											break;
						case "tmnt" : $descrizioneFilm = file("tmnt/overview.txt");
									break;
						case "tmnt2" : $descrizioneFilm = file("tmnt2/overview.txt");
							break;  
					}	
					for($i=0; $i<sizeof($descrizioneFilm); $i++){
						$partiDescrizioneFilm = explode(":", $descrizioneFilm[$i]);
				?>
				<dl>
					<dt><?=$partiDescrizioneFilm[0] ?></dt>
					<?php if(strcmp($partiDescrizioneFilm[0], "STARRING") == 0){
								$listaAttori = explode(",", $partiDescrizioneFilm[1]);
								for($y=0; $y<sizeof($listaAttori); $y++){ ?>
									<dd><?=$listaAttori[$y]?></dd>
						<?php	}
							} else {?>
							<dd><?=$partiDescrizioneFilm[1]?></dd>
					<?php }
						} ?>
				</dl>
				</div> <!-- css list closer -->
			</div> <!-- leftbar closer-->

		
			
		<!-- forse c'è da fare un box apposito per l'autore -->
		<div id="leftbox">
			<div id="percentualeGradimento">
				<?php if($percentualeGradimento > 60){ ?>	
					<img  src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/freshbig.png" alt="Rotten"> 
				<?php }else{ ?>
					<img  src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png" alt="Rotten">
				<?php }  ?>
				<?=$percentualeGradimento?>%
			</div>
			
			<div id="sinistra">
			<?php 
				$directory = getcwd()."/$movie/";
				$Folder = glob( $directory ."*" );
				$filecount = count($Folder)-3;
				$sinistra = ceil($filecount/2);
				for($x=1; $x<$sinistra; $x++){
					if(strcmp($movie, "tmnt2") == 0 && $x <= 9)
						$commento = file("$movie/review0$x.txt"); 
					else 
						$commento = file("$movie/review$x.txt"); ?>
						<div id="prova">
						<p id="commenti">
						<?php if(strcmp($commento[1], "FRESH ") == -1){ ?>
							<img id="immaginiCommenti" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Rotten">
						<?php }else {?>
							<img id="immaginiCommenti" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten">
						<?php } ?>
							<q><?=$commento[0]?></q>
						</p>
				
						<p id="autore">
							<img id="immagineAutore" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
							<?=$commento[2]?> <br>
							<?=$commento[3]?> 
						</p>
						</div>
		<?php	}	?>
			</div>

			<div id="destra">
			<?php 
				$directory = getcwd()."/$movie/";
				$Folder = glob( $directory ."*" );
				$filecount = count($Folder)-3;
				for($x=$sinistra; $x<=$filecount; $x++){
					if(strcmp($movie, "tmnt2") == 0 && $x <= 9)
						$commento = file("$movie/review0$x.txt"); 
					else 
						$commento = file("$movie/review$x.txt"); ?>
						<div id="prova">
						<p id="commenti">
						<?php if(strcmp($commento[1],"FRESH ") == -1){ ?>
							<img id="immaginiCommenti" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif"s alt="Rotten">
						<?php }else {?>
							<img id="immaginiCommenti" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten">
						<?php } ?>
							<q><?=$commento[0]?></q>
						</p>
				
						<p id="autore">
							<img id="immagineAutore" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
							<?=$commento[2]?> <br>
							<?=$commento[3]?> 
						</p>
						</div>
		<?php	}	?>
			</div>
		</div>
		<p id="bottomBar">(1-10) of 88</p>
		</div> <!-- article closer -->


		<div id="links">
			<a href="http://validator.w3.org/check/referer"><img id="imgLinks" width="88" src="https://upload.wikimedia.org/wikipedia/commons/b/bb/W3C_HTML5_certified.png" alt="Valid HTML5!"></a>
			<br>
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img id="imgLinks" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!"></a>
		</div>
	</body>
</html>
