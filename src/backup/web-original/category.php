<?php get_header(); ?>

	<div class="section">

		<div class="inner-wrap">

			<div class="inner-inner-wrap">

				<h2>Archive</h2>

			</div>

		</div>

	</div>

	<div class="opener">

		<h3>Funny thing about us:</h3>

		<p>We think your sites should look exactly the way you want them to.</p>

	</div>

	<div id="primary" class="group">

		<?php if (have_posts()) : ?>

		<div class="archive-wrap">

			<div class="archive-inner-wrap">

				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
				
				<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="page-title">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
				
				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="page-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
				
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="page-title">Archive for <?php the_time('F jS, Y'); ?></h2>
				
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="page-title">Archive for <?php the_time('F, Y'); ?></h2>
				
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="page-title">Archive for <?php the_time('Y'); ?></h2>
				
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="page-title">Author Archive</h2>
				
				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="page-title">Blog Archives</h2>
				
				<?php } ?>
	
	
				<?php include (TEMPLATEPATH . '/-/inc/nav.php' ); ?>
	
				<?php while (have_posts()) : the_post(); ?>
	
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
			
					<h2>Nothing found</h2>
			
				<?php endif; ?>

			</div>

		</div>

		<div class="sidebar">

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
