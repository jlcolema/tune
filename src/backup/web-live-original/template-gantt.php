<?php

/* Template Name: Gantt */

?>
<?php
/**
 * The template for displaying the gantt chart.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
 error_reporting(E_ALL);
ini_set('display_errors', '1');

	// get all portfolio items
	$args = array(
		'numberposts'=>-1,
		'post_type'=>'gantt',
		'orderby'=>'title',
		'order'=>'asc',
		'post_status'=>'publish'
		
	);
	$items = get_posts($args); 
	
 ?>

		<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
        <link rel="stylesheet" href="/css/style_gantt.css" />
        <link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" />
        <link rel="stylesheet" href="http://taitems.github.com/UX-Lab/core/css/prettify.css" />

		<div id="primary">
			<div id="content" role="main">

				
			<div class="gantt"></div>
			<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script src="/js/jquery.fn.gantt.js"></script>
	<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
	<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-popover.js"></script>
	<script src="http://taitems.github.com/UX-Lab/core/js/prettify.js"></script>
    <script>

		$(function() {

			"use strict";

			$(".gantt").gantt({
				source: [
				
				<?php
				
							
						foreach($items as $item):
							$start = new DateTime(get_post_meta($item->ID, 'start_date', true));	
							$end = new DateTime(get_post_meta($item->ID, 'end_date', true));
							echo '{';
								echo 'name: "' . $item->post_title . '",';
								echo 'desc: "' . $item->post_content . '",';
								echo 'values: [{';
									echo 'dep: false,';
									echo 'from: "/Date(' . $start->format('U') . '000)/",';
									echo 'to: "/Date(' . $end->format('U') . '000)/",';
									echo 'label: "' . $item->post_title . '",';
									echo 'customClass: "ganttRed",';
			
								echo '}]';
							echo '},';
						endforeach;
				
				?>
				],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover."
			});

			prettyPrint();

		});

    </script>

			</div><!-- #content -->
		</div><!-- #primary -->
