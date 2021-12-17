<?php	
/*
Template Name: Search-page
*/
get_header();
?>

	
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<section class="logo__item">
            <div class="container">
                <div class="">
                    <?php breadcrumbs();?>
                    <div class="logo__item-title"><?php the_title();?></div>
                  <div class="post-content entry-content full-width">
						<?php the_content(); ?>
					</div> 
                </div>
				
				
				
            </div>
        </section>
	<?php endwhile; ?>
	<?php endif; ?>	
		
<?php get_footer(); ?>