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
							<meta itemprop="alternativeHeadline" content="<?php get_post_meta($post->ID, 'yoast_wpseo_title', true) ?>" />
							
							<ul itemprop="accountablePerson">
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
		
							<div class="overview">
			
								<div itemprop="description">
									<?php the_content(); ?>
								</div>
								
								<?php include('-/inc/testimonial-work.php'); ?>
		
								<?php if ( strlen(get_custom_field('url')) ) { ?><p class="url"><a itemprop="contentLocation" href="<?php print_custom_field('url'); ?>" rel="external">Visit the website &raquo;</a></p><?php } ?>
		
							</div>
	
						</div>
	
						<div class="services">
		
							<h3>Services</h3>
							<ul>
							<?php
								$my_services = get_custom_field('services');
								$my_services = explode(',', $my_services);
								
								foreach($my_services as $service):
									echo '<li>' . str_ireplace(' ', '&nbsp;', get_post($service)->post_title) . '</li>';
								endforeach;
							?>
							</ul>
							<?php /* print_custom_field('services:formatted_list', array('<li>[+value+]</li>','<ul>[+content+]</ul>') ); */ ?>

						</div>

					</div>

					<!-- New Slideshow -->

					<div class="new-slideshow-container">
				
						<div class="new-slideshow-inner-wrap">
				
							<div class="new-slideshow-navigation">
				
								<div class="prev"><span>Previous</span></div>
								<div class="next"><span>Next</span></div>
				
							</div>
								
							<div id="sequence">
				
								<ul>

									<?php
									
										if( has_post_thumbnail() ){
									
											$image_id = get_post_thumbnail_id();
											$image_url = wp_get_attachment_image_src($image_id,'work-slider'); 
											$image_url = $image_url[0];
											
											// get attachment info
											$image_title = get_the_title($image_id);
											$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
											echo '<li>';
				
												echo '<img class="img" src="' .$image_url . '" alt="' . get_the_title() . '" itemprop="associatedMedia" />';
											
												/* this used to output the iPad and iPhone images on top of the first featured image
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
												*/
			
												echo '<div class="details">';
					
													echo '<h2 class="title">' . $image_alt . '</h2>';
			
												echo '</div>';
			
											echo '</li>';						
										}
										
										for($i=2; $i < 11; $i++){
											$imageName = 'featured_image_'.$i;
											$post_type = get_post_type($post->ID);
											if( MultiPostThumbnails::has_post_thumbnail($post_type, $imageName, $post->ID) ){
												$image_id = MultiPostThumbnails::get_post_thumbnail_id($post_type,$imageName,$post->ID);
												$image_url = wp_get_attachment_image_src($image_id, 'work-slider');
												$image_url = $image_url[0];
												$image_title = get_the_title($image_id);
												$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
												
												if ( $image_url != '' ) {
				
													echo '<li>';
			
														echo '<img class="img" src="' .$image_url . '" alt="' . get_the_title() . '" itemprop="associatedMedia" />';
			
														echo '<div class="details">';
					
															echo '<h2 class="title">' . $image_alt . '</h2>';

														echo '</div>';
			
													echo '</li>';
				
												}
											}
										}
									?>

								</ul>
				
							</div>
				
						</div>
						
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