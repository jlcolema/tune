				
						<?php
						
							$args = array(
								'numberposts'=>1,
								'post_type'=>'testimonials',
								'orderby'=>'rand',
								'post_status'=>'publish',
								'meta_query' => array(
									array(
										'key' => 'Agency',
										'value' => array(get_post_meta($post->ID, "Agency", true)),
										'compare' => 'IN'
									)
								)
							);
							$testimonials = get_posts($args);
						
							/**
							 * Get either a Gravatar URL or complete image tag for a specified email address.
							 *
							 * @param string $email The email address
							 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
							 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
							 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
							 * @param boole $img True to return a complete IMG tag False for just the URL
							 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
							 * @return String containing either just a URL or a complete image tag
							 * @source http://gravatar.com/site/implement/images/php/
							 */
							function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
								$url = 'http://www.gravatar.com/avatar/';
								$url .= md5( strtolower( trim( $email ) ) );
								$url .= "?s=$s&d=$d&r=$r";
								if ( $img ) {
									$url = '<img src="' . $url . '"';
									foreach ( $atts as $key => $val )
										$url .= ' ' . $key . '="' . $val . '"';
									$url .= ' />';
								}
								return $url;
							}
							if (count($testimonials) > 0) {
							
								foreach($testimonials as $testimonial):
								
									if (get_post_meta($testimonial->ID, 'show_gravatar', true) == 1 && strlen(get_post_meta($testimonial->ID, 'email', true)) > 0) {
									
											$gravatar = '<img src="' . get_gravatar(get_post_meta($testimonial->ID, 'email', true)) . '" style="height:80px; width:80px; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%;" nopin="nopin" />';
											
										
									} else {
									
										$gravatar = '<img src="http://www.tunedevelopment.com/assets/icon-testimonial1.png" alt="Testimonial Icon" nopin="nopin" />';
									
									}	
									
								endforeach;	
								
							} else {
								
								$gravatar = '<img src="http://www.tunedevelopment.com/assets/icon-testimonial1.png" alt="Testimonial Icon" nopin="nopin" />';
								
							}				
			
							foreach($testimonials as $testimonial):
							
								echo '<blockquote class="work-testimonial">';
									echo $gravatar;
									echo '<div>';
										echo '<p>' . $testimonial->post_content . '</p>';
										echo '<cite>' . $testimonial->post_title . ', ' . $agency_name .  '</cite>';
									echo '</div>';
								echo '</blockquote>';
							
							endforeach;	
						?>