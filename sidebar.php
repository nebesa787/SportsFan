<div class="logo__item-right">
                    <div class="gray__bg"></div>
                    <div class="logo__top-five">
                        <div class="logo__top-title">Top 5 logo</div>
                        <div class="logo__top-list">
							 <?php
								global $post;
								$categories = get_the_category(); 
							 
								global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;
								$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
								$wp_query = new WP_Query();
								$wp_query->query('cat=-1,-2,'.$categories[0]->term_id.'&posts_per_page=5&meta_key=wpb_post_views_count&orderby=meta_value_num&order=DESC');								
							?>
							<?php if (have_posts()) : ?>
							<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
							<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb144_187');	?>
							
								<a href="<?php the_permalink(); ?>" class="logo__top-item">
									<div class="logo__top-left"><img src="<?php echo $large_image_url[0];?>"></div>
									<div class="logo__top-right">
										<div class="logo__card-title"><?php the_title();?></div>
										<div class="logo__top-descr"><?php the_content_limit(100); ?></div>
									</div>
								</a>
							
							
							<?php endwhile; ?>						
							<?php endif; ?>
							<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
						
                        </div>
                    </div>
                </div>