<?php get_header(); ?>

	<?php  $cat = get_the_category_by_ID($cat); ?>
						
	<section class="categories">
            <div class="container">
				<?php breadcrumbs();?>
                <div class="categories__title"><?php echo $cat;?></div>
                <div class="categories__top">
					<div class="filter__list">
						<div class="filter__title">By alphabet:</div>
							<?php

										// Определяем текущую категорию.
										$the_cat_id = get_queried_object_id();

										// Задаём массив параметров для пользовательского запроса WP_Query.
										$args_az = array(
											'post_type'   => 'post',
											'post_status' => 'publish',
											'numberposts' => -1,
											'category'    => $the_cat_id,
										);

										// Запрос WP_Query функцией get_posts().
										$query_az = get_posts( $args_az );

										// Перебираем каждый заголовок записи, отобрав первую букву в массив '$all_titles_arr'.
										$all_titles_arr = array();
										foreach ( $query_az as $post_az ) :
											setup_postdata( $post_az );
											$the_title        = get_the_title( $post_az->ID );
											$all_titles_arr[] = mb_strtolower( mb_substr( $the_title, 0, 1, 'UTF-8' ) );
										endforeach;
										wp_reset_postdata();

										// Формируем массив из списка букв от 'a' до 'z'.
										$az_range_arr = range( 'a', 'z' );
										
										//$az_range_arr[26]='0-9';
										//print_R($all_titles_arr);
										//print_R('-----');
										//print_R($az_range_arr);
										
										// Подготовка различных классов для подсветки кнопок навигации.
										foreach ( $az_range_arr as $letter ) :
											$letter_status = '';

											// Существует ли данная буква в массиве 'all_titles_arr'.
											if ( ! in_array( $letter, $all_titles_arr, true ) ) :
												$letter_status .= ' disabled';
											endif;

											// Совпадает ли буква с текущим параметром GET массива.
											if ( isset( $_GET['az'] ) && $letter === $_GET['az'] ) :
												$letter_status .= ' active';
											endif;
											
											
											if (  in_array( '0', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '1', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '2', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '3', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '4', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '5', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '6', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '7', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '8', $all_titles_arr, true ) ) : $chisla = true; endif;
											if (  in_array( '9', $all_titles_arr, true ) ) : $chisla = true; endif;
											
											
											?>
											<?php /*<div class="filter__list-item <?php echo esc_attr( $letter_status ); ?>"><a class="page-link text-uppercase" href="<?php echo esc_url( add_query_arg( 'az', $letter, get_category_link( $the_cat_id ) ) ); ?>" alpha="<?php echo $letter;?>" cat="<?php echo $the_cat_id;?>" ><?php echo esc_html( $letter ); ?></a></div>*/?>
											<div class="filter__list-item <?php echo esc_attr( $letter_status ); ?>"><a class="alpha page-link text-uppercase" href="#" alpha="<?php echo $letter;?>" cat="<?php echo $the_cat_id;?>" ><?php echo esc_html( $letter ); ?></a></div>
											<?php
										endforeach;

										$all = '';
										$o9 = '';

										// Если отсутствует параметр $_GET['az'], деактивировать кнопку "Все".
										if ( ! isset( $_GET['az'] ) ) :
											$all = ' disabled';
										endif;
										
										if ( ! $chisla ) :
											$o9 = ' disabled';
										endif;
										
										
										
										?>
										
										<?php /*<div class="filter__list-item <?php echo esc_attr( $o9 ); ?>"><a class="alpha page-link text-uppercase" href="#" cat="<?php echo $the_cat_id;?>">0-9</a></div>*/?>
										<?php /*<div class="filter__list-item <?php echo esc_attr( $o9 ); ?>"><a class="alpha page-link text-uppercase" href="#" alpha="0-9" cat="<?php echo $the_cat_id;?>">0-9</a></div>*/?>
										
										<div class="filter__list-item  active <?php echo esc_attr( $all ); ?>"><a class="alpha current_alpha page-link text-uppercase" href="#" alpha="11" cat="<?php echo $the_cat_id;?>">ALL</a></div>
									
					</div>
								
								
					
				
                    
                    <div class="sort">
                        <div class="sort__title">Sorting by:</div>
                        <div class="sort__select-wrapp">
                            <select name="sort" id="sort__select" class="sort__select">
                                <option value="asc" selected>A-Z</option>
                                <option value="desc">Rating</option>
                            </select>
                        </div>
                    </div>
                </div>
					<?php
						global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;
						$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
						$wp_query = new WP_Query();
						//$wp_query->query('cat='.$the_cat_id.'&posts_per_page=-1');
						$wp_query->query('cat='.$the_cat_id.'&posts_per_page=-1&orderby=title&order=asc');
					?>
					
                	<?php if(have_posts()) : ?>
					<div class="categories__body">
						<?php while(have_posts()) : the_post(); ?>
						<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb92_107');	?>
						
						<div class="covers__teams-item">
							<div class="covers__team-img"><a href="<?php the_permalink(); ?>"><img width="92" height="107" src="<?php echo $large_image_url[0];?>"></a></div>
							<div class="covers__team-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
							<div class="categories__item-yellow">
								<div class="categories__yellow-like categories__yellow-btn" pid="<?php the_ID(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/icons/like.png"></div>
								<div class="categories__yellow-dislike categories__yellow-btn" pid="<?php the_ID(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/icons/dislike.png"></div>
							</div>
						</div>
						
						<?php endwhile; ?>
						
					</div>
						<div class="categories__bot">
							<?php wp_corenavi(); ?>
						</div>
					<?php endif; ?>
				<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
				
					
                
            </div>
        </section>
		
		
		
		
		
		
	
		
		
		
		
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
						$wp_query->query('cat=2&posts_per_page=4');
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