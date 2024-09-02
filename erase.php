	<?php
			echo str_ireplace('http://', '', 'http://www.tunedevelopment.com');
		$link = get_post_meta($item->ID, online_url, true);
		echo '<a href="' . $link . '" title="' . $item->post_title . '">' . str_ireplace( 'http://', '', $link ). '</a>';
		?>
		
		
		
		
<ul>
	<?php
		
		foreach($items as $item):
								
			echo '<li>';
		
				$link = get_post_meta($item->ID, online_url, true);
				
				echo '<a href="' . $link . '" title="' . $item->post_title . '">' . str_ireplace( 'http://', '', $link ). '</a>';
											
			echo '</li>';
								
		endforeach;
		
	?>

</ul>