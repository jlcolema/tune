
									$args = array(
										'numberposts'=>1,
										'post_type'=>'testimonials',
										'orderby'=>'rand',
										'post_status'=>'publish'
									);
									$items = get_posts($args);
									foreach($items as $item):
										$agency = get_post_meta($item->ID, 'Agency', true);
										$agency = str_ireplace('["', '', $agency);
										$agency = str_ireplace('"]', '', $agency);
										$agency = get_post($agency, 'ARRAY_A');
										echo '<p>' . $item->post_content . '</p>';
										echo '<p class="attribution">' . $item->post_title;
										if ( get_post_meta($item->ID, 'hide_agency_name', true) == 0 ) {
											echo '<em>' . $agency['post_title'] . '</em>';
										}
										echo '</p>';
									endforeach;