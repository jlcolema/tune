<?php get_header(); ?>

	<div class="section">

		<div class="inner-wrap">

			<div class="inner-inner-wrap">

				<h2>Work</h2>

			</div>

		</div>

	</div>

	<div id="primary">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<div class="entry">

				<div class="project" itemscope itemtype="http://schema.org/CreativeWork">

					<div class="meta group">

						<div class="details">
	
							<h1 itemprop="title"><?php the_title(); ?></h1>
							<ul>
							<?php
								$my_agencies = get_custom_field('Agency:to_array');
							?>
							</ul>
							<p class="agency">Agency <span>&#9758</span>
							
								<?php
									foreach($my_agencies as $agency):
										//set var for later use
										$agency_name = get_post($agency)->post_title;
										echo '<a href="' . get_post_meta($agency, 'url', true) . '" rel="external">' . $agency_name . '</a>';
									endforeach;
								?>
								<?php /* <a href="<?php print_custom_field('Agency:to_link_href','http://yoursite.com/default/page/');?>">Click here</a> */ ?>
							</p>
		
							<div class="overview" itemprop="description">
			
								<?php the_content(); ?>
		
								<p class="url"><a itemprop="url" href="<?php print_custom_field('url'); ?>" rel="external">Visit the website &raquo;</a></p>
		
							</div>
	
						</div>
	
						<div class="services">
		
							<h3>Services</h3>
							<ul>
							<?php
								$my_services = get_custom_field('services');
								$my_services = explode(',', $my_services);
								
								foreach($my_services as $service):
									echo '<li>' . get_post($service)->post_title . '</li>';
								endforeach;
							?>
							</ul>
							<?php /* print_custom_field('services:formatted_list', array('<li>[+value+]</li>','<ul>[+content+]</ul>') ); */ ?>

						</div>

					</div>
					
					<div class="flexslider">
	
						<ul class="slides">
							<?php
							
								if( has_post_thumbnail() ){
							
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id,'large'); 
									$image_url = $image_url[0];
									
									// get attachment info
									$image_title = get_the_title($image_id);
									$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
									echo '<li>';
		
										echo '<div class="img">';
		
											echo '<img src="' .$image_url . '" alt="' . get_the_title() . '" itemprop="associatedMedia" />';
										
											if( MultiPostThumbnails::has_post_thumbnail($post_type, 'ipad_image', $post->ID) ){
												$image_id = MultiPostThumbnails::get_post_thumbnail_id($post_type,'ipad_image',$post->ID);
												$image_url = wp_get_attachment_url($image_id, 'large');
												echo '<div class="ipad_image">';
													echo '<img src="' .$image_url . '" alt="' . get_the_title() . '" itemprop="associatedMedia" />';
												echo '</div>';
											}
											
											if( MultiPostThumbnails::has_post_thumbnail($post_type, 'iPhone_image', $post->ID) ){
												$image_id = MultiPostThumbnails::get_post_thumbnail_id($post_type,'iPhone_image',$post->ID);
												$image_url = wp_get_attachment_url($image_id, 'large');
												echo '<div class="iphone_image">';
													echo '<img src="' .$image_url . '" alt="' . get_the_title() . '" itemprop="associatedMedia" />';
												echo '</div>';
											}
		
										echo '</div>';
	
										echo '<div class="caption">';
			
											echo '<h2>' . $image_title . '</h2>';
			
											echo '<p>' . $image_alt . '</p>';
	
										echo '</div>';
	
									echo '</li>';						
								}
								
								for($i=2; $i < 11; $i++){
									$imageName = 'featured_image_'.$i;
									$post_type = get_post_type($post->ID);
									if( MultiPostThumbnails::has_post_thumbnail($post_type, $imageName, $post->ID) ){
										$image_id = MultiPostThumbnails::get_post_thumbnail_id($post_type,$imageName,$post->ID);
										$image_url = wp_get_attachment_url($image_id, 'large');
										$image_title = get_the_title($image_id);
										$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
										
										if ( $image_url != '' ) {
		
											echo '<li>';
	
												echo '<div class="img">';
	
													echo '<img src="' .$image_url . '" alt="' . get_the_title() . '" itemprop="associatedMedia" />';
	
												echo '</div>';
	
												echo '<div class="caption">';
			
													echo '<h2>' . $image_title . '</h2>';
			
													echo '<p>' . $image_alt . '</p>';
			
												echo '</div>';
	
											echo '</li>';
		
										}
									}
								}
							?>
						</ul>
				
						<?php
						
							$args = array(
								'numberposts'=>1,
								'post_type'=>'testimonials',
								'orderby'=>'rand',
								'post_status'=>'publish',
								'meta_query' => array(
									array(
										'key' => 'Agency',
										'value' => array(get_post_meta($post->ID, "Agency", true)),
										'compare' => 'IN'
									)
								)
							);
							$testimonials = get_posts($args);
						
							/**
							 * Get either a Gravatar URL or complete image tag for a specified email address.
							 *
							 * @param string $email The email address
							 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
							 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
							 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
							 * @param boole $img True to return a complete IMG tag False for just the URL
							 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
							 * @return String containing either just a URL or a complete image tag
							 * @source http://gravatar.com/site/implement/images/php/
							 */
							function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
								$url = 'http://www.gravatar.com/avatar/';
								$url .= md5( strtolower( trim( $email ) ) );
								$url .= "?s=$s&d=$d&r=$r";
								if ( $img ) {
									$url = '<img src="' . $url . '"';
									foreach ( $atts as $key => $val )
										$url .= ' ' . $key . '="' . $val . '"';
									$url .= ' />';
								}
								return $url;
							}
							if (count($testimonials) > 0) {
							
								foreach($testimonials as $testimonial):
								
									if (get_post_meta($testimonial->ID, 'show_gravatar', true) == 1 && strlen(get_post_meta($testimonial->ID, 'email', true)) > 0) {
									
											$gravatar = '<img src="' . get_gravatar(get_post_meta($testimonial->ID, 'email', true)) . '" style="height:80px; width:80px; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%;" />';
											
										
									} else {
									
										$gravatar = '<img src="http://www.tunedevelopment.com/assets/icon-testimonial1.png" alt="Testimonial Icon" />';
									
									}	
									
								endforeach;	
								
							} else {
								
								$gravatar = '<img src="http://www.tunedevelopment.com/assets/icon-testimonial1.png" alt="Testimonial Icon" />';
								
							}				
			
							foreach($testimonials as $testimonial):
								echo $gravatar;
								echo '<p>' . $testimonial->post_content . '</p>';
								echo '<p>' . $testimonial->post_title . ', ' . $agency_name .  '</p>';
							
							endforeach;	
						?>
						
					</div>
				
					<?php include('-/inc/social-media.php') ?>

				</div>

				<?php $nav_title = 'Work'; include('-/inc/next-prev.php'); ?>

			</div>

			<?php /* <p class="more"><a href="/work">See more work</a></p> */ ?>
			
		</article>

	<?php endwhile; // end of the loop. ?>

	</div>

	<?php include('-/inc/contact-form.php') ?>

<?php get_footer(); ?>