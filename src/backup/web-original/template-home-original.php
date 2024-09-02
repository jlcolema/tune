<?php

/* Template Name: Home Template */
				
	/* get work samples */
	$args = array(
		'numberposts'=>3,
		'post_type'=>'work',
		'orderby'=>'menu_order',
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

				<div class="flexslider featured-work recent-work">

					<ul class="slides">
					
					
						<?php
							foreach($items as $item):

								echo '<li>';
		
									echo '<div class="project">';
									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'full');
									$image_url = $image_url[0];
		
										echo '<div class="img">';
											echo '<a href="' . get_permalink($item->ID) . '"><img src="' . $image_url . '" alt="' . $item->post_title . '" /></a>';
										echo '</div>';

										echo '<div class="project-details">';

											echo '<h4><a href="' . get_permalink($item->ID) . '">' . $item->post_title . '</a></h4>';
			
											//echo '<p>' . $item->post_excerpt . '</p>';
			
											echo '<p class="cta"><a href="' . get_permalink($item->ID)  . '">View Project</a></p>';

										echo '</div>';

									echo '</div>';
		
								echo '</li>';
								
							endforeach;
						?>
						
						<?php /*

						<li>

							<div class="project">

								<div class="img">
									<a href="/work/bluelock"><img src="/wp-content/themes/tune/-/media/work-example.jpg" alt="Title of project." /></a>
								</div>
	
								<h4><a href="/work/bluelock">Project Title</a></h4>
	
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	
								<p class="cta"><a href="/work/bluelock">Call to Action</a></p>

							</div>

						</li>

						<li>

							<div class="project">

								<div class="img">
									<a href="/work/bluelock"><img src="/wp-content/themes/tune/-/media/work-example.jpg" alt="Title of project." /></a>
								</div>
	
								<h4><a href="/work/bluelock">Project Title</a></h4>
	
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	
								<p class="cta"><a href="/work/bluelock">Call to Action</a></p>

							</div>

						</li>

						<li>

							<div class="project">

								<div class="img">
									<a href="/work/bluelock"><img src="/wp-content/themes/tune/-/media/work-example.jpg" alt="Title of project." /></a>
								</div>
	
								<h4><a href="/work/bluelock">Project Title</a></h4>
	
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	
								<p class="cta"><a href="/work/bluelock">Call to Action</a></p>

							</div>

						</li>
						
						*/ ?>

					</ul>

				</div>

				<p class="more-work"><a href="/work">See more work</a></p>

			</div>

		</article>

		<?php endwhile; endif; ?>

	</div>

	<?php include('-/inc/contact-form.php') ?>

<?php get_footer(); ?>