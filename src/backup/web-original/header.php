<!DOCTYPE html>

<!--[if lt IE 7 ]><html class="ie ie6 no-js" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">

	<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>

	<meta charset="<?php bloginfo('charset'); ?>">

	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title><?php wp_title(''); ?></title>
	
	<meta name="google-site-verification" content="UA-30087046-1">

	<meta name="author" content="Tune Development - http://www.tunedevelopment.com">
	<meta name="Copyright" content="Copyright <?php echo date("Y") ?> Tune Development. All Rights Reserved.">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="/media/icons/apple-touch-icon-114x114-03.png">

	<?php /*
	<link rel="stylesheet" href="/style.css" media="screen, handheld" />
	<link rel="stylesheet" href="/css/flexslider.css" media="all" />

	<link href='http://fonts.googleapis.com/css?family=Neuton:400,700,400italic' rel='stylesheet' type='text/css'>

	*/ ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="/js/selectivizr.js"></script>
	<![endif]-->

</head>

<body <?php body_class('preload'); ?>>

	<div id="page">

		<header id="header" role="banner">

			<div class="inner-wrap">

				<hgroup>
	
					<h1 id="site-title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
	
					<?php if (is_front_page()) { ?>
			
						<div id="intro">
	
							<h2>Our name is Tune.</h2>

							<p>We build web sites, and we do it exclusively for ad agencies and design firms.</p>
	
						</div>

					<?php } ?>
	
				</hgroup>

				<div class="ul-corner"></div>
				<div class="ur-corner"></div>
				<div class="lr-corner"></div>
				<div class="ll-corner"></div>

			</div>

		</header>

		<div id="body" class="group">
