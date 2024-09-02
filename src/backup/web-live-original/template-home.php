<?php

/* Template Name: Home Template */
				
	/* get work samples */
	$args = array(
		'numberposts'=>3,
		'post_type'=>'work',
		'orderby'=>'menu_order',
		'order'=>'asc',
		'post_status'=>'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'work_category',
				'field' => 'slug',
				'terms' => 'featured'
			)
		)
	);
	$items = get_posts($args);

?>

<?php get_header(); ?>

	<div class="opener">
	
		<?php echo get_post_meta($post->ID, 'pageheadline', true); ?>
		
	</div>
	
	<!-- <div class="entry-content"><?php the_content(); ?></div> -->

	<div class="banner">

		<h3>Work</h3>

	</div>

	<div id="primary">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<?php /*
			<div class="opener">
			
				<?php echo get_post_meta($post->ID, 'pageheadline', true); ?>
				
			</div>
			*/ ?>

			<div class="entry">

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
									foreach($items as $item):
				
										$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'work-slider');
										$image_url = $image_url[0];
		
										echo '<li>';
					
												echo '<img class="img" src="' . $image_url . '" alt="' . $item->post_title . '" />';
		
												echo '<a href="' . get_permalink($item->ID) . '" class="details">';
		
													echo '<h2 class="title">' . $item->post_title . '</h2>';
					
													echo '<h3 class="cta">View Project</h3>';
		
												echo '</a>';

										echo '</li>';
										
									endforeach;
								?>
			
							</ul>
			
						</div>
			
					</div>
			
				</div>
				
				<p class="more-work"><a href="/work">See more work</a></p>

			</div>

		</article>

		<?php endwhile; endif; ?>

	</div>

	<?php include('-/inc/contact-form.php') ?>

<?php get_footer(); ?>