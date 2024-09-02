<?php get_header(); ?>

	<div class="section">

		<div class="inner-wrap">

			<div class="inner-inner-wrap">

				<h2>Blog</h2>

			</div>

		</div>

	</div>

	<div class="opener">

		<h3>Funny thing about us:</h3>

		<p>We think your sites should look exactly the way you want them to.</p>

	</div>

	<div id="primary">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div class="inner-wrap">

				<h2 class="page-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	
				<footer class="meta">
					<span class="byline author vcard">
						<span class="fn"><em>by</em> <?php the_author_posts_link() ?> <em>on</em> <?php the_date() ?></span>
					</span>
				</footer>	

				<div class="entry">

					<?php the_excerpt(); ?>

					<p class="cta"><a href="<?php the_permalink() ?>">Read More</a></p>

				</div>
	
				<footer class="postmetadata">
					<?php the_tags('Tags: ', ', ', '<br />'); ?>
					Posted in <?php the_category(', ') ?> | 
					<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</footer>

			</div>

		</article>

		<?php endwhile; ?>
	
		<?php include (TEMPLATEPATH . '/-/inc/nav.php' ); ?>
	
		<?php else : ?>
	
			<h2>Not Found</h2>
	
		<?php endif; ?>
		
	</div>

	<?php include('-/inc/contact-form.php') ?>

<?php get_footer(); ?>
