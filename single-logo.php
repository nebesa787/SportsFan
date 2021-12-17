<?php get_header(); ?>
		<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
		<section class="logo__item">
            <div class="container">
                <div class="logo__item-left">
					<?php breadcrumbs();?>
                    
					
					<?php if( have_rows('logo') ):?>
					<?php while(the_repeater_field('logo')): ?>	
					<?php $ii++;?>
					<?php if ($ii==1){?>
					<?php $img_array_png = get_sub_field('file_png'); ?>
					<?php $img_array_png = get_sub_field('file_png'); ?>
					<?php }?>
					<?php endwhile; ?>
					<?php endif; ?>
					
                    <div class="logo__item-title"><?php the_title();?></div>
					
                    <div class="logo__item-body">
                        <div class="logo__item-yellow">
                            <div class="logo__item-like yellow__icon-btn" pid="<?php the_ID(); ?>">
                                
									<img width="17" height="16" src="<?php bloginfo('template_url'); ?>/img/icons/like.png">
									<span class="count"><?php 	echo get_post_meta(get_the_id(), 'likes', true); ?></span>
								
                            </div>
                            <div class="logo__item-dislike yellow__icon-btn" pid="<?php the_ID(); ?>">
                                
									<img width="17" height="16" src="<?php bloginfo('template_url'); ?>/img/icons/dislike-black.png">
									<span class="count"><?php 	echo get_post_meta(get_the_id(), 'dislikes', true); ?></span>
								
                            </div>
                        </div>
                        <div class="logo__item-pic">
							<a href="<?php echo $img_array_png['url']; ?>"><img width="604" src="<?php echo $img_array_png['url']; ?>"></a>
						</div>
                    </div>
					
					<?php if( have_rows('logo') ):?>
					<div class="LogoBlock-Buttons ">
						<div class="LogoButtons mlist">
							
								<form action="/download/" method="post" rel="nofollow" >
									<input type="hidden" name="pid" value="<?php the_ID(); ?>">
									
									<button type="submit" class="LogoButton LogoButton_png " >ALL PNG</button>
								</form>
							
						</div>
					</div>
					<?php endif; ?>	
						
							
					<div class="post-content entry-content">
						<?php the_content(); ?>
					</div> 
					
                </div>
                <?php get_sidebar();?>
            </div>
        </section>
		
		<?php endwhile; ?>
		<?php endif; ?>
		
		<section class="news">
            <div class="container">
				
          <noindex>
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
				</noindex>
                    
                </div>
            </div>
			
			
			
        </section>




<?php get_footer(); ?>