<!DOCTYPE html>
<?php
	$movie = $_REQUEST["film"];
	$info = file($movie."/info.txt");
	$overview = file($movie."/overview.txt");
	$reviews = glob($movie."/review*.txt");
	
?>
<html><!-- CSCB20 Assignment 2: Fresh Tomatoes Web page --><head>
		<title><?= $info[0];?>- Rancid Tomatoes</title>

		<meta charset="utf-8">
		<!-- this "base" element allows all image references below to be "relative",
		     meaning that you the image name, such as "overview.png", is appended
		     to this base URL.  NOTE however, that the same behavior will apply
		     to any other URL's below, and so those will have to be replaced with
		     absolute URL's written as "https://mathlab.../path_to_your_files".-->
		<link href="fresh.css" type="text/css" rel="stylesheet">

		<base href="https://mathlab.utsc.utoronto.ca/courses/cscb20w17/bretsche/assignments/a2/img/"> 
		<!-- Link to CSS file that you should create -->
	</head>

	<body style="background: url(background.png)">
		<div class="banner" style="background: url(bannerbg.png)">
			<img src="banner.png" alt="Rancid Tomatoes">
		</div>

		<h1><?= $info[0]."(".trim($info[1]).")";?></h1>
	
		<div class="overall-content">
			<div class="general">
				<div>
					<?php echo "<img src='../".$movie."/overview.png' alt='general overview'>"; ?>
				</div>
				<div class="info">
					<dl>
						<?php 
							foreach ($overview as $line) {
								$e = explode(":", $line); ?>

								<dt><?= $e[0] ?></dt>
								<dd>
								 	<?php 
									echo $e[1];
									if ($e[2]) {
										echo $e[2];
									}
									for ($i=1; $i<count($e); $i++) {
										echo $e[i];
									}
									?>
								 </dd>
							<?php 
							}
						?>
					</dl>
				</div>
			</div>
			<div class="left-section">
				<div class="fresh" style="background: url(rottenbg.png);">
				<?php if ($info[2] < 60) {
					echo "<img src='rottenbig.png' alt='Rotten'>";
				} else {
					echo "<img src='freshbig.png' alt='Fresh'>";
				}?>
					<strong style="vertical-align: top"><?= $info[2]."%"?></strong>
				</div>
				<div class='reviews'>
				<?php ;
					if (count($reviews) %2 != 0) {
						$lreviews = array_slice($reviews, 0, count($reviews)/2 +1);
						$rreviews = array_slice($reviews, count($reviews)/2 +1);
					} else {
						$lreviews = array_slice($reviews, 0, count($reviews)/2);
				      	$rreviews = array_slice($reviews, count($reviews)/2);
					}
				 ?>
					<div id='lsec'>
						<?php foreach ($lreviews as $r){ 
							$review = file($r) ?>
						<div class='review'>
							<div class='quote'>
								<p>
									<?php 
									if (trim($review[1]) =='FRESH') {
										$src = "src='fresh.gif'";
										$alt = "alt='Fresh'";
									} else {
										$src = "src='rotten.gif'";
										$alt = "alt='Rotten'";
									}
									echo "<img class='rattingpic' ".$src." ".$alt.'>';
									?>
									<q>
										<?= $review[0]?>
									</q>
								</p>
							</div>
							<div class='critic'>
								<p>
									<img class="criticpic" src="critic.gif" alt="Critic">
									<?= $review[2]?> <br>
									<i> <?=$review[3]?></i>
								</p>
							</div>
						</div>
					<?php } ?>
					</div>
					<div id='rsec'>
						<?php foreach ($rreviews as $r){ 
							$review = file($r) ?>
						<div class='review'>
							<div class='quote'>
								<p>
									<?php 
									if (trim($review[1]) =='FRESH') {
										$src = "src='fresh.gif'";
										$alt = "alt='Fresh'";
									} else {
										$src = "src='rotten.gif'";
										$alt = "alt='Rotten'";
									}
									echo "<img class='rattingpic' ".$src." ".$alt.'>';
									?>
									<q>
										<?= $review[0]?>
									</q>
								</p>
							</div>
							<div class='critic'>
								<p>
									<img class="criticpic" src="critic.gif" alt="Critic">
									<?= $review[2]?> <br>
									<i> <?=$review[3]?></i>
								</p>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
				
			</div>
			<div class="bottom">
				<p>(1-<?=count($reviews)?>) of <?=count($reviews)?></p>
			</div>
		</div>
		<div class="w3c">
			<p>
      <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" width="88" height="31"></a>
    </p>
  
			<a href="../../css_validator.php"><img src="w3c-css.png" alt="Valid CSS"></a>
		</div>
	

</body>
</html>