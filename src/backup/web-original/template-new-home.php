<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>Tune Slide Theme</title>
	<link rel="stylesheet" type="text/css" media="screen" href="http://tunedevelopment.com/tune-content/themes/tune/-/css/sequencejs-theme.modern-slide-in.css" />
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" media="screen" href="css/sequencejs-theme.modern-slide-in.ie.css" /><![endif]-->
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://tunedevelopment.com/tune-content/themes/tune/-/js/sequence.js"></script>
	<script type="text/javascript">	
		
		$(document).ready(function(){
			var options = {
				nextButton: true,
				prevButton: true,
				animateStartingFrameIn: true,
				reverseAnimationsWhenNavigatingBackwards: true,
				swipeNavigation: false,
				transitionThreshold: 250,
				preloadTheseFrames: [1],
				preloadTheseImages: [
					"images/work/three-sixty-group.jpg",
					"images/work/bluelock.png",
					"images/work/smarter-remarketer.png"
				]
			};

			var sequence = $("#sequence").sequence(options).data("sequence");

		});
	</script>
</head>
<body>	

	<div class="new-slideshow-container">

		<div class="new-slideshow-inner-wrap">

			<div class="new-slideshow-navigation">

				<div class="prev">Previous</div>
				<div class="next">Next</div>

			</div>
				
			<div id="sequence">

				<ul>

					<li>

						<img class="img animate-in" src="http://tunedevelopment.com/tune-content/themes/tune/-/images/work/three-sixty-group.jpg" alt="Project 1" />

						<div class="details animate-in">

							<h2 class="title">Three Sixty Group</h2>

							<h3 class="cta"><a href="#">View Project</a></h3>

						</div>

					</li>

					<li>

						<img class="img" src="http://tunedevelopment.com/tune-content/themes/tune/-/images/work/bluelock.png" alt="Project 2" />

						<div class="details">

							<h2 class="title">Bluelock</h2>

							<h3 class="cta"><a href="#">View Project</a></h3>

						</div>

					</li>

					<li>

						<img class="img" src="http://tunedevelopment.com/tune-content/themes/tune/-/images/work/smarter-remarketer.png" alt="Project 3" />

						<div class="details">

							<h2 class="title">Smarter Remarketer</h2>

							<h3 class="cta"><a href="#">View Project</a></h3>

						</div>

					</li>

				</ul>

			</div>

		</div>

	</div>

</body>

</html>
