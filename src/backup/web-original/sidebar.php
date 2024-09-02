<div id="secondary">

	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>

	<!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

	<div class="widget">

		<h2 class="widget-title">Archives</h2>

		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>

	</div>

	<div class="widget">

		<h2 class="widget-title">Categories</h2>
	
		<ul>
			<?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>

	</div>

	<?php endif; ?>

	<?php include('-/inc/social-media.php') ?>

</div>