<?php

/* Template Name: Contact */

?>

<?php get_header(); ?>

<div itemscope itemtype="http://schema.org/ContactPage">

	<div class="section">

		<div class="inner-wrap">

			<div class="inner-inner-wrap">

				<h2><?php the_title(); ?></h2>

			</div>

		</div>

	</div>

	<div class="opener">

		<?php echo get_post_meta($post->ID, 'pageheadline', true); ?>

	</div>

	<div id="primary">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<div class="contact-wrap group">

				<?php include('-/inc/contact-form.php') ?>

				<div class="contact-details">

					<div class="contact-details-inner-wrap">

						<?php the_content(); ?>

					</div>

				</div>

			</div>

			<div class="entry">

				<div class="map-wrap">

					<div id="map_canvas"></div>

				</div>

			</div>

		</article>
		
		<?php endwhile; endif; ?>

	</div>

</div>

<?php get_footer(); ?>
