<?php get_header(); ?>


 
        <section class="logos">
            <div class="container">
                <div class="logos__left">
				
					<?php
						global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;
						$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
						$wp_query = new WP_Query();
						$wp_query->query('cat=1&posts_per_page=1');
					?>
					<?php if (have_posts()) : ?>
						<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
							 <div class="logos__news">
								<?php if ( has_post_thumbnail()) { ?>
									<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb450_170');	?>
									<div class="logo__news-img"><img width="450" height="170" src="<?php echo $large_image_url[0];?>"></div>
								<?php }?>
								<div class="logo__news-title"><?php the_title();?></div>
								<div class="logo__news-text"><?php the_content_limit(220); ?></div>
								<a href="<?php the_permalink(); ?>" class="logo__news-more">
									More
									<img class="logo__news-arr"><img width="42" height="18" src="<?php bloginfo('template_url'); ?>/img/icons/arrow.png"></img>
								</a>
							</div>									
							<?php endwhile; ?>						
					<?php endif; ?>
					<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
				
				
				
				
				
				
				
				
				
                   
                </div>
                <div class="logos__right">
                    <div class="logo__right-tabs">
                        <div class="logo__right-tab active">New logos</div>
                        <span class="slash">/</span> 
                        <div class="logo__right-tab">Popular logos</div>
                    </div>
                    <div class="logo__right-items">
                        <div class="logo__right-item">
							<?php
								global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;
								$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
								$wp_query = new WP_Query();
								$wp_query->query('cat=-1,-2&posts_per_page=3');
							?>
							<?php if (have_posts()) : ?>
								<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
									<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb144_187');	?>
									
									<div class="logo__right-card">
										<div class="logo__item-img"><a href="<?php the_permalink(); ?>"><img width="100%"  src="<?php echo $large_image_url[0];?>"></a></div>
										<div class="logo__item-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
										<div class="logo__item-text"><?php the_content_limit(220); ?></div>
									</div>	

								<?php endwhile; ?>						
							<?php endif; ?>
							<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
						</div>
                        <div class="logo__right-item">
                            <?php
								global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;
								$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
								$wp_query = new WP_Query();
								$wp_query->query('cat=-1,-2&posts_per_page=3&meta_key=wpb_post_views_count&orderby=meta_value_num&order=DESC');
							?>
							<?php if (have_posts()) : ?>
								<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
									<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb144_187');	?>
									
									<div class="logo__right-card">
										<div class="logo__item-img"><a href="<?php the_permalink(); ?>"><img width="144" height="187" src="<?php echo $large_image_url[0];?>"></a></div>
										<div class="logo__item-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
										<div class="logo__item-text"><?php the_content_limit(220); ?></div>
									</div>	

								<?php endwhile; ?>						
							<?php endif; ?>
							<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		<?php get_sidebar('Leagues');?>
        
        <section class="news">
            <div class="container">
				
                <div class="news__top">
                    <div class="news__title">Sports Logo News</div>
                    <div class="news__more">
                        <a href="/news">View all articles
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