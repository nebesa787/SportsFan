<?php get_header(); ?>


		<section class="logo__item">
            <div class="container">
                <div class="">
                    <?php breadcrumbs();?>
                    <div class="logo__item-title"><?php printf( __( 'RECHERCHER: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></div>
					<div class="post-content entry-content full-width">
						<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							
								<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
									
								<div class="post-content">
									<div class="excerpt">
										<?php the_content_limit(400);?>
									</div>
									<a href="<?php the_permalink(); ?>" rel="nofollow" class="button">Lire la suite</a>
								</div>
							
						<?php endwhile; ?>
						<div class="categories__bot">
							<?php wp_corenavi(); ?>
						</div>
						<?php endif; ?>
					</div> 
                </div>
				
				
				
            </div>
        </section>


<?php get_footer(); ?>