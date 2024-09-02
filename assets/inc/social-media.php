
					<div class="share group">

						<div class="share-inner-wrap">

							<h2>Share</h2>

							<ul class="group">
								<li class="twitter">
									<a href="http://twitter.com/share" 
									   data-url="<?php the_permalink(); ?>" 
									   class="twitter-share-button" 
									   data-text="<?php the_title(); ?>" 
									   data-count="none"
									   rel="nofollow">Tweet</a>
								</li>
								<li class="google-plus"><? /*<g:plusone count="false"></g:plusone> */ ?><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">Google+</a></li>
								<li class="pinterest"><?php /*<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="none">Pin It</a>*/ ?>
									<?php if ( !is_home() ) { ?>
										<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>Pin It</a><?php } ?></li>
							</ul>

						</div>
	
					</div>