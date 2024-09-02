		</div>

		<footer id="footer" class="group" itemscope itemtype="http://schema.org/WPFooter">

			<nav itemscope itemtype="http://schema.org/SiteNavigationElement">

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

			</nav>

			<div class="inner-wrap">

				<div class="inner-inner-wrap">

					<div class="widget-wrap group">

						<div class="recent-posts widget-container">
	
							<div class="recent-post">
			
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
	
						</div>
						
	
						<?php					
							$args = array(
								'numberposts'=>1,
								'post_type'=>'testimonials',
								'orderby'=>'rand',
								'post_status'=>'publish'
							);
							$items = get_posts($args);
						?>
			
						<div class="support widget-container">
	
							<div class="recent-testimonial">
			
								<h3>Testimonial</h3>
	
								<?php
									/*
									foreach($items as $item):
										$agency = get_post_meta($item->ID, 'Agency', true);
										$agency = str_ireplace('["', '', $agency);
										$agency = str_ireplace('"]', '', $agency);
										$agency = get_post($agency, 'ARRAY_A');
										echo '<p>' . $item->post_content . '</p>';
										echo '<p class="attribution">' . $item->post_title;
										if ( get_post_meta($item->ID, 'hide_agency_name', true) == 0 ) {
											echo '<em>' . $agency['post_title'] . '</em>';
										}
										echo '</p>';
									endforeach;
									*/
								?>
									<script type="text/javascript" src="/js/random-testimonial.js"></script>
										
									</script>
									<div id="container"></div>
							</div>
	
						</div>

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
	
			<p id="copyright" class="source-org vcard copyright"><small>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?></small></p>

		</footer>

	</div>

	<?php wp_footer(); ?>
	
	<?php if (stripos($_SERVER['REQUEST_URI'],'/work') !== false && !is_single() ) { ?>
		<script type="text/javascript" src="/js/workHeight.js"></script>
    <?php } ?>

    <!-- Slides -->

	<script type="text/javascript" src="/js/sequence.js"></script>

	<!-- Responsive Tables -->

	<script type="text/javascript" src="/js/responsive-tables.js"></script>
		
	<!-- Services page -->
	<?php if (stripos($_SERVER['REQUEST_URI'],'/services') !== false) { ?>
		<script type="text/javascript" src="/js/servicesHeight.js"></script>
	<?php } ?>
	    
	
	<?php if (stripos($_SERVER['REQUEST_URI'],'/contact') !== false) { ?>
		<script type="text/javascript">$(window).load(function() { initialize(); });</script>
	<?php } ?>
	
	<?php /*<script type="text/javascript">var _sf_async_config = { uid: 20551, domain: 'tunedevelopment.com' }; (function() { function loadChartbeat() { window._sf_endpt = (new Date()).getTime(); var e = document.createElement('script'); e.setAttribute('language', 'javascript'); e.setAttribute('type', 'text/javascript'); e.setAttribute('src', (("https:" == document.location.protocol) ? "https://a248.e.akamai.net/chartbeat.download.akamai.com/102508/" : "http://static.chartbeat.com/") + "js/chartbeat.js"); document.body.appendChild(e); }; var oldonload = window.onload; window.onload = (typeof window.onload != 'function') ? loadChartbeat : function() { oldonload(); loadChartbeat(); };  })();</script>*/ ?>
</body>

</html>