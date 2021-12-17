		<footer class="footer">
            <div class="container">
                <div class="footer__logo"><img width="146" height="50" src="<?php bloginfo('template_url'); ?>/img/logo-light.png"></div>
                <?php	
					$nav_args = array(
						'container'       => false, 
						'menu_class'      => 'footer__menu', 
						'container_id'	  => 'footer__menu',
						'depth'           => 1,
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'theme_location'  => 'footer-menu'
						);
					wp_nav_menu($nav_args);
					?>
                <div class="footer__right">
                    <div class="footer__copy">sportivka.net
                        <br>Copyrights &copy; 2021</div>
                    <div class="footer__links">
                        <?php /*<a href="#" class="footer__link-item"><img width="9" height="17" src="<?php bloginfo('template_url'); ?>/img/icons/facebook.svg"></a>
                        <a href="#" class="footer__link-item yellow"><img width="18" height="18" src="<?php bloginfo('template_url'); ?>/img/icons/instagram.png"></a>
						*/?>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    
	<?php dynamic_sidebar( 'final-code' ); ?>
	
	<script type="text/javascript">
	jQuery(document).ready(function(){
		
		

		
	
		jQuery(".alpha").click(function(event){
			event.preventDefault();
			var ajaxurl11 = '<?php echo admin_url('admin-ajax.php'); ?>';
			alpha = jQuery(this).attr("alpha");
			cat = jQuery(this).attr("cat");
			sort = jQuery("#sort__select option:selected").val();
			
			jQuery('.categories__bot').fadeOut(); 
			jQuery('.filter__list-item').removeClass('active'); 
			jQuery(this).parent().addClass('active');
			
			if (alpha==11) {location.reload();};
			jQuery.ajax({
				url: ajaxurl11, 
				dataType: "html",
				type: "POST",
				data:{
					"selected_alpha" : alpha,
					"selected_cat" : cat,
					"selected_sort" : sort,
					"action" : "get_posts_by_name"
				},
				success: function(data){
					//alert(data);
					jQuery(".categories__body").fadeOut( 10 ,function(){	                    
							if (!data){
								jQuery(this).html('<span class="no_opp">Sorry no Opportunities found!</span/>');
							}
							else{
								jQuery(this).html(data);
							}
						}
					).fadeIn( 10 );
				}
			});
		});
		
		jQuery("#sort__select").change(function(event){
			event.preventDefault();
			var ajaxurl11 = '<?php echo admin_url('admin-ajax.php'); ?>';
			alpha = jQuery('.filter__list-item.active a').attr("alpha");
			cat = jQuery('.filter__list-item.active a').attr("cat");
			sort = jQuery("#sort__select option:selected").val();
			
			//jQuery('.categories__bot').fadeOut(); 
			//jQuery('.filter__list-item').removeClass('active'); 
			//jQuery(this).parent().addClass('active');
			
			//if (alpha==11) {location.reload();};
			jQuery.ajax({
				url: ajaxurl11, 
				dataType: "html",
				type: "POST",
				data:{
					"selected_alpha" : alpha,
					"selected_cat" : cat,
					"selected_sort" : sort,
					"action" : "get_posts_by_name"
				},
				success: function(data){
					//alert(data);
					jQuery(".categories__body").fadeOut( 10 ,function(){	                    
							if (!data){
								jQuery(this).html('<span class="no_opp">Sorry no Opportunities found!</span/>');
							}
							else{
								jQuery(this).html(data);
							}
						}
					).fadeIn( 10 );
				}
			});
		});
		
		jQuery(".logo__item-like").click(function(event){
			event.preventDefault();
			var ajaxurl11 = '<?php echo admin_url('admin-ajax.php'); ?>';
			pid = jQuery(this).attr("pid");
			
			jQuery.ajax({
				url: ajaxurl11, 
				dataType: "html",
				type: "POST",
				data:{
					"like_pid" : pid,
					"action" : "like_post"
				},
				success: function(data){
					
					jQuery(".logo__item-like").fadeOut( 1 ,function(){	                    
							if (!data){
								jQuery(this).html('<span class="no_opp">Sorry no Opportunities found!</span/>');
							}
							else{
								jQuery(this).html(data);
							}
						}
					).fadeIn( 1 );
					
				}
			});
		});
		
		jQuery(".logo__item-dislike").click(function(event){
			event.preventDefault();
			var ajaxurl11 = '<?php echo admin_url('admin-ajax.php'); ?>';
			pid = jQuery(this).attr("pid");
			
			jQuery.ajax({
				url: ajaxurl11, 
				dataType: "html",
				type: "POST",
				data:{
					"dislike_pid" : pid,
					"action" : "dislike_post"
				},
				success: function(data){
					
					jQuery(".logo__item-dislike").fadeOut( 1 ,function(){	                    
							if (!data){
								jQuery(this).html('<span class="no_opp">Sorry no Opportunities found!</span/>');
							}
							else{
								jQuery(this).html(data);
							}
						}
					).fadeIn( 1 );
					
				}
			});
		});
		
		
		
		
	});
	
	jQuery(document).on('click', '.categories__yellow-like', function(event) { 
		event.preventDefault();
			var ajaxurl11 = '<?php echo admin_url('admin-ajax.php'); ?>';
			pid = jQuery(this).attr("pid");
			
			jQuery.ajax({
				url: ajaxurl11, 
				dataType: "html",
				type: "POST",
				data:{
					"like_pid" : pid,
					"action" : "like_post"
				},
				success: function(data){
					
				}
			});

	});
	jQuery(document).on('click', '.categories__yellow-dislike', function(event) { 

		event.preventDefault();
			var ajaxurl11 = '<?php echo admin_url('admin-ajax.php'); ?>';
			pid = jQuery(this).attr("pid");
			
			jQuery.ajax({
				url: ajaxurl11, 
				dataType: "html",
				type: "POST",
				data:{
					"dislike_pid" : pid,
					"action" : "dislike_post"
				},
				success: function(data){
					
				}
			});

	});
	
	
	</script>
	<!-- Ajax End -->

	<?php /*
	<!--************************* Show only filter data alphabatically  ****************************-->
	<script type="text/javascript">
		jQuery(document).ready(function(){
			var arrayFromPHP ='<?php echo json_encode($GLOBALS["tmp_common_alpha"]); ?>';
			var jsonparse=JSON.parse(arrayFromPHP);
			console.log(jsonparse);
			//console.log(jQuery.type(jsonparse));
			jQuery.each(jsonparse, function (i, elem) {
				 //alert(elem);
				 var tmp = '.'+elem;
				 jQuery(tmp).addClass("current_alpha");
			});
		});
	</script>
	*/?>

	<?php wp_footer(); ?>
</body></html>