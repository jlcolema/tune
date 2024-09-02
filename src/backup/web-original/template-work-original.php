<?php

/* Template Name: Work Template */
				
	/* get work samples */
	$args = array(
		'numberposts'=>-1,
		'post_type'=>'work',
		'orderby'=>'menu_order',
		'post_status'=>'publish'
	);
	$items = get_posts($args);
?>

<?php get_header(); ?>

	<div id="primary">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<div class="section">

				<div class="inner-wrap">

					<div class="inner-inner-wrap">

						<h2><?php the_title(); ?></h2>

					</div>

				</div>

			</div>

			<div class="opener">

				<h3>Some very impressive agencies have taken credit for our work.</h3>

				<p>Here&rsquo;s a showcase (albeit a partial one) of our recent work. Because we&rsquo;re often behind the scenes for our clients, we can&rsquo;t always claim our work. To see a more complete portfolio, just <a href="/contact">contact us</a>.</p>

			</div>

			<div class="entry">

				<?php the_content(); ?>

				<div class="recent-work">

					<ul class="group">
					
					
						<?php
							$counter = 0;
							foreach($items as $item):
								$counter++;
								if($counter % 2) {
									echo '<li class="group" itemscope itemtype="http://schema.org/CreativeWork">';
								} else {
									echo '<li itemscope itemtype="http://schema.org/CreativeWork">';
								}
		
									echo '<div class="project">';
									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'full');
									$image_url = $image_url[0];
		
										echo '<div class="img">';
											echo '<a href="' . get_permalink($item->ID) . '"><img src="' . $image_url . '" alt="' . $item->post_title . '" itemprop="associatedMedia" /></a>';
										echo '</div>';
										
										echo '<div class="text">';
			
											echo '<h4 itemprop="title"><a href="' . get_permalink($item->ID) . '">' . $item->post_title . '</a></h4>';
				
											echo '<p itemprop="description">' . $item->post_excerpt . '</p>';
				
											echo '<p class="cta" itemprop="url"><a href="' . get_permalink($item->ID)  . '">View Project</a></p>';
											
										echo '</div>';
		
									echo '</div>';
		
								echo '</li>';
								
							endforeach;
						?>

					</ul>

					<p class="more"><a href="/work">See more work</a></p>

				</div>
	
				<?php include('-/inc/contact-form.php') ?>

			</div>

		</article>
		
		<?php endwhile; endif; ?>

	</div>

<?php get_footer(); ?>
