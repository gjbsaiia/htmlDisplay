<!-- Coded by Griffin Saiia for Progressive Insurance Recruitment Project -->

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
		$dirPath = "/var/www/html/slides/";
		$slides = scandir($dirPath) or die();
		?>
		<section class="second-gallery-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12" style="text-align:center">
						<div class="slideshow-container">
							<?php
							foreach ($slides as $slide){
								if(!($slide == "." || $slide == "..")){
									echo "<div class=\"mySlides fade\">";
										echo "<img src=\"slides/{$slide}\" style=\"width:90%\">";
									echo "</div>";
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
							slides[slideIndex-1].style.display = "block";
							dots[slideIndex-1].className += " active";
							setTimeout(showSlides, 9000);
						}
					</script>
				</div>
			</div>
		</div>
	</section>

	</body>
</html>
