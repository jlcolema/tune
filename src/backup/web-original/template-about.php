<?php

/* Template Name: About */

?>

<?php get_header(); ?>

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

			<div class="entry">

				<h3 class="page-title"><?php the_title(); ?></h3>

				<?php the_content(); ?>

			</div>
			
		</article>
		
		<?php endwhile; endif; ?>

	</div>

	<?php include('-/inc/contact-form.php') ?>

<?php get_footer(); ?>
