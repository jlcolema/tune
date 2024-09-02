<?php
/*
Template Name: Testimonial Feed
*/

$numposts = 1;

function yoast_rss_date( $timestamp = null ) {
  $timestamp = ($timestamp==null) ? time() : $timestamp;
  echo date(DATE_RSS, $timestamp);
}

function yoast_rss_text_limit($string, $length, $replacer = '...') { 
  $string = strip_tags($string);
  if(strlen($string) > $length) 
    return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;   
  return $string; 
}

function tune_get_testimonial($post) {
	$agency = get_post_meta($post->ID, 'Agency', true);
	$agency = str_ireplace('["', '', $agency);
	$agency = str_ireplace('"]', '', $agency);
	$agency = get_post($agency, 'ARRAY_A');
	$testimonial = '';
	$testimonial .= '<p>' . $post->post_content . '</p>';
	$testimonial .= '<p><span>' . $post->post_title;
	if ( get_post_meta($post->ID, 'hide_agency_name', true) == 0 ) {
		$testimonial .= '<em>' . $agency['post_title'] . '</em>';
	}
	$testimonial .= '</span></p>';
	echo $testimonial;
}



$args = array(
	'post_type'=> 'testimonials',
	'showposts'    => 15,
	'orderby'    => 'rand',
	'order'    => 'ASC'
);
$posts = query_posts($args);

$lastpost = $numposts - 1;

header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0"?>';
?><rss version="2.0" xmlns:blogChannel="http://backend.userland.com/blogChannelModule">
	<channel>
		<title>Testimonials for Tune Development</title>
		<link>http://www.tunedevelopment.com/</link>
		<description>Testimonial for Tune Development.</description>
		<language>en-us</language>
		<lastBuildDate><?php yoast_rss_date( strtotime($posts[$lastpost]->post_date_gmt) ); ?></lastBuildDate>
		<ttl>40</ttl>
		<?php foreach ($posts as $post) { ?>
			<item>
				<description><![CDATA[<?php tune_get_testimonial($post);?>]]></description>
				<pubDate><?php yoast_rss_date( strtotime($post->post_date_gmt) ); ?></pubDate>
			</item>
		<?php } ?>
	</channel>
</rss>
