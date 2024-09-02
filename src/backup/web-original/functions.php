<?php


	/*-------------------------------------------
		Show error messages
	-------------------------------------------*/
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	add_filter( 'jpeg_quality', 'my_jpeg_quality' );
	function my_jpeg_quality( $quality ) { return 95; }
	

	// Translations can be filed in the /languages/ directory

	load_theme_textdomain( 'tune', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if ( is_readable($locale_file) )
			require_once($locale_file);
	
	// Add RSS links to <head> section

	automatic_feed_links();


	
	/*-------------------------------------------
		Nav Menu
	-------------------------------------------*/
	register_nav_menu( 'primary', __( 'Primary Menu', 'tune' ) );
	
	
	/*-------------------------------------------
		Sidebars
	-------------------------------------------*/
	if (function_exists('register_sidebar')) {

		register_sidebar(array(
			'name' => __('Sidebar Widgets','tune' ),
			'id'   => 'sidebar-widgets',
			'description'   => __( 'These are widgets for the sidebar.','tune' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));

		register_sidebar(array(
			'name' => __('Footer Widgets','tune' ),
			'id'   => 'footer-widgets',
			'description'   => __( 'These are widgets for the footer.','tune' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));

	}
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video', 'post-thumbnail'));
	
	
	
	/*-------------------------------------------
		Dump
	-------------------------------------------*/
	function dump($data) {
	    if(is_array($data)) { //If the given variable is an array, print using the print_r function.
	        print "<pre>-----------------------\n";
	        print_r($data);
	        print "-----------------------</pre>";
	    } elseif (is_object($data)) {
	        print "<pre>==========================\n";
	        var_dump($data);
	        print "===========================</pre>";
	    } else {
	        print "=========&gt; ";
	        var_dump($data);
	        print " &lt;=========";
	    }
	} 


	/*-------------------------------------------
		Set up Multiple post thumbnails 
		for specific pages
	-------------------------------------------*/
	add_theme_support( 'post-thumbnails', array( 'work' ) );
	add_image_size( 'work-grid', 502, 354, true); // For recent article thumbnails that appear in a four-column section.
	add_image_size( 'work-slider', 802, 566, true); // For the main people page.
	if (class_exists('MultiPostThumbnails')) {
		
		for($i = 2; $i < 11; $i++){
			new MultiPostThumbnails(array(
				'label' => 'Featured Image '.$i,
				'id' => 'featured_image_'.$i,
				'post_type' => 'work'
			) );
		}
		new MultiPostThumbnails(array(
			'label' => 'iPad Image ',
			'id' => 'ipad_image',
			'post_type' => 'work'
		) );
		new MultiPostThumbnails(array(
			'label' => 'iPhone Image ',
			'id' => 'iPhone_image',
			'post_type' => 'work'
		) );
	}
	
	
	/*-------------------------------------------
		Clean up WordPress identity
	-------------------------------------------*/
	function removeHeadLinks() {
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	}
	add_action('init', 'removeHeadLinks');
	
	function roots_flush_rewrites() {
	  global $wp_rewrite;
	  $wp_rewrite->flush_rules();
	}
	
	function roots_add_rewrites($content) {
	  $theme_name = next(explode('/themes/', get_stylesheet_directory()));
	  global $wp_rewrite;
	  $roots_new_non_wp_rules = array(
	    'css/(.*)'      => 'tune-content/themes/'. $theme_name . '/css/$1',
	    'js/(.*)'       => 'tune-content/themes/'. $theme_name . '/js/$1',
	    'img/(.*)'      => 'tune-content/themes/'. $theme_name . '/img/$1',
	    'media/(.*)'    => 'tune-content/themes/'. $theme_name . '/media/$1',
	    'plugins/(.*)'  => 'tune-content/plugins/$1',
	    'includes/(.*)'  => 'tune-content/includes/$1',
	    'w3tc/(.*)'  	=> 'tune-content/w3tc/$1'
	  );
	  $wp_rewrite->non_wp_rules += $roots_new_non_wp_rules;
	}
	add_action('admin_init', 'roots_flush_rewrites');
	
	function roots_clean_assets($content) {
	  $theme_name = next(explode('/themes/', $content));
	  $current_path = '/tune-content/themes/' . $theme_name;
	  $new_path = '';
	  $content = str_replace($current_path, $new_path, $content);
	  return $content;
	}
	
	function roots_clean_plugins($content) {
	  $current_path = '/tune-content/plugins';
	  $new_path = '/plugins';
	  $content = str_replace($current_path, $new_path, $content);
	  return $content;
	}
	
	function roots_clean_includes($content) {
	  $current_path = '/wp-includes';
	  $new_path = '/includes';
	  $content = str_replace($current_path, $new_path, $content);
	  return $content;
	}
	
	function roots_clean_w3tc($content) {
	  $current_path = '/tune-content/w3tc';
	  $new_path = '/w3tc';
	  $content = str_replace($current_path, $new_path, $content);
	  return $content;
	}
	
	add_action('generate_rewrite_rules', 	'roots_add_rewrites');
	add_filter('plugins_url', 				'roots_clean_plugins');
	add_filter('bloginfo', 					'roots_clean_assets');
	add_filter('stylesheet_directory_uri', 	'roots_clean_assets');
	add_filter('template_directory_uri', 	'roots_clean_assets');
	add_filter('script_loader_src', 		'roots_clean_plugins');
	add_filter('style_loader_src', 			'roots_clean_plugins');
		
	
	// Remove CSS added from the Recent Comments widget
	function roots_remove_recent_comments_style() {
	  global $wp_widget_factory;
	  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
	    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	  }
	}
	add_action('wp_head', 'roots_remove_recent_comments_style', 1);
	
	// Remove CSS added from galleries
	function roots_gallery_style($css) {
	  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
	}
	add_filter('gallery_style', 'roots_gallery_style');
	
	// Replace various active menu class names with "active"
	function roots_wp_nav_menu($text) {
	  $replace = array(
	    'current-menu-item'     => 'active',
	    'current-menu-parent'   => 'active',
	    'current-menu-ancestor' => 'active',
	    'current_page_item'     => 'active',
	    'current_page_parent'   => 'active',
	    'current_page_ancestor' => 'active',
	  );
	
	  $text = str_replace(array_keys($replace), $replace, $text);
	  return $text;
	}
	add_filter('wp_nav_menu', 'roots_wp_nav_menu');
	
	if (!is_admin()) {  
		
		/*-------------------------------------------
			Register styles
		-------------------------------------------*/
		add_action('init','tune_register_styles');
		function tune_register_styles() {
			wp_register_style( 'main', 			'/style.css', 														array(), null, 		'screen, handheld' );
			wp_register_style( 'googlefonts', 	'http://fonts.googleapis.com/css?family=Neuton:400,700,400italic', 	array(), null, 		'all' );
			wp_register_style( 'widgets', 		'/plugins/jetpack/modules/widgets/widgets.css', 					array(), null, 'all' );
		}
		
		/*-------------------------------------------
			Enqueue styles
		-------------------------------------------*/
		add_action( 'wp_enqueue_scripts', 'tune_enqueue_styles' );
		function tune_enqueue_styles() {
			wp_enqueue_style( 'main' );
			wp_enqueue_style( 'googlefonts' );
			wp_enqueue_style( 'widgets' );
		}
		
		
		
		/*-------------------------------------------
			Deregister scripts
		-------------------------------------------*/
		add_action('init','tune_deregister_scripts');
		function tune_deregister_scripts() {
			wp_deregister_script( 'jquery' );
			wp_deregister_script( 'comment-reply' );
		}
		
		/*-------------------------------------------
			Register scripts
		-------------------------------------------*/
		add_action('init','tune_register_scripts');
		function tune_register_scripts() {
			wp_register_script( 'modernizr', 		'/js/modernizr.js', 												array(), 							null, 	false );
			wp_register_script( 'jquery', 			'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', 	array(), 							null, 	false );
			wp_register_script( '_gf_placeholders', '/plugins/gravity-forms-placeholders/gf.placeholders.js', 			array('jquery'), 					null, 	true );
			wp_register_script( 'functions', 		'/js/functions.js', 												array('jquery'), 					null, 	true );
			wp_register_script( 'typekit', 			'http://use.typekit.net/uvw8kbj.js', 								array(), 							null, 	false );
			wp_register_script( 'respond', 			'/js/respond.js', 													array(), 							null, 	true );
			wp_register_script( 'comment-reply', 	'/includes/js/comment-reply.js', 									array(), 							null, 	true );
			wp_register_script( 'sequence', 		'/js/sequence.js', 													array(), 							null, 	true );
			
			
			if (stripos($_SERVER['REQUEST_URI'],'/contact') !== false) {
				wp_register_script( 'googlemaps', 	'https://maps.googleapis.com/maps/api/js?sensor=false', 			array(), 							null, 	true );
				wp_register_script( 'stamen', 		'http://maps.stamen.com/js/tile.stamen.js?v1.1.2', 					array('googlemaps'), 				null, 	true );
				wp_register_script( 'contact', 		'/js/contact.js', 													array('googlemaps'), 				null, 	true );
			}
		}
		
		/*-------------------------------------------
			Enqueue scripts
		-------------------------------------------*/
		add_action( 'wp_enqueue_scripts', 'tune_enqueue_scripts' );
		function tune_enqueue_scripts() {
			wp_enqueue_script( 'modernizr' );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( '_gf_placeholders' );
			wp_enqueue_script( 'functions' );
			wp_enqueue_script( 'typekit' );
			wp_enqueue_script( 'respond' );
			wp_enqueue_script( 'sequence' );
			if( get_option( 'thread_comments' ) )  {
				wp_enqueue_script( 'comment-reply' );
			}
			
			if (stripos($_SERVER['REQUEST_URI'],'/contact') !== false) {
				wp_enqueue_script( 'googlemaps' );
				wp_enqueue_script( 'stamen' );
				wp_enqueue_script( 'contact' );
			}
		}
	
	}
	

	
?>