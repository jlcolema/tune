<?php
/**
 * Template Name: Blank
 */

?>

<!DOCTYPE html>

<!--[if lt IE 7 ]><html class="ie ie6 no-js" dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/"><!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">

	<meta charset="UTF-8">
</head>
<body>
<?php while ( have_posts() ) : the_post(); ?>

	<?php the_content() ?>

<?php endwhile; // end of the loop. ?>
</body>
</html>