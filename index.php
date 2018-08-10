<!-- Coded by Griffin Saiia for Progressive Insurance Monitor Display Project -->

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" content="Operations" />
		<title>ETS Operations Display</title>
		<link type="text/css" rel="stylesheet" href="picture_frame.css">
	</head>
	<body>
		<?php
		//Edit this path to point to the slide Directory
		$dirPath = "/var/www/html/slides/";
		$logPath = "/var/www/html/logfile.txt";
		$slides = scandir($dirPath) or die();
		$command = escapeshellcmd($_SERVER['DOCUMENT_ROOT']."/calculateRTime.py");
		shell_exec($command);
		?>
		<section class="second-gallery-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12" style="text-align:center">
						<div class="slideshow-container">
							<?php
							$rTimes = array();
							$myfile = fopen($logPath,"r") or die();
							while (!feof($myfile)){
								$temp = fgets($myfile);
								$entry = preg_replace( "/\r|\n/", "", $temp );
								if(!($entry == "")){
									array_push($rTimes, $entry);
								}
							}
							foreach ($slides as $slide){
								if(!($slide == "." || $slide == "..")){
									foreach ($rTimes as $rTime){
										if(!($rTime == "." || $rTime == ".."))
											echo "<div class=\"mySlides fade\">";
												echo "<img src=\"slides/{$slide}\" style=\"width:90%\" gifRunTime=\"{$rTime}\">";
											echo "</div>";
									}
								}
							}
							?>
							<br>
							<div style="text-align:center">
								<?php
								foreach ($slides as $slide){
									if(!($slide == "." || $slide == "..")){
										echo "<span class=\"dot\"></span>";
									}
								}
								?>
								<br/>
								<br/>
							</div>
						</div>
						<script>
						var slideIndex = 0;
						showSlides();
						function showSlides() {
							var i;
							var slides = document.getElementsByClassName("mySlides");
							var dots = document.getElementsByClassName("dot");
							for (i = 0; i < slides.length; i++) {
								slides[i].style.display = "none";
							}
							slideIndex++;
							if (slideIndex > slides.length) {slideIndex = 1}
							for (i = 0; i < dots.length; i++) {
								 dots[i].className = dots[i].className.replace(" active", "");
							}
							var runtime = slides[slideIndex-1].gifRunTime;
							slides[slideIndex-1].style.display = "block";
							dots[slideIndex-1].className += " active";
							setTimeout(showSlides, runtime);
						}
					</script>
				</div>
			</div>
		</div>
	</section>

	</body>
</html>
