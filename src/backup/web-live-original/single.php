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

	<div id="primary" class="group">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting">

			<div class="entry">

				<h1 class="page-title" itemprop="name"><?php the_title(); ?></h1>
	
				<div class="entry-content">
	
					<footer class="meta">
						<span class="byline author vcard">
							<span class="fn"><em>by</em> <span itemprop="author"><?php the_author_posts_link() ?></span> <em>on</em> <?php the_date() ?></span>
						</span>
					</footer>	
	
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	
					<footer class="postmetadata">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
						Posted in <?php the_category(', ') ?> <span class="sep">|</span>
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					</footer>
	
				</div>

				<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) : ?>

				<div id="author-info">

					<h3><?php printf( __( 'About %s', 'tune' ), get_the_author() ); ?></h2>

					<div id="author-description" class="group">

						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'tune_author_bio_avatar_size', 50 ) ); ?>
						</div>

						<p><?php the_author_meta( 'description' ); ?></p>

					</div>

				</div>

				<?php endif; ?>

				<?php comments_template(); ?>

			</div>

		</article>

		<div class="sidebar">

			<?php get_sidebar(); ?>

		</div>

		<?php $nav_title = 'Posts'; include('-/inc/next-prev.php'); ?>

	<?php endwhile; endif; ?>

	</div>

<?php get_footer(); ?>