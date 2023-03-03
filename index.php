<?php
if(isset($_POST['where'])){
	$where=$_POST['where'];
	$responseWeather=file_get_contents("https://api.weatherapi.com/v1/current.json?key=174364a9b84c4ff1a7735256222112&q=<?php=$where?>&aqi=yes");

$WeatherData = json_decode($responseWeather);
}else{
	$responseWeather=file_get_contents("https://api.weatherapi.com/v1/current.json?key=174364a9b84c4ff1a7735256222112&q=dhaka&aqi=yes");

	$WeatherData = json_decode($responseWeather);
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Compass Starter by Ariona, Rian</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
<style>
	.sbox{
		border: 2px solid #009AD8;
	}
</style>
	</head>


	<body>
		
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" class="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Company name</h1>
							<small class="site-description">tagline goes here</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index.html">Home</a></li>
							<!-- <li class="menu-item"><a href="news.html">News</a></li> -->
							<li class="menu-item"><a href="live-cameras.html">Live cameras</a></li>
							<!-- <li class="menu-item"><a href="photos.html">Photos</a></li> -->
							<li class="menu-item"><a href="contact.html">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<div class="hero" data-bg-image="">
				<div class="container">
					<form method="post" class="find-location">
						<input type="text" class="sbox" name="where" placeholder="Find your location...">
						<input type="submit" value="Find">
					</form>

				</div>
			</div>
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?=$WeatherData->location->localtime?></div>
								<div class="date"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="location"><?=$WeatherData->location->name?></div>
								<div class="degree">
									<div class="num"><?=$WeatherData->current->temp_c?><sup>o</sup>C</div>
									<div class="forecast-icon">
										<img src="<?=$WeatherData->current->condition->icon?>" alt="" width=95>
									</div>	
								</div>
								<span><img src="images/icon-umberella.png" alt=""><?=$WeatherData->current->humidity?>%</span>
								<span><img src="images/icon-wind.png" alt=""><?=$WeatherData->current->wind_kph?>km/h</span>
								<span><img src="images/icon-compass.png" alt=""><?=$WeatherData->current->wind_dir?></span>
							</div>
						</div>
					
				
					</div>
				</div>
			</div>
		<!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<form action="#" class="subscribe-form">
								<input type="text" placeholder="Enter your email to subscribe...">
								<input type="submit" value="Subscribe">
							</form>
						</div>
						<div class="col-md-3 col-md-offset-1">
							<div class="social-links">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</div>
						</div>
					</div>

					<p class="colophon">Copyright 2014 Company name. Designed by Milon. All rights reserved</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>