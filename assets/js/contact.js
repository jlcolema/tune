$(window).load(function() {
	$(".contact-form .more").next('.gform_wrapper').slideToggle(1);
});


		function initialize() {

			var myLatlng = new google.maps.LatLng(39.76839, -86.15696);
			var mapOptions = {
				zoom: 16,
				center: myLatlng,
				mapTypeId: "Toner",
				mapTypeControlOptions: {
					mapTypeIds: ["Toner", "Terrain", "Watercolor"]
				}
			}

			var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

			map.mapTypes.set("Toner", new google.maps.StamenMapType("toner"));
			map.mapTypes.set("Terrain", new google.maps.StamenMapType("terrain"));
			map.mapTypes.set("Watercolor", new google.maps.StamenMapType("watercolor"));

			var contentString =

			'<div id="content">'+

				'<div id="siteNotice">'+'</div>'+

				'<h1 id="firstHeading" class="firstHeading">Tune Development</h1>'+

				'<div id="bodyContent">'+

					'<p>Circle Tower<br />'+
					'55 Monument Circle, &#8470; 719<br />'+
					'Indianapolis, IN 46204</p>'+

					'<p>o: (317) 829-3620<br />'+
					'c: (317) 513-6288<br />'+
					'f: (317) 216-3688</p>'+

					'<p><a href="http://maps.google.com/maps?q=55+monument+circle+suite+719,+indianapolis,+in&client=safari&oe=UTF-8&hnear=55+Monument+Cir,+Indianapolis,+Indiana+46204&gl=us&t=m&z=16">Get Directions</a></p>'+

				'</div>'+
		
			'</div>';

			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});

			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: 'Tune Development'
			});

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});

			// Center
			
			var center;
			
			function calculateCenter() {
				center = map.getCenter();
			}
			
			google.maps.event.addDomListener(map, 'idle', function() {
				calculateCenter();
			});
			
			google.maps.event.addDomListener(window, 'resize', function() {
				map.setCenter(center);
			});

		}