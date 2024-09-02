		</div>

		<footer id="footer">

			<nav>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

			</nav>

			<div class="inner-wrap">

				<div class="inner-inner-wrap">

					<div class="recent-posts">
		
						<h3>Recent Posts</h3>
		
						<?php
					
							global $post;
							$args = array( 'numberposts' => 1 );
							$recentposts = get_posts( $args );
					
							foreach( $recentposts as $post ) : setup_postdata($post);
							
						?>
		
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		
						<?php the_excerpt(); ?>
		
						<p class="author"><?php the_author_posts_link(); ?></p>
		
						<?php endforeach; ?>
					
					</div>
		
					<div class="support">
		
						<h3><a href="/contact">Are you in need of support&mdash;we are here to help.</a></h3>
		
					</div>
		
					<?php
		
						if ( ! is_404() )
							dynamic_sidebar('Footer Widgets');
		
					?>

				</div>

				<div class="ul-corner"></div>
				<div class="ur-corner"></div>
				<div class="lr-corner"></div>
				<div class="ll-corner"></div>

			</div>
	
			<p id="copyright" class="source-org vcard copyright"><small>Copyright <?php echo date("Y"); echo " "; bloginfo('name'); ?></small></p>

		</footer>

	</div>

	<?php wp_footer(); ?>

	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

	<script type="text/javascript" src="http://maps.stamen.com/js/tile.stamen.js?v1.1.2"></script>

	<script type="text/javascript">
            function initialize() {

                var options = {
                  center: new google.maps.LatLng(39.768, -86.16),
                  zoom: 16,
                  mapTypeId: "Toner",
                  mapTypeControlOptions: {
                      mapTypeIds: ["Toner", "Terrain", "Watercolor"]
                  }
                };

			var map = new google.maps.Map(document.getElementById("map"), options);
			map.mapTypes.set("Toner", new google.maps.StamenMapType("toner"));
			map.mapTypes.set("Terrain", new google.maps.StamenMapType("terrain"));
			map.mapTypes.set("Watercolor", new google.maps.StamenMapType("watercolor"));

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





			var myLatlng = new google.maps.LatLng(39.76839, -86.15696);

			var mapOptions = {
				zoom: 16,
				center: myLatlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
			}

			var map = new google.maps.Map(document.getElementById("map"), mapOptions);

			var marker = new google.maps.Marker({
				position: myLatlng,
				title:"Hello World!"
			});

			// To add the marker to the map, call setMap();

var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title:"Hello World!"
  });
			marker.setMap(map);

			}
		</script>

<script>
      function initialize() {
        var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
        var mapOptions = {
          zoom: 4,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Hello World!'
        });
      }
    </script>
	<script src="<?php bloginfo('template_directory'); ?>/-/js/functions.js"></script>
	
	<!--
	
		Asynchronous google analytics; this is the official snippet.
		Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
	
		<script>
	
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
			_gaq.push(['_trackPageview']);
	
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
	
		</script>
	
	-->

</body>

</html>