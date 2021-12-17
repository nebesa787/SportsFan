<?php get_header(); ?>

	<?php  $cat = get_the_category_by_ID($cat); ?>
	
						
	
		
		
		<section class="news">
            <div class="container">
				<?php breadcrumbs();?>
                <div class="news__top">
                    <div class="news__title"><?php echo $cat;?></div>
                    
                </div>
				<div class="news__list">
				
					
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

						<div class="categories__bot">
							<?php wp_corenavi(); ?>
						</div>					
					<?php endif; ?>
					
                    
                </div>
            </div>
			
			
			
        </section>


<?php get_footer(); ?>