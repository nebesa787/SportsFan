<?php	
/*
Template Name: Download-page
*/
get_header();
?>

	<?php
		function get_size( $bytes ){
			if ( $bytes < 1000 * 1024 ) {
				return number_format( $bytes / 1024, 2 ) . " KB";
			}elseif ( $bytes < 1000 * 1048576 ) {
				return number_format( $bytes / 1048576, 2 ) . " MB";
			}elseif ( $bytes < 1000 * 1073741824 ) {
				return number_format( $bytes / 1073741824, 2 ) . " GB";
			}else {
				return number_format( $bytes / 1099511627776, 2 ) . " TB";
			}
		}
	?>

	
	
	<section class="categories dnls">
		<div class="container">                
			<div class="categories__body">
				<?php if ($_POST['pid']){ ?>
				<?php $pid = $_POST['pid'];?>					
				<?php 
					$args = array( 'p' => $pid );
					$query = new WP_Query( $args );
					while ( $query->have_posts() ) {
					$query->the_post();
				?>
				<?php if( have_rows('logo') ):?>
								
					<?php $ii=0;?>
					<?php while(the_repeater_field('logo')): ?>	
						<?php $ii++;?>
						<?php $img_array = get_sub_field('file_png'); ?>
							
						<div class="covers__teams-item <?php if(($ii%6)==0) echo 'cnth6';?> <?php if(($ii%7)==0) echo 'cnth7';?> <?php if(($ii%2)==0) echo 'cnth2';?>">
							<div class="covers__team-img">
								<div style="background:url('<?php echo $img_array['url'] ; ?>') no-repeat center center; width:140px; height:140px; background-size: contain; "></div>
							</div>
							<div class="covers__team-title">
																<?php echo $img_array['width'] ; ?>x<?php echo $img_array['height'] ; ?><br>
								<b><?php echo get_size ($img_array['filesize']) ; ?></b>
							</div>
							<div class="covers__dnll">
								<a class="download_links nofancybox nolightbox" href="<?php echo $img_array['url']; ?>" target="_blank" download >Download</a>
							</div>
						</div>
						<?php if ($ii==6 || $ii==12){?>
							<span style="display:block;width: 100%;margin-top: 15px; margin-bottom: 15px;">
								<center> 
									ADS
								</center>
							</span>					
											
						<?php }?>							
					<?php endwhile; ?>
										
				<?php endif; ?>
				<?php } ?>
				<?php wp_reset_postdata(); ?>						
									
				<?php } ?>	
						
			</div>					
		</div>
    </section>
	
<?php get_footer(); ?>