<?php get_header(); ?>
		<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
		<section class="logo__item">
            <div class="container">
                <div class="logo__item-left">
					<?php breadcrumbs();?>
                    
					
					
                    <div class="logo__item-title"><?php the_title();?></div>
					
                    	
							
					<div class="post-content entry-content">
						<?php the_content(); ?>
					</div> 
					
                </div>
					<div class="logo__item-right">
						<div class="gray__bg"></div>
						<div class="logo__top-five">
							<div class="logo__top-title">Top 5 logo</div>
							<div class="logo__top-list">
								 <?php
									
									global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;
									$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
									$wp_query = new WP_Query();
									$wp_query->query('cat=-1,-2&posts_per_page=5&meta_key=wpb_post_views_count&orderby=meta_value_num&order=DESC');								
								?>
								<?php if (have_posts()) : ?>
								<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
								<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb144_187');	?>
								
									<a href="<?php the_permalink(); ?>" class="logo__top-item">
										<div class="logo__top-left"><img  src="<?php echo $large_image_url[0];?>"></div>
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
            </div>
        </section>
		
		<?php endwhile; ?>
		<?php endif; ?>
		
		<section class="news">
            <div class="container">
				
          
                <div class="news__top">
                    <div class="news__title">Sports Logo News</div>
                    <div class="news__more">
                        <a href="/news">View all news
                            <img width="42" height="18" src="<?php bloginfo('template_url'); ?>/img/icons/arrow.png">
                        </a>
                    </div>
                </div>
                <div class="news__list">
				
					<?php
						global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;
						$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
						$wp_query = new WP_Query();
						$wp_query->query('cat=2&posts_per_page=8');
					?>
					<?php if (have_posts()) : ?>
					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<?php if ( has_post_thumbnail()) { ?>
							<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb270_146');	?>
							<a href="<?php the_permalink(); ?>" class="news__item">
								<div class="news__item-img"><img width="270" height="146" src="<?php echo $large_image_url[0];?>"></div>
								<div class="news__item-title"><?php the_title();?></div>
								<div class="news__item-date"><?php the_time('F j, Y');?></div>
							</a>
						<?php }else{?>
							<a href="<?php the_permalink(); ?>" class="news__item">
								<div class="news__item-img"><img width="270" height="146" src="<?php bloginfo('template_url'); ?>/img/blanc.jpg"></div>
								<div class="news__item-title"><?php the_title();?></div>
								<div class="news__item-date"><?php the_time('F j, Y');?></div>
							</a>
						<?php }?>
					<?php endwhile; ?>						
					<?php endif; ?>
					<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
				
                    
                </div>
            </div>
			
			
			
        </section>




<?php get_footer(); ?>